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
	$client->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
		dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/login_with_google.php';

	$client->client_id = '586573025089.apps.googleusercontent.com'; $application_line = __LINE__;
	$client->client_secret = 'l7s648yocqis6RPH9CzBBwC3';

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
    //print "<pre>" . print_r(json_decode($xml, true), true) . "</pre>";
    
    echo '<h1>', HtmlSpecialChars($xml->author->name),' you have logged in successfully with Google!</h1>';
    
    //echo count($xml->entry).'<br>';
    
    foreach ($xml->entry as $entry) {
        foreach ($entry->xpath('gd:email') as $email) {
          //$output_array[] = array((string)$entry->title, (string)$email->attributes()->address);
            if($entry->title == ''){
                echo $email->attributes()->address.':'.$email->attributes()->address.'<br>';
            }else{
                echo $entry->title.':'.$email->attributes()->address.'<br>';
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
	{
?>
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