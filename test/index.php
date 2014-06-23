<?php

session_start();
try{
    $campaignID  = $_GET['id'];
}catch( Exception $e ){
    echo $e->getMessage();
    die();
}
// we need to know it
$CURRENT_URL = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

require_once('../widget/http.php');
require_once('../widget/oauth_client.php');
//require('external_oauth_client.php');

try{
    $client = new oauth_client_class;
}
catch( Exception $e ){
    echo "Ooophs, we got an error: " . $e->getMessage();
}

$provider = "";

// handle logout request
if( isset( $_GET["logout"] ) ){
    $provider = $_GET["logout"];

    $adapter = $hybridauth->getAdapter( $provider );

    $adapter->logout();

    header( "Location: index.php"  );

    die();
}

// if the user select a provider and authenticate with it
// then the widget will return this provider name in "connected_with" argument
elseif( !isset( $_GET["action"] ) ){

    // if not connected to any provider include login view
    include "login.php";
    die();

} elseif (!empty($_GET['action']) && $_GET['action'] == "login") {

    $provider = $_GET["type"];
    // include authenticated user view
    //include "contacts.php";

    header( "Location: ../widget/oauth-api/login_with_".$provider.".php" );

}elseif( isset( $_GET["connected_with"] ) && isset( $_GET["qualified"] )){

    $provider = $_GET["connected_with"];
    // include authenticated user view
    include "summary.php";
    die();
}

