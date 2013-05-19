<?php if (isset($_GET['task'])) {?>
<div class="leaderboard">
	<?php advert('leaderboard'); ?>
</div>
<?php } ?>

    	    </div>
    	    <div><br style="clear:both" /></div>
    	    <div class="footer">
			
			
			
			
				<div class="footer-content">
				
					<div class="tags">
						<?php include('./includes/modules/tag_cloud.php');?>
					</div>
				
					<div class="module">
						<div class="module_header">
							<?php echo LINKS_MODULE;?>
						</div>
						<?php include('./includes/modules/links.php');?>
					</div>
					
					<div class="module news">
						<div class="module_header">
							<?php echo NEWS_MODULE;?>
						</div>
						<?php include('./includes/modules/latest_news.php');?>
					</div>
					
					<div class="module">
						<div class="module_header">
							<?php echo FB_HELLO;?>
						</div>
						<?php echo $setting['site_description'];?>
					</div>
					
				
				</div><!--/footer-content-->
			
			
			<?php include './includes/modules/copyright.php' ?><br />
			</div>
    	    
    	    <?php include 'includes/footer_data.php';?>
			
			
			
</div><!--/wrapper-->

</body>
</html>