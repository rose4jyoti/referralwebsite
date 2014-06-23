<?php
	// config and whatnot
    $config = dirname(__FILE__) . '/hybridauth/config.php';
    $imgRoot = 'includes/images';
    require_once( "/hybridauth/Hybrid/Auth.php" );
    require_once( "../PHPMailer/PHPMailerAutoload.php" );
    include("includes/mysql.class.php");

    $CURRENT_URL = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
    $CURRENT_URL = dirname($CURRENT_URL);

    // check for erros and whatnot
    $error      = "";
    $uploadsDir = "../uploads/";
    //Temp variables
    $message    = "";
    $invited    = 0;

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    //if(isset($_GET["id"]) && isset($_GET["provider"])){
    try{
        $campaignID     = @ trim( strip_tags( $_GET["id"] ) );
        $provider       = @ trim( strip_tags( $_GET["provider"] ) );
        $referralID     = (isset( $_GET["referralID"] )) ? @ trim( strip_tags( $_GET["referralID"] ) ) : "";

        $mail = new PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@sarixmarketing.com';                 // SMTP username
        $mail->Password = 'ramarula';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = 465;
        $mail->isHTML(true);                                  // Set email format to HTML

        $db             = new MySQL();
        $refProgImg     = $db->getImage($campaignID, 1);
        $refProgDesc    = $db->getDescription($campaignID);

        // initialise hybridauth..
        $hybridauth     = new Hybrid_Auth( $config );
        // call back the requested provider adapter instance
        $adapter        = $hybridauth->getAdapter( $provider );
        $user_data      = $adapter->getUserProfile();
        if(property_exists($user_data,'displayName')){
            $user_name      = $user_data->displayName;
        }elseif((property_exists($user_data,'firstName')) && (property_exists($user_data,'lastname'))){
            $user_name      = $user_data->firstName.' '.$user_data->lastname;
        }else{
            $user_name      = "";
        }
        $user_email     = $user_data->email;
        $user_referees  = $db->getReferrals($user_email);
        }catch( Exception $e ){
            echo $e->getMessage();
            die();
        }

        $userID = $db->isRegistered($user_email);

        if(!$userID){
            $userID = $db->addUser(
                array(  "userName" => $user_name,
                    "userEmail" => $user_email,
                    "userParticipantCode" => NULL,
                    "userFirstName" => $user_data->firstName,
                    "userLastName" => $user_data->lastName,
                    "userRegistredDate" => date('Y-m-d H:i:s'),
                    "userLastAccessed" => date('Y-m-d H:i:s'),
                    "userReferralPURL" => uniqid(rand()),
                    "userGender" => $user_data->gender,
                    "userStatus" => 'Active',
                    "refereeEmail" => $referralID
                ));
            //If its a refered participant, we add an inscription into the paraticipant table.
            if($referralID != ''){
                $db->addInscription($referralID, $user_email);

                $referredByUserID = $db->getUserID($referralID);
                try{
                    $db->AutoInsertUpdate('rp_users_referrals',
                        array("referredByUserID" => $referredByUserID,
                            "referredName" => $user_name,
                            "referredEmail" => $user_email,
                            "referralStatus" => 'Registered',
                            "campaign_id" => $campaignID),
                        array("referredByUserID" => $referredByUserID,
                            "referredEmail" => $user_email,
                            "campaign_id" => $campaignID)
                    );
                }catch ( Exception $e ){
                    echo $e->getMessage();
                    die();
                }

            }

            $mail->clearAddresses();
            $mail->From     = $db->getFromEmail($campaignID);
            $mail->FromName = $db->getFromName($campaignID);
            $mail->Subject  = $db->getEmailSubject($campaignID,'Campaign_entry');
            $mail->Body     = $db->getEmailMsg($campaignID, 'Campaign_entry');
            $mail->AltBody  = $db->getEmailMsg($campaignID, 'Campaign_entry');
            $mail->addAddress($user_email);
            if(!$mail->send()) {
                //print_r('Message could not be sent.');
                print_r('Mailer Error: ' . $mail->ErrorInfo);
            } else {
                //print_r('Message has been sent');
            }
        }

    if (isset($_POST['submit'])){
        if(isset($_POST['referees'])){
            if(count($_POST['referees']) > 0){
                $aReferees = $_POST['referees'];
                //var_dump($aReferees);
                //if($userID){
                    for($i=0; $i < count($aReferees); $i++)
                    {
                        //print_r($aReferees[$i]);
                        $referredEmailName = explode(';;',$aReferees[$i]);
                        $refereeID = $db->addReferee(
                            array("referredByUserID" => $userID,
                                "referredName" => $referredEmailName[1],
                                "referredEmail" => $referredEmailName[0],
                                "referralStatus" => 'Pending',
                                "referredOnDate" => date('Y-m-d H:i:s'),
                                "campaign_id" => $campaignID
                        ));
                        $userPurl       = $CURRENT_URL."/login.php?id=".$campaignID."&referralID=".$db->getPurl($userID);
                        $userPurlLink   = "<a href='". $userPurl ."' target='_blank'>". $userPurl ."</a>";
                        $mail->From     = $db->getUserEmail($userID);
                        $mail->FromName = $db->getUserName($userID);
                        $mail->Subject  = $db->getEmailSubject($campaignID,'Campaign_referral');
                        $msg            = $db->getEmailMsg($campaignID, 'Campaign_referral');
                        $search = array('[personal_link]');
                        $replace = array($userPurlLink);
                        $msg = str_replace($search, $replace, $msg);
                        $mail->Body     = $msg;
                        $mail->AltBody  = $msg;
                        $mail->clearAddresses();
                        $mail->addAddress($referredEmailName[0]);     //addAddress('luc@deallife.com');// Add a recipient
                        if(!$mail->send()) {
                            echo('Mailer Error: ' . $mail->ErrorInfo);
                        } else {
                            //echo('Message has been sent');
                        }

                    }
                //}
                $hybridauth->logoutAllProviders();
                header( "Location: summary.php?"."id=".$campaignID."&provider=".$provider."&uid=".$userID );
            }else{
                $message = "Please select at least one contact to invite";
            }
        }elseif(isset($_POST['invited'])){
            $userID = $db->isRegistered($user_email);

            $hybridauth->logoutAllProviders();
            header( "Location: summary.php?"."id=".$campaignID."&provider=".$provider."&uid=".$userID );
            }else{
                $message = "Please select at least one contact to invite";
            }

    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $db->getDescription($campaignID);?></title>
    <script src="includes/js/jquery.min.js"></script>
    <link rel="stylesheet" href="includes/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <style>
        .panel
        {
            background-color:#FFFFFF;
            border-radius:3px;
            padding: 10px 10px 10px 10px;
        }
        .list{
            color: #000000;
            font: 0.75em Verdana,Geneva,sans-serif;
            margin: 0 auto;
            text-align: left;
            vertical-align: middle;
        }
    </style>
    <script type="text/javascript">
        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for (var i = 0; i < cbs.length; i++) {
                if (cbs[i].type == 'checkbox' && !cbs[i].disabled) {
                    cbs[i].checked = bx.checked;
                }
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            /*var message = <?php echo $message;?>;
            if( message != ""){
                $("#message").html(<?php $message?>).show;
            }else{
                $("#message").hide;
            }*/

            $("#search").keyup(function() {
                var value = $(this).val();

                $("table tr").each(function(index) {
                    $row = $(this);
                    var id = $.trim($row.find("td").text());
                    if (id.indexOf(value) == -1) {
                        $row.hide();
                    }else{
                        $row.show();
                    }
                });
            });
        });
    </script>
