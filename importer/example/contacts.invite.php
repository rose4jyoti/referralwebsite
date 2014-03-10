<?php
 $customerid=$_REQUEST['id'];
?>
<?php 
if($_POST){
 if($_POST['stage']=='1'){
 
 
  //print_r($_POST);
  //die();
$host="localhost"; // Host name
$username="softoasi_referal"; // Mysql username
$password="]N^fwqZ*@7X9"; // Mysql password
$db_name="softoasi_referral"; // Database name

$tbl_name="rpusers"; // Table name
// Connect to server and select database.
$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


//////////////////////////
/////Redundency check//////
$email=$_POST['email'];
$sqlfind="SELECT count(userEmail) AS count FROM rpusers WHERE userEmail='$email' ORDER BY userID DESC LIMIT 1 ";
$queryresults=mysql_query($sqlfind, $conn);
$row = mysql_fetch_array($queryresults, MYSQL_ASSOC);
//$lastid=$row['userID'];
$count=$row['count'];
//print_r($row);
//die();

////////////////////////


// Insert data into mysql
//if($count!='0'){

 $email=$_POST['email'];
 $sql="INSERT INTO rpusers(userEmail,userReferralID)VALUES('$email','$customerid')";
 $result=mysql_query($sql);
// close connection
mysql_close();
 
//} 
 
 
 }
}

//die();
?>


<?php 
define("SITE","http://softoasistech.com/dev2013/referral");
?>
	
<!----------------------------------------------->
	
<?php
$host="localhost"; // Host name
$username="softoasi_referal"; // Mysql username
$password="]N^fwqZ*@7X9"; // Mysql password
$db_name="softoasi_referral"; // Database name

$tbl_name="rp_users_referrals"; // Table name
//$tbl_name="rp_users_referrals"; // Table name

// Connect to server and select database.
$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


// Select data from mysql
$sqlquery="SELECT * FROM rpusers  ORDER BY userID DESC LIMIT 1 ";
$queryresult=mysql_query($sqlquery, $conn);
$row = mysql_fetch_array($queryresult, MYSQL_ASSOC);
$lastid=$row['userID'];
$campaignid=$row['userReferralID'];
//($row);
 
//$sql="TRUNCATE TABLE $tbl_name";
//$result=mysql_query($sql);
 

foreach($this->contacts as $contact) {
 $name= $contact->name; 
 $email=$contact->email; 
 //$sql="INSERT INTO $tbl_name(name, email)VALUES('$name', '$email' )";
 //$result=mysql_query($sql);
   
   //if($count!='0'){
   
   $sql2="INSERT INTO rp_users_referrals(referredName, referredEmail,referredByUserID,campaign_id)VALUES('$name', '$email' ,'$lastid','$campaignid')";
   $result=mysql_query($sql2);
  
   //}
 
 } 


?>

<?php
// close connection
mysql_close();
?>

<script>
//function newDoc() {
  //window.location.assign("<?php echo SITE;?>/home/index/<?php echo $customerid; ?>"); 
  var check='<?php echo $count;?>';

  window.location.assign("<?php echo SITE;?>/home/index/<?php echo $customerid=$_REQUEST['id']; ?>/<?php echo $lastid; ?>")
 
 // }
</script>
