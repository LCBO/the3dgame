<?php
if ($user['login_status'] == 1) {
	$q = mysql_query("SELECT favourites from ava_users WHERE id=$user[id]");
	$favs = mysql_fetch_array($q);
	if ($favs['favourites'] == '') {
		echo '<div class="module_notice">'.PROFILE_NO_FAVS.'</div>';
	}
	else {
		echo '<ul>';
		$favourites = substr($favs['favourites'], 2);

		$sql = mysql_query("SELECT * from ava_games WHERE id IN ($favourites) AND published = 1 LIMIT 10");
		while($row = mysql_fetch_array($sql)) {
	
			$url = GameUrl($row['id'], $row['seo_url'], $row['category_id']);
	
			$name = shortenStr($row['name'], $template['module_max_chars']);
			
			if ($setting['module_thumbs'] == 1) {
				$image_url = GameImageUrl($row['image'], $row['import'], $row['url']);
				$image = '<img src="'.$image_url.'" width= 25 height= 25 style="vertical-align: middle;" /> ';
			}
			else {
				$image = '';
			}
	
			echo '<li>'.$image.'<a href="'.$url.'">'.$name.'</a></li>';
		}
		echo '</ul>';
		
		echo '<div class="more_links"><a href="'.ProfileUrl($user['id'], $user['seo_url']).'">'.FAVOURITES_VIEW_ALL.' &raquo;</a></div>';
	}
}
else {
	echo '<div class="module_notice">'.FAVOURITES_LOG_IN.'</div>';
}
?>
