<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<?php include 'includes/header_data.inc.php' ?>
<link rel="stylesheet" type="text/css" href="<?= $setting['media_url'];?>/templates/3dgame/css/theme.css<?//= '?'.$settings['media_ver']?>" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="<?= $setting['site_url'];?>/templates/3dgame/js/carousel_srcoll.js"></script>
<script type="text/javascript" src="<?= $setting['site_url'];?>/templates/3dgame/js/dialog.js"></script>
</head>

<body>
<header>
    <div class="headertop clearfix">
        <div class="left">
            <?php if(!$user['login_status']) {?>
            <a onclick="javascript:boxShow('login');" href="javascript:void(0);"><?echo UA_LOGIN;?></a>|<a href="<?php echo $setting['site_url'];?>/index.php?task=register"><?echo UA_REGISTER;?> </a>
            <?php }else{?>
            Welcome : <a href ="<?= $user['url']?>" class="color_08c"><?php echo $user['username'];?></a>|<a href="<?php echo $setting['site_url'].'/login.php?action=logout';?>"><?php echo UA_LOGOUT;?></a>
            <?php }?>
        </div>
        <form action="<?php echo $setting['site_url']?>/index.php?task=search" method="get" onsubmit="<?php echo $search_function;?>">
            <div class="search_top right">
            	<input class="text" name="q" type="text" size="20" id="search_textbox" value="<?php echo $search_val;?>" onclick="clickclear(this, '<?php echo SEARCH_DEFAULT;?>')" onblur="clickrecall(this,'<?php echo SEARCH_DEFAULT;?>')" class="search_box"/>
                <input type="button" class="button" name="submit" src="<?= $setting['media_url'];?>/templates/3dgame/images/search.png?<?= $setting['media_ver'];?>" />
            </div>  
            <div>
            	<input name="task" type="hidden" value="search" />
            </div>
        </form>
    </div>
    <nav class="clearfix">
        <a href="#" class="logo" title="Free Online Games, Free Games, Flash Games"></a>
        <ul class="menu">
           <?php include('./includes/modules/categories_menu.php');?>
        </ul>
    </nav>

    <div class="topadv clearfix">
        <div class="left advborder"><? include './includes/ad/ad_728_25.php';?></div>
       <div class="left ml10"><img src="<?= $setting['media_url'];?>/templates/3dgame/images/advimages/img18690.jpg?<?= $setting['media_ver'];?>" /></div>
    </div>
</header>
<div class="body-bg-top">
   <div class="body-bg-topleft"></div>
   <div class="body-bg-topright"></div>
</div>
	<div class="leaderboard">
		<?php advert('leaderboard'); ?>
	</div>
<script type="text/javascript">
$(".search_top .text").focus(function () {
	$(this).val("");
}).focusout(function () {
	if ($(this).val() == "") {
		$(this).val("I'm looking for...")
	}
});

$LAB.runQueue();
</script>