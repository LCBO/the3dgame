<?php
echo '
<div class="featured_game">
	<div class="featured_game_image">
		<a href="'.$featured_game['url'].'"><img src="'.$featured_game['image_url'].'" height="70" width="70" alt="'.$featured_game['name'].'" /></a>
	</div> 

	<div class="featured_game_info">
		<div class="featured_game_head">
			<a href="'.$featured_game['url'].'">'.$featured_game['name'].'</a> '.$featured_game['highscore_image'].'
		</div>
		'.$featured_game['description'].'
		<div class="home_game_options">'.$featured_game['plays'].' '.GAME_PLAYS.' &nbsp;'.GAME_RATING.': '.$featured_game['rating_value'].' &nbsp;'.$featured_game['admin_edit'].'</div>
	</div>
	<br style="clear:both" />
</div>';
?>