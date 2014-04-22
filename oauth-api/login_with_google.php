<?php
/*echo readfile("../importer/data.txt");*/
$file = fopen("../importer/data.txt", "r") 
or exit("Unable to open file!");
while(!feof($file))
  {
 $cid=fgets($file);
  }
fclose($file);


$file = fopen("../importer/data2.txt", "r") 
or exit("Unable to open file!");
while(!feof($file))
  {
 $rid=fgets($file);
  }
fclose($file);
?> 

<?php 
define("SITE","http://softoasistech.com/dev2013/referral");
?>
<?php
/*
 * login_with_google.php
 *
 * @(#) $Id: login_with_google.php,v 1.7 2013/07/31 11:48:04 mlemos Exp $
 *
 */

	/*
	 *  Get the http.php file from http://www.phpclasses.org/httpclient
	 */
	require('http.php');
	require('oauth_client.php');

	$client = new oauth_client_class;
	$client->server = 'Google';

	// set the offline access only if you need to call an API
	// when the user is not present and the token may expire
	$client->offline = true;

	$client->debug = false;
	$client->debug_http = true;
	
	//$client->redirect_uri = 'http://www.'.$_SERVER['HTTP_HOST'].dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/login_with_google.php';
	
	$client->redirect_uri = 'http://www.softoasistech.com/dev2013/referral/oauth-api/login_with_google.php';

	$client->client_id = '586573025089-tfeqdmh2p7001cdgeo7hb858cb8v9c3q.apps.googleusercontent.com'; 
	
	$application_line = __LINE__;
	//$client->client_secret = 'l7s648yocqis6RPH9CzBBwC3';
	$client->client_secret = 'GRb3q7vbJs8SaS2Bz8olT7UR';

	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to Google APIs console page '.
			'http://code.google.com/apis/console in the API access tab, '.
			'create a new client ID, and in the line '.$application_line.
			' set the client_id to Client ID and client_secret with Client Secret. '.
			'The callback URL must be '.$client->redirect_uri.' but make sure '.
			'the domain is valid and can be resolved by a public DNS.');

	/* API permissions
	 */
	$client->scope = 'https://www.google.com/m8/feeds';
                //'https://www.googleapis.com/auth/userinfo.profile';
	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->authorization_error))
			{
				$client->error = $client->authorization_error;
				$success = false;
			}
			elseif(strlen($client->access_token))
			{
                                //echo "AccessTok".$client->access_token;
				$success = $client->CallAPI(
					//'https://www.googleapis.com/oauth2/v1/userinfo',
					//'https://www.google.com/m8/feeds/contacts/default/full?alt=json',
					'https://www.google.com/m8/feeds/contacts/default/full',
					'GET', array(), array('FailOnAccessError'=>true), $data);
					
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
if($success)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Google OAuth client results</title>
</head>
<body>
<?php
/**
 * Take XML content and convert
 * if to a PHP array.
 * @param string $xml Raw XML data.
 * @param string $main_heading If there is a primary heading within the XML that you only want the array for.
 * @return array XML data in array format.
 */
    function xml_to_array($xml,$main_heading = '') {
        $deXml = simplexml_load_string($xml);
        $deJson = json_encode($deXml);
        $xml_array = json_decode($deJson,TRUE);
        if (! empty($main_heading)) {
            $returned = $xml_array[$main_heading];
            return $returned;
    } else {
        return $xml_array;
        }
    }       
    

    // The contacts api only returns XML responses.    
    $xml = simplexml_load_string($data);
    $xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
    print "<pre>" . print_r(json_decode($xml, true), true) . "</pre>";
    
    //echo '<h1>', HtmlSpecialChars($xml->author->name),' you have logged in successfully with Google!</h1>';
    
	$pname=HtmlSpecialChars($xml->author->name);
	
    //echo count($xml->entry).'<br>';
	//print_r($_SESSION);
	
    foreach ($xml->entry as $entry) {
        foreach ($entry->xpath('gd:email') as $email) {
          //$output_array[] = array((string)$entry->title, (string)$email->attributes()->address);
            if($entry->title == ''){
                //echo $email->attributes()->address.':'.$email->attributes()->address.'<br>';
                //echo $email->attributes()->address.'<br>';
				
            }else{
                //echo $entry->title.':'.$email->attributes()->address.'<br>';
            }
          
        }
      }
  
    
    //echo '<pre>', HtmlSpecialChars(print_r($xml, 1)), '</pre>';
    //echo '<pre>', HtmlSpecialChars(print_r($data, 1)), '</pre>';
	

	
?>
</body>
</html>
<?php 
}

else
{ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>OAuth client error</title>
</head>
<body>
<h1>OAuth client error</h1>
<pre>Error: <?php echo HtmlSpecialChars($client->error); ?></pre>
</body>
</html>
<?php
	}

?>



<?php  if($success){

$host="localhost"; // Host name
$username="softoasi_referal"; // Mysql username
$password="]N^fwqZ*@7X9"; // Mysql password
$db_name="softoasi_referral"; // Database name

// working with rpuser Table
$tbl_name="rpusers"; // Table
// Connect to server and select database.
$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$tempname=$xml->author->name;
$tempemail=$xml->author->email;
$userReferralID=$cid;

$sqlq="SELECT COUNT(userEmail) AS totalparticipant FROM rpusers WHERE userEmail='$tempemail' AND 	userReferralID='$userReferralID'";
$queryresult=mysql_query($sqlq, $conn);
$rowq = mysql_fetch_array($queryresult, MYSQL_ASSOC);
$count=$rowq['totalparticipant'];

//echo $cid;
//echo $count;
//die();

if($count==0){ 
$sql="INSERT INTO rpusers(userName,userEmail,userReferralID)VALUES('$tempname','$tempemail','$userReferralID')";
$result=mysql_query($sql);
}
 

// working with rp_users_referrals Table
 // Select data from mysql
$sqlquery="SELECT * FROM rpusers WHERE userEmail='$tempemail' ORDER BY userID DESC LIMIT 1 ";
$queryresult=mysql_query($sqlquery, $conn);
$row = mysql_fetch_array($queryresult, MYSQL_ASSOC);
$lastid=$row['userID'];
$campaignid=$row['userReferralID']; 
 
  foreach ($xml->entry as $entry) {
        foreach ($entry->xpath('gd:email') as $email) {
          
                //echo $email->attributes()->address.':'.$email->attributes()->address.'<br>';
				  
                  $temp=explode('@',$email->attributes()->address);	
                   $name= $temp[0];				  
                  $email=$email->attributes()->address; 
                
				if($count==0){
				 $sql2="INSERT INTO rp_users_referrals(referredName, referredEmail,referredByUserID,campaign_id)VALUES('$name', '$email' ,'$lastid','$campaignid')";
                 $result=mysql_query($sql2);
				 }
					
      }
   }
 
 
 // close connection
mysql_close();
 
 
}
?>

<?php if($count==0){ ?>
 <script>
  window.location.assign("<?php echo SITE;?>/home/index/<?php echo $cid; ?>/<?php echo $lastid; ?>/<?php echo $rid; ?>")
</script>
<?php }else{ ?>
  <script>
  window.location.assign("<?php echo SITE;?>/home/congrats/<?php echo $cid; ?>/<?php echo $lastid; ?>/ <?php echo $rid; ?>")
</script>
<?php }?>



