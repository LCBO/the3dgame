<?php
$total_results = $cat_numb;
$page = isset($page)?$page:1;//
echo '<div class="page">';
/*if ($id != 0) {
	$sq2 = mysql_query("SELECT * FROM ava_cats WHERE id = $id");
	$cat_info = mysql_fetch_array($sq2);
}
else {
	$cat_info = array('seo_url' => 'all');
}

if (!isset($_GET['sortby']) || $_GET['sortby'] == '') {
	$sortby = 'newest';
}
else {
	$sortby = mysql_secure($_GET['sortby']);
}

if($page > 1){
    $prev = ($page - 1);
    $url = CategoryUrl($id, $cat_info['seo_url'], $prev, $sortby);

    //echo '<a href="'.$url.'" rel="prev">&laquo; '.PREVIOUS.'</a> ';
}

if ($page > 4) {
	$url = CategoryUrl($id, $cat_info['seo_url'], 1, $sortby);
	echo '<a href="'.$url.'" class="select">1</a> ';
}
if ($page > 5) {
	$url = CategoryUrl($id, $cat_info['seo_url'], 2, $sortby);
	echo '<a href="'.$url.'">2</a> ... ';
}
*/
$low = $page - 4;
$high = $page + 8;

for($i = 1; $i <= $total_pages; $i++){
    if (($i > $low) && ($i < $high)) {
        if($page == $i){
            echo '<a href="#" class="select">'.$i.'</a> ';
        } else {
            //$url = CategoryUrl($id, $cat_info['seo_url'], $i, $sortby);
            $url = get_url($get_name.'/'.$sortby.'/'.$i);
            echo '<a href="'.$url.'" '.iif($page == $i, 'class="select"').'>'.$i.'</a> ';
    	}
    }
}
/*
if (($page < $total_pages - 8)) {
    $penultimate = $total_pages - 1;
    $url = CategoryUrl($id, $cat_info['seo_url'], $penultimate, $sortby);
    echo ' ... <a href="'.$url.'">'.$penultimate.'</a> ';
}
if (($page < $total_pages - 7)) {
	$url = CategoryUrl($id, $cat_info['seo_url'], $total_pages, $sortby);
	echo '<a href="'.$url.'">'.$total_pages.'</a> ';
}
*/
if($page < $total_pages){
    $next = ($page + 1);
    //$url = CategoryUrl($id, $cat_info['seo_url'], $next, $sortby);
    $url = get_url($get_name.'/'.$sortby.'/'.$next);
    echo '<a href="'.$url.'" rel="next" class="next"></a> ';
}
echo '</div>';
?>