<?
/**
 * 首页最近浏览游戏记录
 * @author kidom
 * @create 2013 5 13
 **/
if (!defined( 'AVARCADE_' )) {
        include '../../config.php';
        include '../core.php';
}
?>
<ul class="recently clearfix mb10">
<?
if(isset($_COOKIE['history'])) {
    $name = $_COOKIE['history'];
    $sql = "select * from ava_games where seo_url in ({$name})  and published = 1";
    $q = mysql_query($sql);
    $i = 0;
    while($ds = mysql_fetch_array($q)) {
        if($i > 1) {
            continue;
        }
        $games = GameData($ds, 'featured');
        include('.'.$setting['template_url'].'/'.$template['recently_played_game']);
        $i ++;
    }
}else {
    echo "You have not been played a game.";
}
?>
</ul>