
<?
/**
 * play 页 底部 推荐游戏列表数据生成
 * @author kidom
 * @create 2013 5 10 
 * 
 **/
if (!defined( 'AVARCADE_' )) {
        include '../../config.php';
        include '../core.php';
}

if(!empty($_GET)) {
    $c = $_GET['cat'];
    $sql = "select id from ava_cats where seo_url = '{$c}'";
    $result = mysql_query($sql);
    $rs = mysql_fetch_array($result);
    foreach ($rs as $r) {
        $cid = $r['id'];
    }
    $sql = "select * from ava_games  where category_id = '{$cid}' order by hits limit 5";
    $date = mysql_query($sql);
    while($d = mysql_fetch_array($date)) {
        $s_game = GameData($d, 'featured');
        include('.'.$setting['template_url'].'/'.$template['suggestion_game']);
    }
}
?>