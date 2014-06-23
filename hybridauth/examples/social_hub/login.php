<?php
    // start a new session (required for Hybridauth)
	session_start(); 

	// change the following paths if necessary 
	$config = dirname(__FILE__) . '/../../hybridauth/config.php';
	require_once( "../../hybridauth/Hybrid/Auth.php" );
    include("includes/mysql.class.php");

	// check for erros and whatnot
	$error      = "";
    $uploadsDir = "../../../uploads/";

    $CURRENT_URL = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
    $CURRENT_URL = dirname($CURRENT_URL);

    if(isset($_GET["id"])){
        $campaignID     = @ trim( strip_tags( $_GET["id"] ) );
        $referralID     = (isset( $_GET["referralID"] )) ? @ trim( strip_tags( $_GET["referralID"] ) ) : "";

        $db             = new MySQL();
        $refProgStatus  = $db->getStatus($campaignID);
        if ( !isset( $_GET["provider"])) {
            $refProgImg     = $db->getImage($campaignID, 0);
            //$refProgTitle    = $db->getTitle($campaignID);
            $refProgDescription = $db->getDescription($campaignID);
            $refProgTCs         = $db->getTCs($campaignID);
            $db->addImpression($campaignID);
        }
    }

	if( isset( $_GET["error"] ) ){
		$error = '<b style="color:red">' . trim( strip_tags(  $_GET["error"] ) ) . '</b><br /><br />';
	}
	// if user select a provider to login with then inlcude hybridauth config and main class
    // then try to authenticate te current user finally redirect him to his profile page.
    if ( isset( $_GET["provider"])) {
        $params = array();

        if ($_GET["provider"] == "OpenID") {
            $params["openid_identifier"] = @ $_REQUEST["openid_identifier"];
        }

        if (isset($_REQUEST["redirect_to_idp"])) {
            if (isset($_GET["provider"]) && $_GET["provider"]):
                try {
                    // create an instance for Hybridauth with the configuration file path as parameter
                    $hybridauth = new Hybrid_Auth($config);

                    // set selected provider name
                    $provider = @ trim(strip_tags($_GET["provider"]));

                    // try to authenticate the selected $provider
                    $adapter = $hybridauth->authenticate($provider);


                    //$hybridauth->redirect("contacts.php?provider=$provider");
                    $return_to = "contacts.php?id=" .$campaignID. "&provider=" . $provider . "&referralID=" . $referralID;
                    ?>
                    <script language="javascript">
                        if(  window.opener ){
                            try { window.opener.parent.$.colorbox.close(); } catch(err) {}
                            window.opener.parent.location.href = "<?php echo $return_to; ?>";
                        }
                        window.self.close();
                    </script>
                    <?php

                } catch (Exception $e) {
                    // In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to
                    // let hybridauth forget all about the user so we can try to authenticate again.

                    // Display the received error, to know more please refer to Exceptions handling section on the userguide
                    switch ($e->getCode()) {
                        case 0 :
                            $error = "Unspecified error.";
                            break;
                        case 1 :
                            $error = "Hybriauth configuration error.";
                            break;
                        case 2 :
                            $error = "Provider not properly configured.";
                            break;
                        case 3 :
                            $error = "Unknown or disabled provider.";
                            break;
                        case 4 :
                            $error = "Missing provider application credentials.";
                            break;
                        case 5 :
                            $error = "Authentication failed. The user has canceled the authentication or the provider refused the connection.";
                            break;
                        case 6 :
                            $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                            $adapter->logout();
                            break;
                        case 7 :
                            $error = "User not connected to the provider.";
                            $adapter->logout();
                            break;
                    }
                    // well, basically your should not display this to the end user, just give him a hint and move on..
                    $error .= "<br /><br /><b>Original error message:</b> " . $e->getMessage();
                    $error .= "<hr /><pre>Trace:<br />" . $e->getTraceAsString() . "</pre>";
                }
            endif;
        } else {
            $db->addClick($campaignID);
            //echo "<script>alert('pause');</script>"
            // here we display a "loading view" while tryin to redirect the user to the provider
            ?>
            <table width="100%" border="0">
                <tr>
                    <td align="center" height="190px" valign="middle"><img src="images/loading.gif"/></td>
                </tr>
                <tr>
                    <td align="center"><br/>

                        <h3>Loading...</h3><br/></td>
                </tr>
                <tr>
                    <td align="center">Contacting <b><?php echo ucfirst(strtolower(strip_tags($_GET["provider"]))); ?></b>. Please
                        wait.
                    </td>
                </tr>
            </table>
            <script>
                window.location.href = window.location.href + "&redirect_to_idp=1";
            </script>
        <?php
        }
        die();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $db->getDescription($campaignID);?></title>
    <style>
        .idpico{
            cursor: pointer;
            cursor: hand;
        }
        #openidm{
            margin: 7px;
        }
        .tou{
            color: #000000;
            font: 0.8em Verdana,Geneva,sans-serif;
            margin: 0 auto;
            padding: 17px 0 0;
            text-align: center;
        }
    </style>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.min.css">
    <!--link rel="stylesheet" href="public/css.css" type="text/css"-->
    <script>
        var idp = null;

        $(function() {
            progStatus = <?php echo $refProgStatus?>;
            if( progStatus != 3){
                $("#idps").hide();
                $("#noProg").show();
                switch(progStatus)
                {
                    case 1:
                        $("#noProgMessage").text('The referral campaign you are trying to access is finished. Thank you!');
                        break;
                    case 2:
                        $("#noProgMessage").text('The referral campaign you are trying to access has not started yet. Try again later!');
                        break;

                    case 4:
                        $("#noProgMessage").text('The referral campaign you are trying to access has been cancelled or deleted.');
                        break;

                    default :
                        $("#noProgMessage").text('The referral campaign you are trying to access has been disabled.');
                }
            }
            $(".idpico").click(
                function(){
                    idp = $( this ).attr( "idp" );

                    switch( idp ){
                        case "google"  : case "twitter" : case "yahoo" : case "facebook": case "aol" :
                        case "vimeo" : case "live" : case "tumblr" : case "lastfm" : case "twitter" :
                        case "linkedin" : case "plaxo" :
                            start_auth( "?id=" + <?php echo $campaignID; ?> + "&provider=" + idp + "&referralID=" + <?php echo ("'".$referralID."'"); ?>);
                            break;
                        case "wordpress" : case "blogger" : case "flickr" :  case "livejournal" :
                        if( idp == "blogger" ){
                            $("#openidm").html( "Please enter your blog name" );
                        }
                        else{
                            $("#openidm").html( "Please enter your username" );
                        }
                        $("#openidun").css( "width", "220" );
                        $("#openidimg").attr( "src", "images/icons/" + idp + ".png" );
                        $("#idps").hide();
                        $("#openidid").show();
                        break;
                        case "openid" :
                            $("#openidm").html( "Please enter your OpenID URL" );
                            $("#openidun").css( "width", "350" );
                            $("#openidimg").attr( "src", "images/icons/" + idp + ".png" );
                            $("#idps").hide();
                            $("#openidid").show();
                            break;

                        default: alert( "u no fun" );
                    }
                }
            );

            $("#openidbtn").click(
                function(){
                    oi = un = $( "#openidun" ).val();

                    if( ! un ){
                        alert( "nah not like that! put your username or blog name on this input field." );
                        return false;
                    }
                    switch( idp ){
                        case "wordpress" : oi = "http://" + un + ".wordpress.com"; break;
                        case "livejournal" : oi = "http://" + un + ".livejournal.com"; break;
                        case "blogger" : oi = "http://" + un + ".blogspot.com"; break;
                        case "flickr" : oi = "http://www.flickr.com/photos/" + un + "/"; break;
                    }

                    start_auth( "?provider=OpenID&openid_identifier=" + escape( oi ) );
                }
            );
        });

        function start_auth( params ){
            start_url = params + "&_ts=" + (new Date()).getTime();
            window.open(
                start_url,
                "hybridauth_social_sing_on",
                "location=0,status=0,scrollbars=0,width=800,height=500"
            );
        }
    </script>
