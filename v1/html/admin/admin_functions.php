<?php

function feed_category($cat) {
	global $feed_setting;

	if ($cat == 'Action') 
		$cat_id = $feed_setting['category_action'];
	elseif ($cat == 'Adventure' || $cat == 'Adventure & RPG')  
		$cat_id = $feed_setting['category_adventure'];
	elseif ($cat == 'Arcade')  
		$cat_id = $feed_setting['category_arcade'];
	elseif ($cat == 'Autopost')  
		$cat_id = $feed_setting['category_autopost'];
	elseif ($cat == 'Board Game')  
		$cat_id = $feed_setting['category_board_game'];
	elseif ($cat == 'Casino')  
		$cat_id = $feed_setting['category_casino'];
	elseif ($cat == 'Defense')  
		$cat_id = $feed_setting['category_defense'];
	elseif ($cat == 'Dress-Up')  
		$cat_id = $feed_setting['category_dress_up'];
	elseif ($cat == 'Driving' || $cat == 'Racing' || $cat == 'Uphill Racing')  
		$cat_id = $feed_setting['category_driving'];
	elseif ($cat == 'Education')  
		$cat_id = $feed_setting['category_education'];
	elseif ($cat == 'Fighting')  
		$cat_id = $feed_setting['category_fighting'];
	elseif ($cat == 'Multiplayer')  
		$cat_id = $feed_setting['category_multiplayer'];
	elseif ($cat == 'Other')  
		$cat_id = $feed_setting['category_other'];
	elseif ($cat == 'Pimp my' || $cat == 'Customize' || $cat == 'Girls' || $cat == 'Make Over' || $cat == 'Dress Up')  
		$cat_id = $feed_setting['category_customize'];
	elseif ($cat == 'Puzzles')  
		$cat_id = $feed_setting['category_puzzle'];
	elseif ($cat == 'Rhythm' || $cat == 'Music & More')  
		$cat_id = $feed_setting['category_rhythm'];
	elseif ($cat == 'RPG')  
		$cat_id = $feed_setting['category_rpg'];
	elseif ($cat == 'Shooting' || $cat == 'Shooter')  
		$cat_id = $feed_setting['category_shooter'];
	elseif ($cat == 'Sports' || $cat == 'Sports & Racing')  
		$cat_id = $feed_setting['category_sports'];
	elseif ($cat == 'Strategy' || $cat == 'Strategy & Defense' || $cat == 'Tower Defense')  
		$cat_id = $feed_setting['category_strategy'];
	elseif ($cat == 'Jigsaw')  
		$cat_id = $feed_setting['category_jigsaw'];
	elseif ($cat == 'Skill')  
		$cat_id = $feed_setting['category_skill'];
	else
		$cat_id = $feed_setting['category_other'];
	return $cat_id;
}

function escape($string) {
	if (get_magic_quotes_gpc()) {
		$string = stripslashes($string);
	}
	$string = mysql_real_escape_string($string);
	return $string;
}

function curl($url){
	$init = curl_init();
	curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($init, CURLOPT_URL, $url);
	echo curl_error($init);
	$data = curl_exec($init);
	curl_close($init);
	return $data;
}

function add_tags($tags, $gameid) {
	foreach($tags as $tag_name) {
        $tag_name = trim($tag_name);
		$tag_count = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_tags WHERE tag_name = '$tag_name'"), 0);
		if ($tag_count == 0) {
			$seo_url = seoname($tag_name, 0, 'tag');
			mysql_query("INSERT INTO ava_tags (tag_name, seo_url) VALUES ('$tag_name', '$seo_url')") or die (mysql_error());
		}
		$mysql_tag = mysql_fetch_array(mysql_query("SELECT * FROM ava_tags WHERE tag_name = '$tag_name'"));
		mysql_query("INSERT INTO ava_tag_relations (game_id, tag_id) VALUES ($gameid, $mysql_tag[id])");
	}
}
?>
