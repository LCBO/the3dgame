<?php
/**
 * play页面，面包屑导航
 * @author kidom
 * @create 2013 5 9
 */

if (!defined( 'AVARCADE_' )) {
        include '../../config.php';
        include '../core.php';
}

if(!empty($_GET)) {
    $c = $_GET['cat'];
    $cate = ucwords($c.' game');
    
    $seo_name = $_GET['name']; 
    $date = mysql_query("SELECT name FROM ava_games WHERE seo_url = '{$seo_name}'");
    while($name = mysql_fetch_array($date)) {
        $query = mysql_query("select seo_url from ava_cats where name = '{$c}'");
        $re = mysql_fetch_array($query);
        $seo_cate = $re['seo_url'];
        $cate_url = CategoryUrl('', $seo_cate, 1, 'newest');
        include ('.'.$setting['template_url'].'/'.$template['breadcrumbs']);
    }
}
?>
