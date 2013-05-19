<?php
    if (!defined( 'AVARCADE_' )) {
            include '../../config.php';
            include '../core.php';
    }
?>
<div class="box_a mt10 clearfix"><span><?= GAME_NEW?></span><a href="<?= CategoryUrl(0, 'new', 1, 'newest')?>" class="more right">MORE</a></div>
<div class="game_list small_game">
    <ul class="clearfix">
        <?php
        $cate_games = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY date_added desc limit 5");
        while($ca_games = mysql_fetch_array($cate_games)) {
                $new_game = GameData($ca_games, 'featured');
                include('.'.$setting['template_url'].'/'.$template['new_game']);
        }
       
        ?>
    </ul>

</div> 
  

