<?php
if (isset($_GET['task'])) {
	if ($_GET['task'] == 'manage_games') { include 'pages/manage_games.php'; }

	else if ($_GET['task'] == 'manage_categories') { include 'pages/manage_categories.php'; }
	
	else if ($_GET['task'] == 'manage_highscores') { include 'pages/manage_highscores.php'; }
	
	else if ($_GET['task'] == 'manage_leaderboards') { include 'pages/manage_leaderboards.php'; }

	else if ($_GET['task'] == 'manage_pages') { include 'pages/manage_pages.php'; }

	else if ($_GET['task'] == 'add_page') { include 'pages/add_page.php'; }
	
	else if ($_GET['task'] == 'manage_submissions') { include 'pages/manage_submissions.php'; }

	else if ($_GET['task'] == 'edit_page') { include 'pages/edit_page.php'; }

	else if ($_GET['task'] == 'manage_news') { include 'pages/manage_news.php'; }

	else if ($_GET['task'] == 'add_news') { include 'pages/add_news.php'; }
	
	else if ($_GET['task'] == 'recalc_urls') { include 'pages/recalc_urls.php'; }

	else if ($_GET['task'] == 'edit_news') { include 'pages/edit_news.php'; }

	else if ($_GET['task'] == 'manage_links') { include 'pages/manage_links.php'; }

	else if ($_GET['task'] == 'manage_users') { include 'pages/manage_users.php'; }

	else if ($_GET['task'] == 'manage_comments') { include 'pages/manage_comments.php'; }
	
	else if ($_GET['task'] == 'manage_news_comments') { include 'pages/manage_news_comments.php'; }

	else if ($_GET['task'] == 'mochi') { include 'feeds/mochi/mochi.php'; }
	
	else if ($_GET['task'] == 'feed_settings') { include 'pages/feed_settings.php'; }
	
	else if ($_GET['task'] == 'download_mochi_feed') { include 'feeds/mochi/download_mochi_feed.php'; }
	
	else if ($_GET['task'] == 'download_fgd_feed') { include 'feeds/fgd/download_fgd_feed.php'; }
	
	else if ($_GET['task'] == 'playtomic') { include 'feeds/playtomic/playtomic.php'; }
		
	else if ($_GET['task'] == 'download_playtomic_feed') { include 'feeds/playtomic/download_playtomic_feed.php'; }
	
	else if ($_GET['task'] == 'kongregate') { include 'feeds/kongregate/kongregate.php'; }
	
	else if ($_GET['task'] == 'download_kongregate_feed') { include 'feeds/kongregate/download_kongregate_feed.php'; }
	
	else if ($_GET['task'] == 'fog') { include 'feeds/fog/fog.php'; }
	
	else if ($_GET['task'] == 'spil') { include 'feeds/spil/spil.php'; }
	
	else if ($_GET['task'] == 'download_fog_feed') { include 'feeds/fog/download_fog_feed.php'; }
	
	else if ($_GET['task'] == 'download_spil_feed') { include 'feeds/spil/download_spil_feed.php'; }
	
	else if ($_GET['task'] == 'fgd') { include 'feeds/fgd/fgd.php'; }

	else if ($_GET['task'] == 'settings') { include 'pages/settings.php'; }
	
	else if ($_GET['task'] == 'autopost') { include 'pages/mochi_autopost.php'; }
	
	else if ($_GET['task'] == 'calc_ratings') { include 'pages/calc_ratings.php'; }
	
	else if ($_GET['task'] == 'manage_adverts') { include 'pages/manage_adverts.php'; }
	
	else if ($_GET['task'] == 'add_advert') { include 'pages/add_advert.php'; }
	
	else if ($_GET['task'] == 'edit_advert') { include 'pages/edit_advert.php'; }
	
	else if ($_GET['task'] == 'manage_reports') { include 'pages/manage_reports.php'; }
		
	// Forums
	else if ($_GET['task'] == 'manage_forums') { include 'pages/manage_forums.php'; }
	
	else if ($_GET['task'] == 'post_reports') { include 'pages/post_reports.php'; }
	
	else if ($_GET['task'] == 'refresh_forums') { include 'pages/refresh_forums.php'; }
}
else { include 'pages/home.php'; }
?>