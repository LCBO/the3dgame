<?php include('header.php'); ?>
</div>
<section class="main">
    <div class="mainbgtop"></div>
    <div class="homecontent">
        <div class="clearfix">
            <article class="left widscreen">
                <?  include './includes/homepage/popular_games.inc.php';?>
            </article>
            <!------------------left end-------------------> 
            <aside class="wid302 right">
                <? include 'right.php';?>
                
            </aside>
            <!--------------------right end-------------------->  
        </div>
            <!--------------------new game-------------------->
            <?  include './includes/homepage/new_games.inc.php';?>
            <!--------------------top rate game-------------------->
            <?  include './includes/homepage/top_rate_games.inc.php';?>
            
    </div>
    <div class="mainbgfooter"></div>
</section>
<div class="advborder" style="width:728px; margin:25px auto 0;">
<? include './includes/ad/ad_728_25.php';?>
</div>
<?php include('footer.php'); ?>
