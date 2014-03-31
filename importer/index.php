<?php

//print_r($_REQUEST);

$compaign_id= $_REQUEST['id'];
$fp = fopen('data.txt', 'w');
fwrite($fp, $compaign_id);
fclose($fp);

echo $rid= $_REQUEST['rid'];
$fp = fopen('data2.txt', 'w');
fwrite($fp, $rid);
fclose($fp);
?>
<?php
$compaingn_id =$_REQUEST['id'];

$con=mysqli_connect("localhost","softoasi_referal","]N^fwqZ*@7X9","softoasi_referral");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*******No. of Impression*******/
$result = mysqli_query($con, "SELECT `no_impressions`FROM `referralprogs`WHERE `refProgID` = '$compaingn_id' limit 1");

while($row = mysqli_fetch_array($result))
  {
  $current_click= $row['no_impressions'];
  
  }
  $current_click = $current_click+1;

mysqli_query($con,"update `referralprogs` set `no_impressions` = $current_click where `refProgID` = '$compaingn_id'");

/*******No. of clicks*******/
$result2 = mysqli_query($con, "SELECT `no_clicks`FROM `referralprogs`WHERE `refProgID` = '$compaingn_id' limit 1");

while($row = mysqli_fetch_array($result2))
  {
   $current_click= $row['no_clicks'];
  
  }
   $current_click = $current_click+1;

 mysqli_query($con,"update `referralprogs` set `no_clicks` = $current_click where `refProgID` = '$compaingn_id'");

include_once 'example/contacts.main.php';
$handler = new ContactsHandler();
$handler->handle_request($_POST);
?>
