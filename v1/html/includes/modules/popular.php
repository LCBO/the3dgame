<?php
echo '<ul>';
$sql = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY hits desc LIMIT 10");
while($row = mysql_fetch_array($sql)) {
	
	$url = GameUrl($row['id'], $row['seo_url'], $row['category_id']);
		
	$name = shortenStr($row['name'], $template['module_max_chars']);
	
	if ($setting['module_thumbs'] == 1) {
		$image_url = GameImageUrl($row['image'], $row['import'], $row['url']);
		$image = '<img src="'.$image_url.'" width="25" height="25" style="vertical-align: middle;" alt="'.$row['name'].'" /> ';
	}
	else {
		$image = '';
	}
	
	echo '<li>'.$image.'<a href="'.$url.'">'.$name.'</a></li>';
}
echo '</ul>';
?>