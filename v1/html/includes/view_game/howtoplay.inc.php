<?
/**
 * play页面，hotplay 介绍内容数据获取
 * @author kidom
 * @create 2013 5 10
 */
if (!defined( 'AVARCADE_' )) {
        include '../../config.php';
        include '../core.php';
}

if(!empty($_GET)) {
    $seo_name = $_GET['name']; 
    $sql = "select instructions from ava_games where seo_url = '{$seo_name}' and published = 1";
    $date = mysql_query($sql);
    while($d = mysql_fetch_array($date)) {
        $instructions = $d['instructions'];
        include('.'.$setting['template_url'].'/'.$template['howtoplay_game']);
    }
}
?>