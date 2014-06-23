<?php

//This is main class, this must be included!
include 'src/SocialAuth.php';
include 'src/configs.php';
include 'src/twitter/EpiCurl.php';
include 'src/twitter/EpiOAuth.php';
include 'src/twitter/EpiTwitter.php';

if ($_GET['action'] == "logout") {
	//If action is logout, just expire the cookie
	session_destroy();
	//var_dump($_COOKIE);exit;
	setcookie("complete_registration_type", "", time()-3600);
	setcookie("name", "", time()-3600);
	setcookie("complete_registration_data", "", time()-3600);
	header("Location:" . SocialAuth::getConfig('main', 'base_path'));die;
}
if(($_COOKIE['complete_registration_type']!="") || $_COOKIE['name']!="") {
	if($_COOKIE['complete_registration_type']!="") {
		$_SESSION['complete_registration_type']=$_COOKIE['complete_registration_type'];
		$_SESSION['complete_registration_data']=$_COOKIE['complete_registration_data'];
	}
	if($_COOKIE['name']!="") {
		$sesobj->assign("name",$_COOKIE['name']);
	}
}
if($userobj->getvariable("step")=="2") {
	$arr=unserialize ($_SESSION['complete_registration_data']);
	$query="select * from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_email']."='".$arr['email']."' and ".$conf_db['db_user_field_social_network_type']."='".$arr['type']."'";
	$res=$sqlobj->getdatalistfromquery($query);
	if(count($res)>0){
		echo "<script>window.location.href='loginuser.php'</script>";die;
	} else {
		$data=array();
		$data[$conf_db['db_user_field_email']]=$arr['email'];
		$data[$conf_db['db_user_field_name']]=$arr['name'];
		$data[$conf_db['db_user_field_social_network_type']]=$arr['type'];
		$sqlobj->save($conf_db['db_user_table_name'],$data);
		echo "<script>window.location.href='loginuser.php'</script>";die;
	}
}
if(($_SESSION['complete_registration_type']!="") || $sesobj->get('name')!="") {
	echo "<script>window.location.href='loginuser.php'</script>";die;
}
//Check cookie first, if it is not set it means you are not logged in yet.
if (empty($_COOKIE['SocialAuth'])) {

    //action = login, logout ; type = twitter, facebook, google, linkedin
    if (!empty($_GET['action']) && $_GET['action'] == "login") {
        switch ($_GET['type']) {
            case 'twitter':
                //Initialize twitter by 
                $twitterObj = new EpiTwitter($conf_twitter['consumer_key'], $conf_twitter['consumer_secret']);
                header("Location:" . $twitterObj->getAuthorizationUrl());
                break;
            case 'facebook':
                //Initialize facebook by using factory pattern over main class(SocialAuth)
                $facebookObj = SocialAuth::init('facebook');
                //Get login url according to configurations you specified in configs.php
                $facebookLoginUrl = $facebookObj->getLoginUrl(array('scope' => SocialAuth::getConfig('facebook','permissions'),
                                                                    'canvas' => 1,
                                                                    'fbconnect' => 0,
                                                                    'redirect_uri' => SocialAuth::getConfig('facebook','redirect_uri')));
                header("Location:" . $facebookLoginUrl);
                break;
            case 'google':
                //Initialize google by using factory pattern over main class(SocialAuth)
                $googleObj = SocialAuth::init('google');
                if (!$googleObj->mode) {
                        $googleObj->identity = 'https://www.google.com/accounts/o8/id';
			            $googleObj->required = array('namePerson/first', 'namePerson/last', 'contact/email');
                        $googleObj->returnUrl = SocialAuth::getConfig('google', 'return_url');
                        //Get login url according to configurations you specified in configs.php and redirect to that url
                        header('Location: ' . $googleObj->authUrl());
                }
                break;
            case 'linkedin':
                //Initialize linkedin by using factory pattern over main class(SocialAuth)
                $linkedinObj = SocialAuth::init('linkedin');
                $linkedinObj->getRequestToken();
                $_SESSION['requestToken'] = serialize($linkedinObj->request_token);
                //Get login url according to configurations you specified in configs.php
                $linkedinLoginUrl = $linkedinObj->generateAuthorizeUrl();
                header("Location:" . $linkedinLoginUrl);
                break;
            case 'yahoo':
                $yahooObj = SocialAuth::init('yahoo');
                $yahooObj->identity = 'https://me.yahoo.com';
	            $yahooObj->required = array(
                                    'namePerson',
                                    'namePerson/first',
                                    'namePerson/last',
                                    'contact/email');

                $yahooObj->returnUrl = SocialAuth::getConfig('yahoo', 'return_url');
                //Get login url according to configurations you specified in configs.php and redirect to that url
                header('Location: ' . $yahooObj->authUrl());
                break;
            default:
                //If any login system found, warn user
                echo "Invalid Login system";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>

<title>Login and sign up form with social authorization</title>

<link href="style/main.css" rel="stylesheet" type="text/css" /> <!-- Form Stylesheet -->
<script src="js/jquery-1.7.min.js"></script> 
<script src="js/popup.js"></script>
<script src="js/common.js"></script>

<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<div style="width:85%;margin:0px auto;">
	<section class="box" style="width:456px;float:left;">
		<form method="post" action="login.php" name="loginform" id="loginform" autocomplete="on">

			<fieldset>

				<legend>Login</legend>

				<div>
					<label for="email">Email</label>
					<input name="txt_email" type="email" id="txt_email"/>
					<label class="error" style="display:none;" id="error_email">Valid Email Required</label>
				</div>
				<div style="clear:both;">
					<label for="name">Password</label>
					<input name="txt_password" type="password" id="txt_password"  />
					<label class="error" <?php echo ($sesobj->get('login_error')=='1')?"":"style='display:none;'"; ?>  id="error_pwd"><?php echo ($sesobj->get('login_error')=='1')?"Invalid username or password":"Password Required"; ?></label>
					<?php $sesobj->unassign("login_error"); ?>
				</div>
				<div id="" style="height:15px;">&nbsp;</div>
				<input type="submit" class="submit" value="Submit" id="login" style="margin-left:150px;"/>
			</fieldset>
			<h3 style="margin-left:200px;">OR</h3>
            <table width="100%" style="margin-left:15px;">
                <tr>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=facebook')"><img src="assets/facebook-login.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=twitter')"><img src="assets/twitter-login.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=google')"><img src="assets/google-login.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=linkedin')"><img src="assets/linkedin-login.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=yahoo')"><img src="assets/yahoo-login.png" border="0"/></a></td>
                </tr>
            </table>

		</form>

	</section>
	<section class="box" style="width:456px;float:right;">
		<form method="post" action="signup.php" name="signupform" id="signupform" autocomplete="on">

			<fieldset>

				<legend>Sign Up</legend>
				<div style="clear:both;">
					<label for="name" >Name</label>
					<input name="txt_name" type="text" id="txt_name"   />
					<label class="error" style="display:none;" id="error_name">Name Required</label>
				</div>
				<div style="clear:both;">
					<label for="email" accesskey="E">Email</label>
					<input name="txt_email_sign" type="email" id="txt_email_sign" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"  />
					<label class="error" <?php echo ($sesobj->get('signup_error')=='1')?"style='width:52%;'":"style='display:none;'"; ?>  id="sign_error_email"><?php echo ($sesobj->get('signup_error')=='1')?"This email is already registred with us":"Valid Email Required"; ?></label>
					<?php $sesobj->unassign("signup_error"); ?>

				</div>
				<div style="clear:both;">
					<label for="name" >Password</label>
					<input name="txt_password_sign" type="password" id="txt_password_sign"   />
					<label class="error" style="display:none;" id="sign_error_pwd">Password Required</label>
				</div>
				<div style="clear:both;">
					<label for="name" >Confirm Password</label>
					<input name="txt_c_password_sign" type="password" id="txt_c_password_sign"   />
					<label class="error" style="display:none;width:50%" id="sign_c_error_pwd">Confirm Password Required</label>
				</div>
			<div id="" style="height:15px;">&nbsp;</div>
			<input type="submit" class="submit" id="sign_up" value="Submit" style="margin-left:150px;"/>
			</fieldset>
		</form>

	</section>
</div>
<section class="box" style="clear:both;" id="contact" >
<form method="post" action="" name="contactform" id="contactform" autocomplete="on">

			<fieldset>

				<legend>Contact</legend>

				<div>
					<label for="name" >Your Name</label>
					<input name="name" type="text" id="c_name"   />
					<label class="error"  id="c_name_error" style="display:none;width:50%;">Name Required</label>
				</div>
				<div style="clear:both;">
					<label for="email">Email</label>
					<input name="email" type="email" id="c_email"  />
					<label class="error"  id="c_email_error" style="display:none;width:50%;">Valid Email Required</label>
				</div>

				<div style="clear:both;">
					<label for="phone" >Phone <small>(optional)</small></label>
					<input name="phone" type="tel" id="c_phone" size="30" />
				</div>

				<div style="clear:both;">
					<label for="website" >Website <small>(optional)</small></label>
					<input name="website" type="url" id="c_website"  />
				</div>

				<div style="clear:both;">
					<label for="subject" >Subject</label>
					<select name="subject" id="c_subject" >
						<option value=""></option>
						<option value="Support">Support</option>
						<option value="A Sale">Sales</option>
						<option value="A Bug fix">Report a bug</option>
					</select>
					<label class="error"  id="c_subj_erro" style="display:none;width:50%;">Subject Required</label>
				</div>

				<div style="clear:both;">
					<label for="comments">Comments</label>
					<textarea name="comments" cols="40" rows="3" id="c_comments"  spellcheck="true" ></textarea>
					<label class="error"  id="c_commets_erro" style="display:none;width:25%;">Comments Required</label>
				</div>
				<div style="clear:both;">
					<label for="comments">Verify</label>
				</div>

				<div style="clear:both;">
					<label for="verify" ><script type="text/javascript" src="verify.php"></script></label>
					<input name="verify" type="text" id="verify" size="6"  style="width: 50px;" title="This confirms you are a human user and not a spam-bot." />
					<label class="error"  id="c_verify_error" style="display:none;clear:both;width:68%;">Verification Required</label>
				</div>
			</fieldset>
				<div style="clear:both;">
					<label class="error"  id="success" style="display:none;clear:both;width:68%;"></label>
				</div>
				<div style="clear:both;text-align:center;display:none;" id="loader">
					<img src="assets/ajax-loader"  border="0" alt="" align="center;">
				</div>
			
			<input type="submit" class="submit" id="c_submit" value="Submit" style="margin-left:260px;" />

		</form>
	</section>
<script src="js/main.js"></script>
</body>
</html>
