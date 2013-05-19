<?php
include '../config.php';
if(isset($_COOKIE["ava_username"]))
{
	$user = $_COOKIE['ava_username'];
	$code = $_COOKIE['ava_code'];
	$userid = intval($_COOKIE['ava_userid']);
	$code2 = preg_replace("/[^a-z,A-Z,0-9]/", "", $code);
		
	$sql = mysql_query("SELECT * FROM ava_users WHERE id='$userid' AND password='$code2' AND admin='1'");
	$login_check = mysql_num_rows($sql);
	if($login_check <= 0) {
		echo 'Not admin';
		exit();
	}
	else {
		$login_status = 1;
	}
	
}

if ($login_status == 1) {
	$key = str_replace(' ', '', $_POST['key']);
	mysql_query("UPDATE ava_settings SET value='$key' WHERE name = 'license_key'") or die (mysql_error());
	header("Location: index.php");
}
?>