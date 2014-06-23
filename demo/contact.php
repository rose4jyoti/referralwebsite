<?php 
 session_start(); 
 if($_POST['email']!="" && $_POST['verify']!="") {
	if($_POST['verify']==$_SESSION['verify']) {
		/*    your code here*/
		echo "1";
	} else {
		echo "0";
	}
}
?>