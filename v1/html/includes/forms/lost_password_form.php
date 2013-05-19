<article class="left widscreen">
<div class="register">
<div class="box_a clearfix"><span>Forgot Your Password</span></div>
<div class="registermain forgot">
<p>Oh no! You forgot your password...what to do now? Don't worry about that, just type your First Name or Email address below, if it is correct, we'll send you a new password for your account to your email. </p>
<form method="post" action="<?php echo $setting['site_url'];?>/index.php?task=lost_password&done=1" name="lost_password">
<?echo iif(isset($error_msg['msg']), $error_msg['msg']);?>
<ul>
    <li>
    <div class="left">User Name<br /><input name="lost_password[username]" id="r_name" type="text" />
    <a href="#" class="color_08c ml10">New here? Register!</a></div></li>
    <li><span class="or">OR</span></li>
    <li>
        <div class="left">Email<br /><input name="lost_password[email]" id="r_email" type="text" />
        <a href="#" class="color_08c ml10">Forgot?</a></div></li>
</ul>
<input class="button_one" value="Submit" type="submit" />
</form>
</div>
</div>
</article>
<aside class="win162 right">
     <div class="advborder"><img src="<?= $setting['media_url'];?>/templates/3dgame/images/advimages/img160600.jpg" /></div>
</aside>