<?php
if (isset($_GET['task'])) {
	if ($_GET['task'] == 'manage_categories') { echo 'Manage Categories';}

	else if ($_GET['task'] == 'manage_games') { echo 'Manage Games'; }
	
	else if ($_GET['task'] == 'manage_highscores') { 
	
		$hs_game_name = mysql_fetch_array(mysql_query("SELECT name FROM ava_games WHERE id = $_GET[id]")); 
		echo 'Manage highscores: '.$hs_game_name['name'];
	
	}

	else if ($_GET['task'] == 'manage_pages') { echo 'Manage Pages'; }

	else if ($_GET['task'] == 'add_page') { echo 'Add Page'; }

	else if ($_GET['task'] == 'edit_page') { echo 'Edit Page'; }

	else if ($_GET['task'] == 'manage_news') { echo 'Manage News'; }
	
	else if ($_GET['task'] == 'manage_adverts') { echo 'Manage Adverts'; }
	
	else if ($_GET['task'] == 'add_advert') { echo 'Add Advert'; }

	else if ($_GET['task'] == 'edit_advert') { echo 'Edit Advert'; }

	else if ($_GET['task'] == 'add_news') { echo 'Add News'; }

	else if ($_GET['task'] == 'edit_news') { echo 'Edit News'; }

	else if ($_GET['task'] == 'manage_links') { echo 'Manage Links'; }
	
	else if ($_GET['task'] == 'manage_submissions') { echo 'Manage Submissions'; }

	else if ($_GET['task'] == 'manage_users') { echo 'Manage Users'; }

	else if (($_GET['task'] == 'manage_comments') || ($_GET['task'] == 'manage_news_comments')) { echo 'Manage Comments'; }
	
	else if ($_GET['task'] == 'settings') { echo 'Site Settings'; }

	else if ($_GET['task'] == 'mochi') { echo 'Mochi Games Feed'; }
	
	else if ($_GET['task'] == 'kongregate') { echo 'Kongregate Games Feed'; }
	
	else if ($_GET['task'] == 'download_kongregate_feed') { echo 'Downloading Kongregate Feed'; }
	
	else if ($_GET['task'] == 'fgd') { echo 'Flash Game Distribution Feed'; }
	
	else if ($_GET['task'] == 'fog') { echo 'Free Online Games Feed'; }
	
	else if ($_GET['task'] == 'spil') { echo 'Spil Games Feed'; }
	
	else if ($_GET['task'] == 'download_fgd_feed') { echo 'Downloading Flash Game Distribution Feed'; }
	
	else if ($_GET['task'] == 'feed_settings') { echo 'Game Feed Settings'; }
	
	else if ($_GET['task'] == 'download_mochi_feed') { echo 'Mochi Games Feed'; }
	
	else if ($_GET['task'] == 'download_fog_feed') { echo 'Downloading FOG Feed'; }
	
	else if ($_GET['task'] == 'download_spil_feed') { echo 'Downloading Spil Games Feed'; }
	
	else if ($_GET['task'] == 'playtomic') { echo 'Playtomic Games Feed'; }
	
	else if ($_GET['task'] == 'download_playtomic_feed') { echo 'Downloading Playtomic Feed'; }
	
	else if ($_GET['task'] == 'calc_ratings') { echo 'Recalculate Ratings'; }
	
	else if ($_GET['task'] == 'recalc_urls') { echo 'Recalculate URLs'; }
	
	else if ($_GET['task'] == 'manage_reports') { echo 'Manage Reports'; }
		
	else if ($_GET['task'] == 'manage_leaderboards') { echo 'Manage Leaderboards'; }
	
	else if ($_GET['task'] == 'manage_forums') { echo 'Manage Forums'; }
	
	else if ($_GET['task'] == 'refresh_forums') { echo 'Refresh Forums'; }

}
else { echo 'Dashboard'; }

?>