</head>
<body>

<br />
<?php
	// if we got an error then we display it here
	if( $error ){
		echo '<p><h3 style="color:red">Error!</h3>' . $error . '</p>';
		echo "<pre>Session:<br />" . print_r( $_SESSION, true ) . "</pre><hr />";
	}
?>
<br />
<div class="container" style="max-width: 952px; background-color: rgba(162, 190, 195, 0.55); padding: 10px">
    <div class="col-md-6 col-xs-12 text-right" style="padding: 10px; background-color: #EEEEEE">
        <div>
            <?php $imgUrl = (isset($refProgImg)) ? $uploadsDir.$refProgImg : "images/no-image.png"; ?>
            <img class="img-responsive" style="width: 100%; height: 453px"
                     src=<?php echo $imgUrl ?>
                     alt="Uploaded avatar"/>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 text-left" style="height: 473px; padding: 10px 15px 0px 15px; background-color: #EEEEEE">
        <div class="col-md-12" style="background-color: #FFFFFF; color: #fd4b4b; text-align: center">
            <br />
            <h3 class="text-center"><?php echo $refProgDescription; ?></h3>
        </div>
        <div class="col-md-12" id="idps" style="background-color: #FFFFFF">
            <br /> <br />
            <p class="text-center">Sign in using your prefered provider.</p> <br />
            <table style="width: 100%; border: 0px; background-color: #FFFFFF">
                <tr>
                    <td align="center"><img class="idpico" idp="live" src="images/icons/signin_outlook.png" title="live" /></td>
                    <td align="center"><img class="idpico" idp="google" src="images/icons/signin_gmail.png" title="google" /></td>
                </tr>
                <tr>
                    <td align="center"><img class="idpico" idp="yahoo" src="images/icons/signin_yahoo.png" title="yahoo" /></td>
                    <td align="center"><img class="idpico" idp="aol" src="images/icons/signin_aol.png" title="aol" /></td>
                </tr>
            </table>
            <br /> <br />
        </div>
        <div class="col-md-12" id="noProg" style="color:#f00000; display:none;">
            <p id="noProgMessage"></p>
            <table width="100%" border="0">
                <tr>
                    <td align="center"><img id="openidimg" src="images/loading.gif" /></td>
                </tr>
            </table>
            <br /><br /><br /><br /><br /><br />

        </div>
        <div class="col-md-12">
            <p class="tou text-center">Read the CONTEST <a href="<?php echo $refProgTCs; ?>" target="_blank"><b>terms and conditions</b></a> before participating</p>
        </div>
    </div>
</div>
	<br />
	<br />
</body>
</html>
