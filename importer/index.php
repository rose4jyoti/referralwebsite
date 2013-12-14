<?php
//print_r($_REQUEST);
echo $customerid=$_REQUEST['id'];

include_once 'example/contacts.main.php';
$handler = new ContactsHandler();
$handler->handle_request($_POST);
?>
