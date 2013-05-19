<?php if ($report_count >= 1) { 
	$reports = ' ('.$report_count.')';
}
else {
	$reports = '';
}
?>

<ul id="sddm">
	<li><a href="?">Home</a></li>
    <li  id="m1-t"><a href="?task=manage_reports#page=1&type=all" 
        onmouseover="mopen('m1')" 
        onmouseout="mclosetime()">Reports <?php echo $reports;?></a>
        <div id="m1" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="?task=manage_reports#page=1&type=comments">Comment reports (<?php echo $report_count_c;?>)</a>
        <a href="?task=manage_reports#page=1&type=games">Game reports (<?php echo $report_count_g;?>)</a>
        <a href="?task=manage_reports#page=1&type=users">User reports (<?php echo $report_count_u;?>)</a>
        <a href="?task=manage_reports#page=1&type=pms">PM reports (<?php echo $report_count_pm;?>)</a>
        <?php if ($setting['forums_installed'] == 1) { ?>
        <a href="?task=manage_reports#page=1&type=posts">Post reports (<?php echo $report_count_p;?>)</a>
        <?php } ?>
         
        </div>
    </li>
    <li id="m3-t"><a href="?task=manage_games#page=1&cat=All" 
        onmouseover="mopen('m3')" 
        onmouseout="mclosetime()">Games
        <?php
        if ($submissions_count != 0)
        	echo ' ('.$submissions_count.')';
        ?>
        </a>
        <div id="m3" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="?task=manage_games#page=1&cat=All">Manage games</a>
        <a href="?task=manage_submissions#page=1">Submissions
        <?php
        	echo ' ('.$submissions_count.')'; 
        ?>
        </a>
        <a href="?task=manage_categories">Categories</a>
        <a href="?task=manage_leaderboards#page=1">Leaderboards</a>
        </div>
    </li>
    <li id="m2-t"><a href="?task=mochi#page=1&cat=All" 
        onmouseover="mopen('m2')" 
        onmouseout="mclosetime()">Feeds</a>
        <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="?task=mochi#page=1&cat=All">Mochi</a>
        <a href="?task=fgd#page=1&cat=All">Flash game distribution</a>
        <a href="?task=kongregate#page=1&cat=All">Kongregate</a>
        <a href="?task=fog#page=1&cat=All">Free Online Games</a>
        <a href="?task=spil#page=1&cat=All">Spil Games</a>
        <a href="?task=feed_settings">Feed settings</a>
        </div>
    </li>
    
    <li><a href="?task=manage_pages">Pages</a></li>
    <li><a href="?task=manage_news">News</a></li>
    <li><a href="?task=manage_users#page=1">Users</a></li>
     <li><a href="?task=manage_links">Links
     <?php if ($links_count != 0)
        	echo ' ('.$links_count.')';
     ?>
     </a></li>
    
    <li id="m4-t"><a href="?task=manage_comments#page=1" 
        onmouseover="mopen('m4')" 
        onmouseout="mclosetime()">Comments</a>
        <div id="m4" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="?task=manage_comments#page=1">Game comments</a>
        <a href="?task=manage_news_comments#page=1">News comments</a>
        </div>
    </li>
     <li><a href="?task=manage_adverts">Adverts</a></li>
     <?php if ($setting['forums_installed'] == 1) { ?>
     	<li><a href="?task=manage_forums">Forums</a></li>
     <?php } ?>
     <li><a href="?task=settings">Settings</a></li>
</ul>