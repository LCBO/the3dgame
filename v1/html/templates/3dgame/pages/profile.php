<?php include('header.php'); ?>
<section class="main">
    <div class="mainbgtop"></div>
    <div class="content">
        
        <div class="box_b clearfix">
          <span class="box_b_r"></span>
          <span class="box_b_l"></span>
          <div class="box_b_c"><a href="#">Home</a><span class="box_b_s"></span><a href="#">My Profile</a></div>
        </div>
        
        <div class="mt10 clearfix">
            <?if(isset($_COOKIE['error'])) {
                    echo $_COOKIE['error'];
            }
            ?>
            <article class="right widscreen">
                  <div class="mylastplay">
                     <div class="box_a mt10 clearfix"><span>Last Played</span></div>
                        <?  include './includes/homepage/last_played.inc.php';?>           
                  </div>
            </article>
            <!------------------left end---------------------->
            <aside class="avatar_img">
                 <img src="<?php echo $profile['avatar_url'];?>" class="avatar_myimg" width ="150"/>
                 <a onclick="javascript:boxShow('change_avatar');" href="javascript:void(0);">Change avatar</a>
            </aside>
            <!--------------------right end-------------------->  
        </div>
    
        
        
        
        
         
         
        <div class="box_a mt10 clearfix"><span>Games I like</span></div>
        <div class="game_list small_game lesser">
            <ul class="clearfix">
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
              <li>
                <a href="#"><span class="play"></span><img src="images/advimages/img180135.jpg" width="170" height="128" /><strong>Racing Rally</strong></a>
              </li>
            </ul>
         
         </div> 
         
         
         
           
        
        
        
    </div>
    <div class="mainbgfooter"></div>
</section>

<div class="profile_content">
	<div class="profile_header">
    
    	<div class="profile_header_avatar">
        	<img src="<?php echo $profile['avatar_url'];?>" alt="Avatar" width="75" height="75" class="profile-header_avatar_img"/>
        </div>
        
     	<div class="profile_header_info">
     		<div class="profile_username">
				<?php echo $profile['name'];?>
       	 	</div> 
        	<div class="profile_points">
				<?php echo $profile['points'];?>
        	</div>
        	
			<br style="clear:both" />
			<div class="profile_stats">
				<?php echo LAST_ACTIVITY;?>: <?php echo $profile['last_activity'];?> &nbsp;&nbsp;<?php echo PROFILE_PLAYS;?>: <?php echo $profile['plays'];?> &nbsp;&nbsp;<?php echo PROFILE_RATINGS;?>: <?php echo $profile['ratings'];?> &nbsp;&nbsp;<?php echo PROFILE_COMMENTS;?>: <?php echo $profile['comments'];?>
        	</div>
		</div>
    
   		<div class="profile_header_buttons">
			<div class="profile_button">
				<?php echo $profile['button1'];?>
				<?php echo $profile['button2'];?>
            </div>
		</div>
	</div>
	<br style="clear:both" />
	<div class="main_profile_left">
	<?php if ($setting['forums_installed'] == 1) { ?>
	<div class="profile_h2">
		<?php echo PROFILE_SIGNATURE_HEADER;?>
	</div>
	<?php include('includes/profile/forum_signature.inc.php'); ?>
	<br /><br />
	<?php } ?>
	
    	<div class="profile_h2">
			<?php echo $profile['name'].PROFILE_FAV_GAMES_HEADER;?>
        </div>
		<?php include('includes/profile/fav_games.inc.php'); ?>
		<br /><br />
		<div class="profile_h2">
			<?php echo $profile['name'].PROFILE_SUBMITTED_GAMES_HEADER;?>
        </div>
		<?php include('includes/profile/submitted_games.inc.php'); ?>
		<br /><br />
		<div class="profile_h2">
			<?php echo $profile['name'].PROFILE_COMMENTS_HEADER;?>
        </div>
		<?php include('includes/profile/users_comments.inc.php'); ?>
	</div>

	<div class="main_profile_right">
		<?php echo $profile['admin_edit'];?><br /><br />
		<?php
		if ($setting['forums_installed'] == 1) {
				echo '<span class="right_title">'.FORUM_POSTS.':</span><br /> <a href="'.$profile['forum_posts_link'].'" style="border:none;text-decoration:underline;">'.$profile['forum_posts'].'</a><br /><br />';
		}
		?>
		<span class="right_title"><?php echo PROFILE_LOCATION;?>:</span><br /><?php echo $profile['location'];?><br /><br />
		<span class="right_title"><?php echo PROFILE_BIO;?>:</span><br /><?php echo $profile['about'];?><br /><br />
		<span class="right_title"><?php echo EP_INTERESTS;?>:</span><br /><?php echo $profile['interests'];?><br /><br />
		<span class="right_title"><?php echo PROFILE_WEBSITE;?>:</span><br /><?php echo $profile['website_link'];?><br /><br />
		<span class="right_title"><?php echo PROFILE_JOINED;?>:</span><br /><?php echo $profile['join_date'];?><br /><br />
		
		<span class="right_title"><?php echo USER_HIGHSCORES;?></span>
		<div class="user_highscores_container">
			<?php include('includes/profile/user_highscores.inc.php'); ?>
		</div>
		<br style="clear:both" />
	</div>

	<br style="clear:both" />
</div>

<?php include('footer.php'); ?>


<div class="dialog_box" id="change_avatar">
    <div class="dialog_box_t"><div class="dialog_box_t_r"></div></div>
    <div class="dialog_box_c">
    <form action="<?= $setting['site_url']?>/index.php?task=edit_profile&done=avatar" method ="post" name="form1" enctype="multipart/form-data">
       <a href="javascript:void(0);" class="close" onclick="javascript:boxRemove('change_avatar');" title="Close">x</a>
        <div class="box_a mt10 clearfix"><span>Change avatar</span></div>
        <div class="change_avatar">
           <div class="file"><a href="javascript:void(0);" class="button_two">Browse</a>
               <input type="file" size="1" class="file_former" name="img_file"/>
           </div>
           <img src="<?= $profile['avatar_url']?>" class="avatar_myimg" />
           <p>150x150</p>
           <input class="button_one" type="submit" value="SAVE" />
        </div>
    </form>
    </div>
    <div class="dialog_box_f"><div class="dialog_box_f_r"></div></div>
</div>