</head>
<body>
<br />
<div class="container" style="max-width: 952px; background-color: rgba(162, 190, 195, 0.55); padding: 10px">
        <p id="message" style="display: none"><?php if($message != ""){echo $message;} ?></p>
        <div class="col-md-6 col-xs-12" style="height:527px; padding: 10px; background-color: #EEEEEE">

                <div class="col-xs-12 col-md-12" style="padding: 10px 10px 3px 10px; background-color: #ffffff">
                    <div class="checkbox col-xs-4 col-md-4" >
                            <input type="checkbox" class="css-checkbox" id="mark" onClick="checkAll(this)" checked>
                            <label for="mark" class="css-label" style="font-size: small"><b>SELECT ALL</b></label>
                    </div>
                    <div class="col-xs-2 col-md-2" ></div>
                    <div class="col-xs-6 col-md-6 text-right" style="padding-bottom: 5px">
                        <div class="input-group input-group-sm">
                            <input id="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button id="searchbtn" class="btn btn-default btn-sm" >
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            <form role="form" method="post" action="">
                <div class="col-xs-12 col-md-12" style="background-color: #ffffff; padding-bottom: 5px">
                    <div style="height: 395px; overflow: auto; border:1px solid #EEEEEE">
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">
                                <?php
                                try{
                                    // grab the user contacts list
                                    $user_contacts = $adapter->getUserContacts();
                                    //var_dump($user_contacts);
                                    if( ! count( $user_contacts ) ){
                                        echo "No contact found!";
                                    }else{
                                        foreach( $user_contacts as $contact ){
                                            if(strpos($contact->email,'@')){
                                                ?>
                                                <tr>
                                                    <td class="text-left" style="vertical-align: middle; width: 10px">
                                                        <input type="checkbox" class="css-checkbox" id="<?php echo $contact->email ?>" value="<?php echo $contact->email ?>;;<?php echo $contact->displayName; ?>" name="referees[]" <?php if(!isset($user_referees[$contact->email])){ echo ' checked';}else{ $invited+=1; echo ' disabled';}?>></input>
                                                        <label for="<?php echo $contact->email ?>" class="css-label"></label>
                                                    </td>
                                                    <td class="list" style="vertical-align: middle">
                                                        <b><?php echo $contact->displayName; ?> </b> <?php echo $contact->email; ?>
                                                    </td>
                                                    <td class="list" style="vertical-align: middle">
                                                        <?php if(isset($user_referees[$contact->email])){echo "Invited";}else{echo '';} ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        }
                                        if($invited > 0){ echo "<input type='hidden' name='invited' value=". $invited. "></input>";}
                                    }
                                }
                                catch( Exception $e ){
                                    // if code 8 => Provider does not support this feature
                                    if( $e->getCode() == 8 ){
                                        echo "Provider does not support this feature.";
                                    }
                                    else{
                                        echo "Well, got an error: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-6 col-xs-12 text-left" style="padding: 10px; background-color: #EEEEEE">
                <div>
                    <?php $imgUrl = (isset($refProgImg)) ? $uploadsDir.$refProgImg : "<?php echo $imgRoot; ?>/no-image.png"; ?>
                    <img style="width: 100%; height: 453px" src="<?php echo $imgUrl ?>" alt="Image Invite"/>
                </div>
                <br/>
                <div class="pull-right">
                    <button type="submit" name="submit" class="btn btn-danger" style="width: 120px">Next</button>
                </div>
            </form>
        </div>
</div>
</body>
</html>
