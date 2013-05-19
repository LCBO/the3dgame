<?
include_once './includes/core.php';
if(!empty($_GET['name'])) {
    $name = $_GET['name'];
    set_history($name);
}

?>
<?php include('header.php'); ?>
<section class="main">
    <div class="mainbgtop"></div>
    <div class="content">
          <!------------------- breadcrumbs ---------------------->
          <? include './includes/view_game/breadcrumbs.inc.php'?>
          <!--<div class="box_b_c"><a href="<?= $setting['site_url']?>">Home</a><span class="box_b_s"></span><a href=""><h1>Racing Games</h1></a><span class="box_b_s"></span><a href="#">American Racing</a></div>-->
        <div class="mt10 clearfix">
            <article class="left widscreen">
               <div class="play_game"> 
		<?php include (  './includes/view_game/game.inc.php'  ); // Include the flash game ?>
               </div> 
            </article>
            <!------------------left end---------------------->
            <aside class="play_game_right">
         
                 <div class="advborder">
                     <? include './includes/ad/ad_160_600.php';?>
                 </div>
            </aside>
            <!--------------------right end-------------------->  
        </div>
        <ul class="tab_comment mt10 clearfix">
            <span class="left_top"></span>
            <li class="howto_but select"><?= GAME_HOW_TO_PALY?></li>
            <li class="comments_but"><?= GAME_COMMENTS?></li>
            <li class="share_but"><?= GAME_SHARE?></li>
        </ul>
        <div class="tab_content">
           <div class="howtoplay">
               <? include './includes/view_game/howtoplay.inc.php';?>
           </div>
           <div class="comment_content" style="display:none;">
              <ul>
                 <li>
                     <a href="#"><img src="images/avatar_comment.png" class="avatar_comment" /></a>
                     <div class="comment_mes">
                        <p class="title">Japhet Batucan</p>
                        <p>I love this game its ausome so douse toritigger123 I love this game its ausome so douse toritigger123 </p>
                        <p class="color_444">said 1 hour ago - <a href="#write_comment" class="color_08c">Report</a></p>
                     </div>
                     <a href="#" class="asfriend">Add as Friend</a>
                 </li>
                 
                 <li>
                     <a href="#"><img src="images/avatar_comment.png" class="avatar_comment" /></a>
                     <div class="comment_mes">
                        <p class="title">Japhet Batucan</p>
                        <p>I love this game its ausome so douse toritigger123 I love this game its ausome so douse toritigger123 </p>
                        <p class="color_444">said 1 hour ago - <a href="#write_comment" class="color_08c">Report</a></p>
                     </div>
                     <a href="#" class="asfriend">Add as Friend</a>
                 </li>
              </ul>
              <p class="fwb text_right"><a href="#">See all 40 comments</a></p>
              
              <div class="write_comment mt10" id="write_comment" name="write_comment">
                 <textarea id="writetext">Enter text...</textarea>
                 <input class="button_one" type="button" value="Comments" />
              </div>
              <p class="mt5"><label><input type="checkbox" class="mr5" />Post to Facebook</label></p>
           </div>
           <div class="share" style="display:none;">share</div>
        </div>
        <div class="box_a mt10 clearfix"><span><?= GAME_SUGGESTION?></span></div>
        <div class="game_list small_game lesser">
            <ul class="clearfix">
                <? include './includes/view_game/suggestion.inc.php';?>
            </ul>
         </div>
    </div>
    <div class="mainbgfooter"></div>
</section>



<?php include('footer.php'); ?>


<script type="text/javascript">
$(".search_top .text").focus(function () {
	$(this).val("");
}).focusout(function () {
	if ($(this).val() == "") {
		$(this).val("I'm looking for...")
	}
});



$("#writetext").focus(function(){
	if($(this).val()=="Enter text..."){
		$(this).val("");
	}
}).focusout(function(){
	if($(this).val()==""){
		$(this).val("Enter text...");
	}
});


var $div_li =$(".tab_comment li");
$div_li.click(function(){
	$(this).addClass("select")
		   .siblings().removeClass("select"); 
	var index =  $div_li.index(this);
	$("div.tab_content > div")
			.eq(index).show()
			.siblings().hide(); 
});


$LAB.runQueue();
</script>