<?php
$consumer_key='317402207382.apps.googleusercontent.com';
$consumer_secret='d7hhmJpNaiputLqsm2pPuOGc';
$callback='http://softoasistech.com/dev2013/referral/invite/gmailcontacts/Contacts.php';
//$callback='http://softoasistech.com/dev2013/referral/home/index';
$emails_count='500';
?>


<?php 

$dbhost = 'localhost';
$dbuser = 'softoasi_referal';
$dbpass = ']N^fwqZ*@7X9';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('softoasi_referral');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

?>

<?php
/*
$sql = 'SELECT name, email FROM listcontacts';

mysql_select_db('softoasi_referral');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "EMP ID :{$row['name']}  <br> ".
         "EMP NAME : {$row['email']} <br> ".
         "--------------------------------<br>";
} 
mysql_close($conn);
*/
?>
