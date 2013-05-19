<?php
echo '<ul>';
$sql = mysql_query("SELECT * FROM ava_users ORDER BY 0+points desc LIMIT 10");
while($row = mysql_fetch_array($sql)) {
	
	$name = shortenStr($row['username'], $template['module_max_chars']);
	
	$username = htmlspecialchars($name);
			
	$url = ProfileUrl($row['id'], $row['seo_url']);
	
	if ($setting['module_thumbs'] == 1) {
		$avatar = '<img src="'.AvatarUrl($row['avatar'], $row['facebook'], $row['facebook_id']).'" width="25" height="25" style="vertical-align: middle;" alt="'.$username.'" />';
	}
	else {
		$avatar = '';
	}
	
	echo '<li>'.$avatar.' <a href="'.$url.'">'.$username.'</a>';
	if ($row['points'] != '') {
		echo ' ('.$row['points'].' '.POINTS.')';
	}
	else {
		echo ' (0 '.POINTS.')';
	}
	echo '</li>';
}
echo '</ul>';
?>
