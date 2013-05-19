<?php
$reg_arr = isset($_POST['register'])?$_POST['register']:array();
$done = isset($_GET['done'])?$_GET['done']:0;
$submit_flag = true;
$error_msg = array(
'register_msg'=>'',
'username'=>'',
'email'=>'',
'psw'=>''
);

if(!empty($reg_arr) && $done == 1) {
    $username = isset($reg_arr['username'])?$reg_arr['username']:'';
    $email = isset($reg_arr['email'])?$reg_arr['email']:'';
    $password = $reg_arr['password'];
    $password2 = $reg_arr['password2'];

    /*验证Start*/
    $username_valid = preg_match('/^[A-Za-z \-][A-Za-z0-9 \-]*(?:_[A-Za-z0-9 ]+)*$/', $username);
    $email_valid = preg_match('^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$^', $email);

    if((!$username) || (!$email) || (!$password) || (!$password2)) {
        $error_msg['register_msg'] = error_msg(REG_ERROR1);
        $submit_flag = false;
    }else{
        if(!$username) {
            $error_msg['username'] = error_msg(REG_ERROR10);
            $submit_flag = false;
        }else if($username_valid == false) {
            $error_msg['username'] = error_msg(REG_ERROR2);
            $submit_flag = false;
        }
        if(!$email) {
            $error_msg['email'] = error_msg(REG_ERROR8);
            $submit_flag = false;
        }else if($email_valid == false) {
            $error_msg['email'] = error_msg(REG_ERROR9);
                $submit_flag = false;
        }
        if(!$password) {
            $error_msg['psw'] = error_msg(REG_ERROR3);
            $submit_flag = false;
        }else if(strlen($password) <= 5) {
            $error_msg['psw'] =  error_msg(REG_ERROR11);
            $submit_flag = false;
        }else if($password != $password2) {
            $error_msg['psw'] =  error_msg(REG_ERROR4);
            $submit_flag = false;
        }
    }
    if($submit_flag) {
        $sql_username_check = mysql_query("SELECT username FROM ava_users WHERE username='$username'");
        $username_check = mysql_num_rows($sql_username_check);
        // Is email in use?
        $sql_email_check = mysql_query("SELECT email FROM ava_users WHERE email='$email'");
        $email_check = mysql_num_rows($sql_email_check);
        // Email or username is in use
        if($email_check > 0) {
            $error_msg['email'] = error_msg(REG_ERROR5);
            $submit_flag = false;
        }
        if($username_check > 0) {
            $error_msg['username'] = error_msg(REG_ERROR7);
            $submit_flag = false;
        }
        /*验证end*/
        if($submit_flag) {
            $passwordpro = md5($password);
            $seo_url = seoname($username);
            $date = date("F j Y");
            $sql = mysql_query("INSERT INTO ava_users (username, password, email, activate, joined,  seo_url)
        VALUES('$username', '$passwordpro', '$email', '1', '$date', '$seo_url')") or die (mysql_error());
            $new_user = mysql_insert_id();
            setcookie("ava_username", $username, time()+60*60*24*100);
            setcookie("ava_code", $passwordpro, time()+60*60*24*100);
            setcookie("ava_userid", $new_user, time()+60*60*24*100);
            header('Location:'.$setting['site_url']);
        }
    }
}
?>