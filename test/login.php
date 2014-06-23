<?php

// start a new session (required for Hybridauth)
try{
    $campaignID  = $_GET['id'];
}catch( Exception $e ){
    echo $e->getMessage();
    die();
}

require_once('../widget/http.php');
require_once('../widget/oauth_client.php');
//require('external_oauth_client.php');
?>
<!DOCTYPE html>
<html>
<head>

    <title>Login and sign up form with social authorization</title>

    <link href="style/main.css" rel="stylesheet" type="text/css" /> <!-- Form Stylesheet -->
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/jquery.oauthpopup.js"></script>
    <script src="../public/js/common.js"></script>

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
                    <label class="error" style='display:none;'  id="error_pwd">Password Required</label>
                </div>
                <div id="" style="height:15px;">&nbsp;</div>
                <input type="submit" class="submit" value="Submit" id="login" style="margin-left:150px;"/>
            </fieldset>
            <h3 style="margin-left:200px;">OR</h3>
            <table width="100%" style="margin-left:15px;">
                <tr>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=facebook', 'http://local.referowl.com/test/index.php?id=144')"><img src="../public/image/social/facebook.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=twitter')"><img src="../public/image/social/twitter.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=google')"><img src="../public/image/social/google.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=linkedin')"><img src="../public/image/social/linkedin.png" border="0"/></a></td>
                    <td width="20%"><a href="javascript:;" onclick="openLoginDialog('?action=login&type=yahoo', 'http://local.referowl.com/test/index.php?id=144')")"><img src="../public/image/social/yahoo.png" border="0"/></a></td>
                </tr>
            </table>

        </form>

    </section>

</div>
</body>
