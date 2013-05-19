<article class="left widscreen">
    <div class="register">
     <div class="box_a clearfix"><span>Register</span></div>
     <form method="post" action="<?php echo $setting['site_url'];?>/index.php?task=register&done=1" name="register">
     <div class="registermain">
        <p class="fwb fz16">Let's create your account</p>
        <?echo iif(isset($error_msg['register_msg']), $error_msg['register_msg']);?>
        <ul>
            <li>
                <div class="left">Username<br /><input name="register[username]" id="r_name" type="text" /><?echo iif(isset($error_msg['username']), $error_msg['username']);?></div>
                <div class="left button_two" onclick="ajax_check('Username')">Check</div>

            </li>
            <li>
                <div class="left">Email<br /><input name="register[email]" id="r_email" type="text" /><?echo iif(isset($error_msg['email']), $error_msg['email']);?></div>
                <div class="left button_two" onclick="ajax_check('Email')">Check</div>
            </li>
            <li>
                <div class="left">Create a password<br /><input name="register[password]" type="password"/><?php echo iif(isset($error_msg['psw']), $error_msg['psw']) ;?></div>
                <div class="left ml120">Confirm password<br /><input name="register[password2]" type="password" /></div>
           </li>
         </ul>
         <input class="button_one" value="Sign Up" type="submit" />
     </div>
     </form>
 </div>
</article>
<aside class="win162 right">
     <div class="advborder"><img src="<?= $setting['media_url'];?>/templates/3dgame/images/advimages/img160600.jpg" /></div>
</aside>
<script>
function ajax_check(str){
if(str == 'Username'){
    $val = $('#r_name');
    var url = 'includes/ajax/check_name.php';
}else if(str == 'Email'){
    $val = $('#r_email');
    var url = 'includes/ajax/check_email.php';
}

if($val.val() == '') {
    alert(str+' cannot be empty.');
    $val.focus();
}else{
    $.ajax({
        url: url,
        type:'POST',
        data:"data="+$val.val(),
        dataType:'json',
        async: false,
        success:function(data){
           alert(data);
        }
    });
}
}
</script>