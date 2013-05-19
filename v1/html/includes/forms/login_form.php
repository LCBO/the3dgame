<?php
if(isset($error_message)) {
    echo '<div id="error_message">'.$error_message.'</div>';
}
?>
<div class="dialog_box" id="login">
    <div class="dialog_box_t"><div class="dialog_box_t_r"></div></div>
    <div class="dialog_box_c">
       <a href="javascript:void(0);" class="close" onclick="javascript:boxRemove('login');" title="Close">x</a>
        <div class="box_a mt10 clearfix"><span>Log in</span></div>
        <div class="login">
           <p class="fwb fz16">USE YOUR SOCIAL NETWORK</p>
           <p class="mt10">
                <a href="#" class="twitter"></a>
                <a href="#" class="google"></a>
                <a href="#" onclick="fb_login()"class="facebook"></a>
           </p>
           <form method="post" action="<?php echo $setting['site_url'];?>/login.php?done=1">
           <div class="siteavatar">
           <span class="or">OR</span>
               <ul>
                 <li><input value="First Name:" name="username" id="username"/></li>
                 <li><input value="......" name="password" id="password" type="password" /></li>
                 <li><a href="<?php echo $setting['site_url'];?>/index.php?task=lost_password">Forgot your username or password?</a></li>
                 <li><label><input name="remember" id="remember" type="checkbox" class="checkbox" checked="checked" >Keep me logged in on this computer</label></li>
               </ul>

           </div>
           <input class="button_one" type="submit" value="LOG IN" />
           </form>
        </div>
        <p class="login_other">No account yet?  <a href="<?php echo $setting['site_url'];?>/index.php?task=register" class="color_08c fwb">Join</a> for Free!</p>
    </div>
    <div class="dialog_box_f"><div class="dialog_box_f_r"></div></div>
    <div id="fb-root"></div>
</div>
<script type="text/javascript">
var fb_id = '<?echo $setting['facebook_appid'];?>';
var fb_url= '<?echo $setting['site_url'];?>/index.php?task=facebook';
window.fbAsyncInit = function() {
    FB.init({
        appId   : fb_id,
        oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true // parse XFBML
    });
  };
function fb_login(){
    FB.login(function(response){
        if(response.authResponse){window.location=fb_url}
    },{scope:'publish_stream,email'})
}
(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}());
</script>
<script type="text/javascript">
$("#username").focus(function(){
    if($(this).val()=="First Name:"){
        $(this).val("");
    }
}).focusout(function(){
    if($(this).val()==""){
        $(this).val("First Name:");
    }
});


$("#password").focus(function(){
    if($(this).val()=="......"){
        $(this).val("");
    }
}).focusout(function(){
    if($(this).val()==""){
        $(this).val("......");
    }
});
</script>