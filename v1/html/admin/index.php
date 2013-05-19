<?php ob_start();
include '../config.php';
include '../includes/core.php';
include 'admin_functions.php';
include 'secure.php'; 
$core_admin = 1;
$version = ' '.$version_no;
if ($setting['forums_installed'] == 1) {
	require_once '../avforums/forum_core.php';
	$version .= ' | AV Arcade Forums '.$forums_version_number;

	if ($version_no < $forums_required_version) {
		$ava_needs_updating = TRUE;
	}
	else if ($forums_version_number < $forum_rec_version) {
		$forums_need_updating = TRUE;
	}
}

// Update users online
include '../includes/update_users_online.php';

// Get total reports no.
$report_count_g = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_reported WHERE type = 1"), 0);
$report_count_c = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_reported WHERE type = 2 OR type = 3"), 0);
$report_count_p = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_reported WHERE type = 4"), 0);
$report_count_u = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_reported WHERE type = 5"), 0);
$report_count_pm = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_reported WHERE type = 6"), 0);
$report_count = $report_count_c + $report_count_g + $report_count_p + $report_count_u + $report_count_pm;

$submissions_count = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_submissions WHERE file != ''"), 0);
$links_count = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_links WHERE published = 0 AND (submitter != 0 OR submitter_email != '')"), 0);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include ('title.php'); ?> - AV Arcade</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="admin.css" />

<?php include('js/js.php');?>

</head>
<body onload="pageloadcheck();">
<script type="text/javascript" src="js/wz_tooltip.js"></script>
<div class="admin_header_container">
	<div class="admin_header">
		<div class="logo"><a href="index.php"><img src="images/logo.png" alt="logo" width="188" height="64" /></a></div>
		<div class="global_search_container" id="global_sc">
			<form name="form" onsubmit="return false" method="get">
				<input name="q" id="gSearch" type="text" size="15" class="global_searchbox" value="Search..." autocomplete="off" onkeydown="return searchInput(event);" onclick="gclickclear(this, 'Search...')" onblur="gclickrecall(this,'Search...');hideResults(0);"/>
			</form>
			<div class="search_popup" id="search_popup">
				<div class="search_popup_content" id="search_results">
				</div>
				<div class="search_popup_bottom"></div>
			</div>
		</div>
	</div>
</div>

<div class="menu_container">
<div class="menu">
<?php include 'menu.php';?>
</div>
</div>

<div align="center">
<div class="admin_container">
<?php
if ($setting['seo_on'] == 0) {
	$msg_url = $setting['site_url'].'/index.php?task=messages';
} else {
	$msg_url = $setting['site_url'].'/messages'.$setting['seo_extension'];
}
?>

<div class="menu2"><div class="menu2_left">Hello <?php echo $user;?> - <a href="<?php echo $msg_url;?>">Messages (<?php echo $admin['messages'];?>)</a> | <a href="http://www.avscripts.net/store/customers" target="_blank">Customer area</a> | <a href="http://www.forum.avscripts.net" target="_blank">Support forums</a></div>

<div class="menu2_right"><a href="../login.php?action=logout">Log-out</a> | <a href="<?php echo $setting['site_url'];?>">View site &raquo;</a></div>
<div class="clear"></div>
</div>

<div class="main_container">

<div align="center"><div class="title"><?php include ('title.php'); ?></div><br />

<?php
if(file_exists('../install')) {
    echo '<b>Urgent: Install folder detected at <a href="'.$setting['site_url'].'/install">'.$setting['site_url'].'/install</a>. Remove the install folder for security reasons.</b><br /><br />';
} elseif ($setting['site_offline'] == 1) {
	 echo '<b>Notice: Site is currently in offline mode</b><br /><br />';
}


include ('content.php');
$year = date("Y");
 ?>

<div class="clear"></div>
</div></div>
<div class="bottom">AV Arcade <?php echo $version;?> - Copyright <?php echo $year;?> AV Scripts</div>
</div>
<br />
</div>
</body>
</html>
<?php ob_end_flush();	?>
