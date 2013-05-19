<?php
    if (!defined( 'AVARCADE_' )) {
            include '../../config.php';
            include '../core.php';
    }
?>           
<div class="box_a mt10 clearfix"><span><?= GAME_RATED?></span><a href="<?= $setting['site_url'].'/'.'top-rated'?>" class="more right">MORE</a></div>
    <div class="game_list small_game">
        <ul class="clearfix">
          <?php
            $cate_games = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY rating desc limit 5");
            while($top_games = mysql_fetch_array($cate_games)) {
                    $t_game = GameData($top_games, 'featured');
                    include('.'.$setting['template_url'].'/'.$template['top_rate_game']);
            }

            ?>
        </ul>

     </div> 