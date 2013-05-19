<?php
if ($setting['seo_on'] == 0) {
	echo '<a href="'.$setting['site_url'].'">'.HOMEPAGE.'</a>'.$template['pages_menu_seperator'].
	'<a href="'.$setting['site_url'].'/index.php?task=news">'.NEWS.'</a>'.$template['pages_menu_seperator'];
	if ($setting['forums_installed'] == 1) {
		echo '<a href="'.$setting['site_url'].'/index.php?task=forums">'.FORUMS.'</a>'.$template['pages_menu_seperator'];
	}
	echo '<a href="'.$setting['site_url'].'/rss.php">'.PAGES_SUBSCRIBE.'</a>'.$template['pages_menu_seperator'].
	'<a href="'.$setting['site_url'].'/index.php?task=member_list">'.MEMBER_LIST.'</a>'.$template['pages_menu_seperator'].
	'<a href="'.$setting['site_url'].'/index.php?task=links">'.LINKS.'</a>';
	
	if ($setting['allow_submissions'] == 1) {
		echo $template['pages_menu_seperator'].'<a href="'.$setting['site_url'].'/index.php?task=submit">'.SUBMIT_GAME.'</a>';
	}
}
else {
	echo '<a href="'.$setting['site_url'].'">'.HOMEPAGE.'</a>'.$template['pages_menu_seperator'].
	'<a href="'.$setting['site_url'].'/news'.$setting['seo_extension'].'">'.NEWS.'</a>'.$template['pages_menu_seperator'];
	if ($setting['forums_installed'] == 1) {
		echo '<a href="'.$setting['site_url'].'/forums">'.FORUMS.'</a>'.$template['pages_menu_seperator'];
	}
	echo '<a href="'.$setting['site_url'].'/rss.php">'.PAGES_SUBSCRIBE.'</a>'.$template['pages_menu_seperator'].
	'<a href="'.$setting['site_url'].'/members'.$setting['seo_extension'].'">'.MEMBER_LIST.'</a>'.$template['pages_menu_seperator'].
	'<a href="'.$setting['site_url'].'/links'.$setting['seo_extension'].'">'.LINKS.'</a>';
	if ($setting['allow_submissions'] == 1) {
		echo $template['pages_menu_seperator'].'<a href="'.$setting['site_url'].'/submit-game'.$setting['seo_extension'].'">'.SUBMIT_GAME.'</a>';
	}
} 


	
$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_pages WHERE menu = 1"),0); 
if ($total_results >= 1) {
	$sql = mysql_query("SELECT * FROM ava_pages WHERE menu = 1 ORDER BY id");
	while($row = mysql_fetch_array($sql)) {
		$url = PageUrl($row['id'], $row['seo_url']);
		echo $template['pages_menu_seperator'].'<a href="'.$url.'">'.$row['name'].'</a>';
	}
}
?>