<?
/**
 * 个人中心最近浏览游戏记录
 * @author kidom
 * @create 2013 5 13
 **/
if (!defined( 'AVARCADE_' )) {
        include '../../config.php';
        include '../core.php';
}
?>
<div class="game_list small_game lesser">
    <ul class="clearfix">
<?
if(isset($_COOKIE['history'])) {
    $name = $_COOKIE['history'];
    $sql = "select * from ava_games where seo_url in ({$name})  and published = 1";
    $q = mysql_query($sql);
    while($ds = mysql_fetch_array($q)) { 
        $games = GameData($ds, 'featured');
        include('.'.$setting['template_url'].'/'.$template['last_played_game']);
    }
}else {
    echo "You have not been played a game.";
}
?>  
    </ul>
</div>