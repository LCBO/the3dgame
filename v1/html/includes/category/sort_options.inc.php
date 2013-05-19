<?php
defined( 'AVARCADE_' ) or die( '' );

foreach ($sort_options as $key => $sort_name) {
	$url = CategoryUrl($cat_info['id'], $cat_info['seo_url'], 1, $key);

	echo '<a href="'.$url.'">'.$sort_name.'</a>';

	if ($key != 'namedesc') {
		echo ' | ';
	}
}
?>