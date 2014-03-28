<?php defined('SYSPATH') OR die('No direct script access.');


/*****Added by vikash to increase the session time*****/
return array(
	'cookie' => array(
		'encrypted' => TRUE,
	    'lifetime' => 600
	),
   
   /****added by vikash to increase session time****/	
	'native' => array(
        'name' => 'session_name',
        'lifetime' => 600
    ),
	 
	
);

