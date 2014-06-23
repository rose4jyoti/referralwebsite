<?php
// config and whatnot
$config = dirname(__FILE__) . '/../../hybridauth/config.php';
require_once( "../../hybridauth/Hybrid/Auth.php" );
require_once( "../../../PHPMailer/PHPMailerAutoload.php" );
include("includes/mysql.class.php");

$CURRENT_URL = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
$CURRENT_URL = dirname($CURRENT_URL);

try{
    $campaignID         = @ trim( strip_tags( $_GET["id"] ) );
    $provider           = @ trim( strip_tags( $_GET["provider"] ) );
    $userID             = @ intval( trim( strip_tags( $_GET["uid"] ) ));
    $db                 = new MySQL();

    $campaignType       = $db->getCampaignType($campaignID);
    $rewardForSharing   = $db->getSocialShareReward($campaignID);
    // grab the user list of referees
    $userEmail          = $db->getUserEmail($userID);
    $user_referees      = $db->getReferrals($userID);
    $user_inscriptions  = $db->getInscriptions($userEmail);

    $countsent          = count($user_referees);
    $countregistered    = 0;
    foreach($user_referees as $referee){if($referee =='Registered'){$countregistered += 1;}}
    $dates              = $db->getDates($campaignID);
    $campaignGoal       = $db->getCampaignGoal($campaignID);

    if (isset($_POST['referees'])){
        $friend = $_POST['referees'];

        $mail           = new PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host     = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@sarixmarketing.com';                 // SMTP username
        $mail->Password = 'ramarula';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
        $mail->Port     = 465;
        $mail->isHTML(true);

        $userPurl       = $CURRENT_URL."/login.php?id=".$campaignID."&referralID=".$db->getPurl($userID);
        $userPurlLink   = "<a href='". $userPurl ."' target='_blank'>". $userPurl ."</a>";
        $mail->From     = $db->getUserEmail($userID);
        $mail->FromName = $db->getUserName($userID);
        $mail->Subject  = $db->getEmailSubject($campaignID,'Reminder_email');
        $msg            = $db->getEmailMsg($campaignID, 'Reminder_email');
        $search = array('[personal_link]');
        $replace = array($userPurlLink);
        $msg = str_replace($search, $replace, $msg);
        $mail->Body     = $msg;
        $mail->AltBody  = $msg;
        $mail->clearAddresses();
        $mail->addAddress($friend[0]);     //addAddress('luc@deallife.com');// Add a recipient
        if(!$mail->send()) {
            echo('Mailer Error: ' . $mail->ErrorInfo);
        } else {
            //echo('Message has been sent');
        }
    }

}catch( Exception $e ){
    echo $e->getMessage();
    die();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $db->getDescription($campaignID);?></title>
    <!--<link rel="stylesheet" href="public/css.css" type="text/css">-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "608f039c-042e-4827-b304-abdd9d29e3f8", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <style>
        .idpico{
            cursor: pointer;
            cursor: hand;
        }
        .status
        {
            padding: 5px 0px 5px 0px;
            background-color:#0092ef;
            color: #ffffff;
            border-radius: 0px;
            font: 1em Verdana,Geneva,sans-serif;
            margin-left: 0px;
        }
        .list{
            color: #000000;
            font: 0.70em Verdana,Geneva,sans-serif;
            margin: 0 auto;
            padding: 17px 0 0;
            text-align: left;
            vertical-align: middle;
        }
        .panel-title{
            color: #000000;
            font: 1.2em Verdana,Geneva,sans-serif;
            margin: 0 auto;
            padding: 15px 0 0;
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <script>
        $(document).ready(function(){
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
    <div class="col-md-6 col-xs-12" style="height:527px; padding: 10px; background-color: #EEEEEE">
        <div class="col-xs-12 col-md-12" id="congrats" style="background-color: #FFFFFF">
            <h2 style="text-align: center">
                <br />
                CONGRATULATIONS <br />you are now entered!
                <br />
            </h2>

            <h3 style="background-color: #fd4b4b; color: #FFFFFF; text-align: center; padding: 20px 0 20px 0">
                <span style="font: 0.70em Verdana,Geneva,sans-serif">
                <?php if($campaignType == 1){?>
                    You have now <b><?php echo $user_inscriptions - 1 ?></b> referral(s) accumulated!</span>
                    <br/><br />
                    Share with your social contacts and increase your chance to reach the number of referrals!
                <?php }else{?>
                    You have now <b><?php echo $user_inscriptions ?></b> chance(s) to win!</span>
                    <br/><br />
                    Share with your social contacts and get automatically additional chances  &nbspto win!
                <?php }?>
            </h3>
        </div>
        <br />
        <div class="col-xs-12 col-md-12 text-center" style="margin-top: -10px; background-color: #FFFFFF">
            <img src="images/DownArrow.png"/>
        </div>
        <div class="col-xs-12 col-md-12 text-center" style="padding-top: 10px; background-color: #FFFFFF">
            <div id="idps">
                <table style="width: 100%; border: 0px; background-color: white">
                    <tr>
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style text-center"
                             url="http://example.com"
                             title="An Example Title"
                             description="An Example Description">
                            <a class="addthis_button_facebook"></a>
                            <a class="addthis_button_twitter"></a>
                            <a class="addthis_button_linkedin"></a>
                            <a class="addthis_button_google_plusone_share"></a>
                            <!--a class="addthis_button_oknotizie"></a>
                            <a class="addthis_button_qzone"></a-->
                            <a class="addthis_button_compact"></a>
                            <a class="addthis_counter addthis_bubble_style"></a>
                        </div>
                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5372beda24eaadc6"></script>
                        <!-- AddThis Button END -->
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 text-center" style="padding: 15px 0 15px 0;  background-color: #FFFFFF">
            <span style="font: 1em Verdana,Geneva,sans-serif">
            <?php if($campaignType == 1){?>
                <b>We give you <?php echo $rewardForSharing ?> referral for each share!</b>
            <br/>
            <?php }else{?>
                <b>Get <?php echo $rewardForSharing ?> additional chance(s) for each share!</b></span>
                <br/>
            <?php }?>
            <br/>
        </div>
    </div>
    <div class="col-md-6 col-xs-12" style="height:527px; padding: 10px; background-color: #EEEEEE">
        <div class="col-md-12 col-xs-12" style="background-color: #ffffff">

            <div class="row text-center" style="padding: 15px">
                <div class="col-md-12 col-xs-12 text-center status"><b>PARTICIPATION STATUS</b></div>
                <div class="col-md-4 status">
                    <?php if($campaignType == 1){?>
                        <span>GOAL</span><br />
                        <b><?php echo $campaignGoal ?></b>
                    <?php }else{?>
                        <span>CHANCE(S)</span><br />
                        <b><?php echo $countregistered + 1?></b>
                    <?php }?>

                </div>
                <div class="col-md-4 status">
                    <span>REFEREES</span><br />
                    <b><?php echo $countregistered ?></b>/<b><?php echo $countsent?></b>
                </div>
                <div class="col-md-4 status">
                    <span>TIME LEFT</span>
                    <?php
                    $startDateTime=$dates[0]['startTime'];
                    $endDateTime=$dates[0]['endTime'];
                    $seconds = strtotime($endDateTime) - strtotime(date('Y-m-d H:i:s'));

                    $days = floor($seconds / 86400);
                    $seconds %= 86400;
                    $hours = floor($seconds / 3600);
                    $seconds %= 3600;
                    $minutes = floor($seconds / 60);
                    $seconds %= 60;
                    //echo "$days days and $hours hours and $minutes minutes and $seconds seconds";
                    ?><br />
                    <b><?php echo $days; ?>d <?php echo $hours; ?>h <?php echo $minutes; ?>m</b>

                </div>
            </div>
            <div class="row"  style="padding: 0px 15px 0px 15px">
                <div class="col-md-5 col-xs-5" style="background-color: #ffffff"></div>
                <div class="col-md-7 col-xs-7 pull-right" style="background-color: #ffffff; padding-bottom: 5px">
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
            <div class="row" style="padding: 0px 15px 5px 15px">
                <form role="form" method="post" action="">
                    <div style="max-height: 350px; overflow: auto; border:1px solid #EEEEEE">
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed" width="100%">
                                <?php
                                try{
                                    foreach( $user_referees as $referee=>$status ){
                                        ?>
                                        <tr>
                                            <td class="list"><?php echo $referee; ?></td>
                                            <td class="list"><?php echo $status; ?></td>
                                            <td align="left" valign="middle" width="10" >
                                                <button class="btn-xs btn-success btn" type="submit" name="referees[]" value="<?php echo $referee; ?>">Remind</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    if( ! count( $user_referees ) ){
                                        echo "No contact found!";
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
                </form>
            </div>
        </div>
    </div>
</div>
&nbsp;&nbsp;<a href="login.php?id=147">Login page</a>
</body>
</html>