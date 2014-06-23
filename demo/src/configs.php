<?php
/** General configurations */

/** Load Class Filess */
require_once("session.inc");
require_once("mysql.inc");
require_once("db.inc");
require_once("userfunctions.inc");


//Base path of your application. You must give full path! example : http://happytechies.com/login/
$conf_main['base_path'] = '';
//Default cookie expire time is now 1 month
$conf_main['expire_time'] = time() + 60*60*24*30;//1 month

/*
To Enable cookie For 1 Minute 
$conf_main['expire_time'] = time() + 60;//1 Minute

To Enable cookie For 1 Hour 
$conf_main['expire_time'] = time() + 60*60;//1 Hour

To Enable cookie For 1 Day 
$conf_main['expire_time'] = time() + 60*60*24;//1 Day

*/
//Domain name Example : http://happytechies.com/
$conf_main['domain_name'] = '';




//DB Configurations
//Db server e.g. 'localhost'
$conf_db['db_server'] = "";
//Db name : e.g. 'CustomerDb'
$conf_db['db_name'] = "";
//Db username : e.g. 'root'
$conf_db['db_username'] = "";
//Db password
$conf_db['db_password'] = "";
//Db table name. e.g. 'tbl_users'
$conf_db['db_user_table_name'] = "";
//Id field of user table . e.g. 'id'
$conf_db['db_user_field_id'] = "";
//Name field of user table . e.g. 'name'
$conf_db['db_user_field_name'] = "";
//Id field of user table . e.g. 'username'
$conf_db['db_user_field_username'] = "";
//Id field of user table . e.g. 'password'
$conf_db['db_user_field_password'] = "";
//Id field of user table . e.g. 'email'
$conf_db['db_user_field_email'] = "";
//Id field of user table . e.g. 'network_type'
$conf_db['db_user_field_social_network_type'] = "";
//Password stored as md5?
$conf_db['password_md5'] = true;


/** Create database object */
$sqlobj=new dbconn($conf_db['db_server'],$conf_db['db_username'],$conf_db['db_password'],$conf_db['db_name']);

/** Create session object */
$sesobj=new SESSION_MANAGEMENT();

/** Create UserFunctions object */
$userobj=new UserFunctions();

/** Twitter configurations */

//Twitter credentials
$conf_twitter['consumer_key'] = '';
$conf_twitter['consumer_secret'] = '';
$conf_twitter['oauth_token'] = '';
//Callback url for twitter. e.g. http://happytechies.com/login/callback.php?type=twitter
$conf_twitter['oauth_callback'] = '';

/** Facebook configurations */

//Facebook credentials
$conf_facebook['appId'] = '';
$conf_facebook['secret'] = '';
//Callback url for facebook. e.g. http://happytechies.com/login/callback.php?type=facebook 
$conf_facebook['redirect_uri'] = '';
//Facebook callback fields(default values, it can be empty)
$conf_facebook['fields'] = 'id,name,first_name,last_name,email';
//Facebook permissions(default values)
$conf_facebook['permissions'] = 'email,publish_stream,user_status';

/** Linked configurations */

//Linkedin credentials
$conf_linkedin['linkedin_access'] = '';
$conf_linkedin['linkedin_secret'] = '';
//Callback url for linkedin. e.g. http://happytechies.com/login/callback.php?type=linkedin
$conf_linkedin['callback_url'] = '';
$conf_linkedin['base_url'] = $conf_main['base_path'];

/** Google configurations */

//Callback url for google. e.g. http://happytechies.com/login/callback.php?type=google
$conf_google['return_url'] = '';

/** Yahoo configurations */

//Yahoo credentials

//Callback url for yahoo. e.g. http://happytechies.com/login/callback.php?type=yahoo
$conf_yahoo['return_url'] = '';

