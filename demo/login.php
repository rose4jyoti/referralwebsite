<?php 
include 'src/configs.php';
if($userobj->getvariable("txt_email")!="" && $userobj->getvariable("txt_password")!="") {
	$query="select * from ".$conf_db['db_user_table_name']." where ".$conf_db['db_user_field_email']."='".$userobj->getvariable("txt_email")."' and ".$conf_db['db_user_field_password']."='".md5($userobj->getvariable("txt_password"))."' and ". $conf_db['db_user_field_social_network_type']."=''";
	$res=$sqlobj->getdatalistfromquery($query);
	if(count($res)>0) {
		$sesobj->assign("email",$res['0'][$conf_db['db_user_field_email']]);
		$sesobj->assign("name",$res['0'][$conf_db['db_user_field_name']]);
		echo "<script>window.location.href='loginuser.php'</script>";die;
	} else {
		$sesobj->assign("login_error","1");
		echo "<script>window.location.href='".$conf_main['base_path']."'</script>";die;
	}
}
?>