
<div  class="leftmain"> 
    <?php
        if (!defined( 'AVARCADE_' )) {
                include '../../config.php';
                include '../core.php';
        }
    ?>
    <div class="box_a clearfix"><span><h1><?=GAME_POPULAR?></h1></span><a href="<?= $setting['site_url'].'/'.'most-popular'?>" class="more right">MORE</a></div>
    <div class="game_list">
       <ul class="clearfix">
    <?php
        $popular_games = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY hits desc limit 9");
        while($pop_games = mysql_fetch_array($popular_games)) {
                $p_game = GameData($pop_games, 'featured');
                include('.'.$setting['template_url'].'/'.$template['popular_game']);
        }
       
        ?>
   