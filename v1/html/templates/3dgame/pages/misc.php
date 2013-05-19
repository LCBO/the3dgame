<?php
if(isset($_GET['q'])) {
    $breakname = get_title($_GET['q']);
}else {
    $breakname = 'Register';
}
ob_start();
$task = $_GET["task"];
?>
<section class="main">
    <div class="mainbgtop"></div>
    <div class="content">

        <div class="box_b clearfix">
          <span class="box_b_r"></span>
          <span class="box_b_l"></span>
          <div class="box_b_c"><a href="<?echo $setting['site_url'];?>">Home</a><span class="box_b_s"></span><a href="#"><?= $breakname?></a></div>
        </div>

        <div class="mt10 clearfix">
            <?php
            include('includes/misc/misc.inc.php');
            if($task == 'register') {
                include ('includes/forms/register_form.php');
            }else if($task == 'lost_password') {
                include ('includes/forms/lost_password_form.php');
            }
            ?>
        </div>
    </div>
    <div class="mainbgfooter"></div>
</section>
<div class="advborder" style="width:728px; margin:25px auto 0;">
    <? include './includes/ad/ad_728_25.php';?>
</div>
<?php
$_misc_content = ob_get_clean();
include('header.php');
echo $_misc_content;
include('footer.php');
?>