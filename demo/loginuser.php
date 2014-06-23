<?php
include("src/configs.php");
if (empty($_SESSION)) {
    session_start();
}
if(($_SESSION['complete_registration_type']!="") && $conf_main['expire_time']!="") { 
	setcookie("complete_registration_type",$_SESSION['complete_registration_type'],$conf_main['expire_time']);
	setcookie("complete_registration_data",$_SESSION['complete_registration_data'],$conf_main['expire_time']);
}
if($sesobj->get('name')!="" && $conf_main['expire_time']!="") {
	setcookie("name",$sesobj->get('name'),$conf_main['expire_time']);
}
if (!empty($_SESSION) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['networktype'])) {
    include 'src/SocialAuth.php';

    $result = SocialAuth::loginUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['networktype']);
} else {
    $result = array("data" => $_SESSION);
}
$query="select count(*) as count from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_social_network_type']."='facebook'";
$fb=$sqlobj->getdatalistfromquery($query);
$query="select count(*) as count from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_social_network_type']."='twitter'";
$twitter=$sqlobj->getdatalistfromquery($query);
$query="select count(*) as count from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_social_network_type']."='google'";
$google=$sqlobj->getdatalistfromquery($query);
$query="select count(*) as count from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_social_network_type']."='linkedin'";
$linkedin=$sqlobj->getdatalistfromquery($query);
$query="select count(*) as count from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_social_network_type']."='yahoo'";
$yahoo=$sqlobj->getdatalistfromquery($query);
$query="select count(*) as count from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_social_network_type']."=''";
$direct=$sqlobj->getdatalistfromquery($query);
?>
<!DOCTYPE html>
<html>
<head>

<title>Login and sign up form with social authorization</title>

<link href="style/main.css" rel="stylesheet" type="text/css" /> <!-- AJAX Contact Form Stylesheet -->
<script src="js/jquery-1.7.min.js"></script> 
								    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
									<script type="text/javascript">
									  google.load("visualization", "1", {packages:["corechart"]});
									  google.setOnLoadCallback(drawChart);
									  function drawChart() {
										var data = google.visualization.arrayToDataTable([
										  ['Type',  'Users'],
										  ['Facebook',  <?php echo $fb['0']['count']; ?>],
										  ['Twitter',  <?php echo $twitter['0']['count']; ?>],
										  ['Linkedin',  <?php echo $linkedin['0']['count']; ?>],
										  ['Google',  <?php echo $google['0']['count']; ?>],
										  ['yahoo',  <?php echo $yahoo['0']['count']; ?>],
										  ['Direct',  <?php echo $direct['0']['count']; ?>],
										]);

										var options = {
										  title: 'Number of users per type',
										  hAxis: {title: 'Login Type',titleTextStyle: {color: 'red'}}
										};

										var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
										chart.draw(data, options);
									  }
									</script>

<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<style>
label {
	width:280px;
}
</style>
<div>
	<section class="box" style="height:500px;">
	<?php if(($_SESSION['complete_registration_type']!="") || $sesobj->get('name')!="") { ?>
		<a href="index.php?action=logout" style="float:right;" title="">Logout</a>
				<?php if($_SESSION['complete_registration_type']!="") { ?>
				<?php
				$arr=unserialize ($_SESSION['complete_registration_data']);
				?>
				<div style="clear:both;margin:0px auto;">
				<h1>Welcome <?php echo $arr['name']; ?> !!!</h1>
				</div>
				<div style="clear:both;">
				<label style="width:300px;">You have logged in through <strong><?php echo $_SESSION['complete_registration_type']; ?></strong></label>
				
				</div>
				<?php } else { ?>
				<div style="clear:both;">
				<h1>Welcome  <?php echo $sesobj->get('name'); ?> !!!</h1>
				</div>
				<div style="clear:both;">
				<label style="width:300px;">You have logged in through <strong>Direct login</strong></label>
				
				</div>
				<?php } ?>
				<div id="chart_div" style="width: 100%; height: 400px;float:left;" style=""></div>
	<?php } else { ?>
	<h1>Sorry.. you need to login to see this page</h1>
	<?php } ?>
	</section>
</div>
</body>
</html>
