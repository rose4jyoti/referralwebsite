<?php 
include 'src/configs.php';
	if($userobj->getvariable("txt_email_sign")!="" && $userobj->getvariable("txt_password_sign")!="" && $userobj->getvariable("txt_password_sign")==$userobj->getvariable("txt_c_password_sign")) {
	$query="select * from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_email']."='".$userobj->getvariable("txt_email_sign")."'";
	$res=$sqlobj->getdatalistfromquery($query);
	if(count($res)>0) {
		$sesobj->assign("signup_error","1");
		echo "<script>window.location.href='index.php'</script>";die;	
	}
	$data=array();
	$data[$conf_db['db_user_field_email']]=$userobj->getvariable('txt_email_sign');
	$data[$conf_db['db_user_field_name']]=$userobj->getvariable('txt_name');
	$data[$conf_db['db_user_field_password']]=md5($userobj->getvariable('txt_password_sign'));
	$sqlobj->save($conf_db['db_user_table_name'],$data);
	$sesobj->assign("email",$userobj->getvariable('txt_email_sign'));
	$sesobj->assign("name",$userobj->getvariable('txt_name'));
	echo "<script>window.location.href='loginuser.php'</script>";
}
?>