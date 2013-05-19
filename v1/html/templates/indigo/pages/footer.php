<?php if (isset($sidebar_page)) { ?>
<div class="tag_cloud_container">
	<div class="module">
		<div class="module_header">
			<?php echo TAGS_MODULE;?>
		</div>
		<?php include './includes/modules/tag_cloud.php';?>
	</div>
</div>
<?php } ?>

<div class="ad_center">
	<?php advert('leaderboard'); ?>
</div>

<div class="footer">
			<?php include './includes/modules/copyright.php'; // Include the copyright, not to be removed unless you have purchased copyright removal ?>
		</div>
	</div>
	<?php include './includes/footer_data.php';?>
</body>
</html>