<?php

require_once '../config.php';
include ('../includes/core.php');
$i = 1;

$query = mysql_real_escape_string($_POST['q']);
if ($query != '') {

$total_results_search = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_games WHERE name like \"%$query%\""),0);
if ($total_results_search > 0) {
	$sql = mysql_query("SELECT * FROM ava_games WHERE name like \"%$query%\" order by id DESC LIMIT 10");

	echo '<div class="search_title"><span class="sti">Games</span></div>';

	while ($game = mysql_fetch_array($sql)) {
		if ($i == 1) {
			$class = 'search_item_selected';
		}
		else {
			$class = 'search_item';
		}
		echo '<div id="'.$i.'" class="'.$class.'" onmouseover="highlightResult('.$i.')"><a href="?task=manage_games#id='.$game['id'].'" id="slnk'.$i.'">'.$game['name'].'</a></div>';
		$i += 1;
	}
}

$total_users = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_users WHERE username like \"%$query%\""),0);
if ($total_users > 0) {
	echo '<div class="search_title"><span class="sti">Users</span></div>';

	$sql_users = mysql_query("SELECT * FROM ava_users WHERE username like \"%$query%\" order by id DESC  LIMIT 5");
	while ($user = mysql_fetch_array($sql_users)) {
		if ($i == 1) {
			$class = 'search_item_selected';
		}
		else {
			$class = 'search_item';
		}
		echo '<div id="'.$i.'" class="'.$class.'" onmouseover="highlightResult('.$i.')"><a href="?task=manage_users#id='.$user['id'].'" id="slnk'.$i.'">'.$user['username'].'</a></div>';
		$i += 1;
	}
}

$total_news = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_news WHERE title like \"%$query%\""),0);
if ($total_news > 0) {
	echo '<div class="search_title"><span class="sti">News</span></div>';

	$sql_news = mysql_query("SELECT * FROM ava_news WHERE title like \"%$query%\" order by id DESC  LIMIT 5");
	while ($news = mysql_fetch_array($sql_news)) {
		if ($i == 1) {
			$class = 'search_item_selected';
		}
		else {
			$class = 'search_item';
		}
		echo '<div id="'.$i.'" class="'.$class.'" onmouseover="highlightResult('.$i.')"><a href="?task=edit_news&id='.$news['id'].'" id="slnk'.$i.'">'.$news['title'].'</a></div>';
		$i += 1;
	}
}

$total_pages = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_pages WHERE name like \"%$query%\""),0);
if ($total_pages > 0) {
	echo '<div class="search_title"><span class="sti">Pages</span></div>';

	$sql_pages = mysql_query("SELECT * FROM ava_pages WHERE name like \"%$query%\" order by id DESC  LIMIT 5");
	while ($pages = mysql_fetch_array($sql_pages)) {
		if ($i == 1) {
			$class = 'search_item_selected';
		}
		else {
			$class = 'search_item';
		}
		echo '<div id="'.$i.'" class="'.$class.'" onmouseover="highlightResult('.$i.')"><a href="?task=edit_page&id='.$pages['id'].'" id="slnk'.$i.'">'.$pages['name'].'</a></div>';
		$i += 1;
	}
}


$total_ads = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_adverts WHERE ad_name like \"%$query%\""),0);
if ($total_ads > 0) {
	echo '<div class="search_title"><span class="sti">Adverts</span></div>';

	$sql_ad = mysql_query("SELECT * FROM ava_adverts WHERE ad_name like \"%$query%\" order by id DESC  LIMIT 5");
	while ($ad = mysql_fetch_array($sql_ad)) {
		if ($i == 1) {
			$class = 'search_item_selected';
		}
		else {
			$class = 'search_item';
		}
		echo '<div id="'.$i.'" class="'.$class.'" onmouseover="highlightResult('.$i.')"><a href="?task=edit_advert&id='.$ad['id'].'" id="slnk'.$i.'">'.$ad['ad_name'].'</a></div>';
		$i += 1;
	}
}


}
?>