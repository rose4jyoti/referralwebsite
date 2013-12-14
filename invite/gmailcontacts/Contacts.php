<?php
include_once 'GmailOath.php';
include_once 'Config.php';
session_start();
$oauth =new GmailOath($consumer_key, $consumer_secret, $argarray, $debug, $callback);
$getcontact_access=new GmailGetContacts();

$request_token=$oauth->rfc3986_decode($_GET['oauth_token']);
$request_token_secret=$oauth->rfc3986_decode($_SESSION['oauth_token_secret']);
$oauth_verifier= $oauth->rfc3986_decode($_GET['oauth_verifier']);

$contact_access = $getcontact_access->get_access_token($oauth,$request_token, $request_token_secret,$oauth_verifier, false, true, true);

$access_token=$oauth->rfc3986_decode($contact_access['oauth_token']);
$access_token_secret=$oauth->rfc3986_decode($contact_access['oauth_token_secret']);
$contacts= $getcontact_access->GetContacts($oauth, $access_token, $access_token_secret, false, true,$emails_count);

/*print_r($contacts);*/
mysql_query('TRUNCATE TABLE listcontacts;');
mysql_query('TRUNCATE TABLE contacts;');

foreach($contacts as $k => $a)
{    
	$final = end($contacts[$k]);		    
	foreach($final as $email)
	{	    
		//echo $email["address"] ."<br />";		
		$email= $email["address"];				
		$sql = "INSERT INTO listcontacts (name,email,created)          
		VALUES ('Name', '$email' , NOW());";        
		$retval = mysql_query( $sql, $conn ); 

		$email2= $email["address"];				
		$sql2 = "INSERT INTO contacts (name,email,created)          
		VALUES ('Name', '$email' , NOW());";        
		$retval2 = mysql_query( $sql2, $conn );  
		
	}
	
}

?>

<a href="http://softoasistech.com/dev2013/referral/home/index">Click here to see Contact list</a>
