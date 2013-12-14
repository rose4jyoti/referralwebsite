<?php 
define("SITE","http://softoasistech.com/dev2013/referral");
?>

<!---
<form action="" id="invite_form" class="center" method="post">
		<table cellpadding="4px" cellspacing="0" width="100%;">
			<tr style="background-color:#D9D9D9; overflow:hidden;">
				<th><input type="checkbox" id="ToggleSelectedAll" checked="checked" title="Toggle Selected"/></th>
				<th id="NameColumn">Name</th>
				<th id="EmailColumn">Email</th>
			</tr><?php foreach($this->contacts as $contact) {?>
			<tr style="overflow:hidden">
				<td><input type="checkbox" name="contacts[<?php echo $contact->email; ?>]" value="<?php echo $contact->name; ?>" checked="checked" /></td>
				<td><span class="Names"><?php echo $contact->name; ?></span></td>
				<td><?php echo $contact->email; ?></td>
			</tr><?php } ?>
		</table>
		<button type="submit" id="btnContactsForm" value="invite">Send Email (No email is sent)</button>
	</form>
---->
	
<!----------------------------------------------->
	
<?php
$host="localhost"; // Host name
$username="softoasi_referal"; // Mysql username
$password="]N^fwqZ*@7X9"; // Mysql password
$db_name="softoasi_referral"; // Database name

$tbl_name="listcontacts"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


// Insert data into mysql
//$sql="INSERT INTO $tbl_name(name, email)VALUES('$name', '$lastname', '$email')";
//$sql="INSERT INTO $tbl_name(name, email)VALUES('viky', 'kumar' )";

 $sql="TRUNCATE TABLE $tbl_name";
 $result=mysql_query($sql);
 
foreach($this->contacts as $contact) {
 echo $name= $contact->name; 
 echo $email=$contact->email; 
 $sql="INSERT INTO $tbl_name(name, email)VALUES('$name', '$email' )";
 $result=mysql_query($sql);
 
 } 

// if successfully insert data into database, displays message "Successful".
/*
if($result){
echo "Successful";
//echo "<BR>";
//echo "<a href='insert.php'>Back to main page</a>";
}

else {
echo "ERROR";
}
*/

?>

<?php
// close connection
mysql_close();
?>

<script>
//function newDoc() {
  window.location.assign("<?php echo SITE;?>/home/index/<?php echo $customerid; ?>")
 // }
</script>