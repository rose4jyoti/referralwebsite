<?php
/*
 * login_with_yahoo.php
 *
 * @(#) $Id: login_with_yahoo.php,v 1.3 2013/10/17 05:23:22 mlemos Exp $
 *
 */

	/*
	 *  Get the http.php file from http://www.phpclasses.org/httpclient
	 */
	require('http.php');
	require('oauth_client.php');

	$client = new oauth_client_class;
	$client->debug = false;
	$client->debug_http = true;
	$client->server = 'Yahoo';
	$client->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
		dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/login_with_yahoo.php';

	$client->client_id = 'dj0yJmk9QmEyM0dIWEVNOHl1JmQ9WVdrOU5XRmhkVlJPTm1zbWNHbzlNVEU1TVRBeU9EWXkmcz1jb25zdW1lcnNlY3JldCZ4PWVk'; $application_line = __LINE__;
	$client->client_secret = '59cf181e3a7099fc6fb2a57853e59a4d44ccc45a';

	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to Yahoo Apps page https://developer.apps.yahoo.com/projects/ , '.
			'create a project, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->access_token))
			{                   
                            
				$success = $client->CallAPI(
					'http://social.yahooapis.com/v1/user/me/contacts?count=max', 
					//'http://query.yahooapis.com/v1/yql', 
					'GET', array('$format=json'), /*urldecode('q=select * from social.profile where guid=me'),
						//'q'=>'select * from social.profile where guid=me',
						//'format'=>'json'
						//'$format=json',
                                                ),    */                                           
                                        array('FailOnAccessError'=>true), $contacts);
                                
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
	if(strlen($client->authorization_error))
	{
		$client->error = $client->authorization_error;
		$success = false;
	}
	if($success)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Yahoo OAuth client results</title>
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
                echo '<h1>you have logged in successfully with Yahoo!</h1>';
                        
                $arrContacts = xml_to_array($contacts);
		
                
//for( $i = 0; $i < count($arrContacts[contact]); $i ++)
foreach($arrContacts[contact] as $contact)
    {      
      print_r($contact[fields][1][value][givenName].' '.$contact[fields][1][value][familyName].' '.$contact[fields][0][value]);
      echo '</br>';
    }
//echo '<pre>', HtmlSpecialChars(print_r($arrContacts),1), '</pre>';	
?>
</body>
</html>
<?php
	}
	else
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>OAuth client error</title>
</head>
<body>
<h1>OAuth client error</h1>
<p>Error: <?php echo HtmlSpecialChars($client->error); ?></p>
</body>
</html>
<?php
	}

?>