<?php
if(isset($_COOKIE["ava_username"]))
{
	$user = $_COOKIE['ava_username'];
	$code = $_COOKIE['ava_code'];
	$userid = intval($_COOKIE['ava_userid']);
	$code2 = preg_replace("/[^a-z,A-Z,0-9]/", "", $code);
		
	$sql = mysql_query("SELECT * FROM ava_users WHERE id='$userid' AND password='$code2' AND admin='1' AND banned = 0");
	$login_check = mysql_num_rows($sql);
	if($login_check <= 0) {
		echo 'Not admin';
		exit();
	}
	else {
		$login_status = 1;
		$admin = mysql_fetch_array($sql);
	}
	
}
else {
	include 'login_page.php';
	exit();	
}

$key = $setting['license_key'];
$keychars = strlen($key);
if ($keychars != 34) {
	include 'key_page.php';
	exit();
}

$version_no = '5.7.4';
$forum_rec_version = '1.0.2';
?>