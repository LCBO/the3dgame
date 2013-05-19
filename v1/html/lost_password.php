<?php
$reg_arr = isset($_POST['lost_password'])?$_POST['lost_password']:array();
$done = isset($_GET['done'])?$_GET['done']:0;
$submit_flag = true;
$error_msg = array(
'msg'=>'',
);

if(!empty($reg_arr) && $done == 1) {
    $username = isset($reg_arr['username'])?$reg_arr['username']:'';
    $email = isset($reg_arr['email'])?$reg_arr['email']:'';

    if((!$username) && (!$email)) {
        $error_msg['msg'] = error_msg('Select at least one item to fill out.');
        $submit_flag = false;
    }
    if($submit_flag) {
        $sql = 'SELECT username,email FROM ava_users';
        $where = ' where ';
        if($username) {
            $where .= "username='{$username}'";
        }
        if($email) {
            $email_valid = preg_match('^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$^', $email);
            if($email_valid) {
                if($username) {
                    $where .= " and ";
                }
                $where .= "email='{$email}'";
            }else{
                $error_msg['msg'] = error_msg('Email address format is not correct.');
                $submit_flag = false;
            }
        }
        if($submit_flag) {
            $query_sql = mysql_query($sql.$where);
            $user_check = mysql_num_rows($query_sql);
            if($user_check > 0 && $user_check < 2) {
                $row = mysql_fetch_row($query_sql);
                $to = $row[1];
                $subject = "Test mail";
                $message = "Hello! This is a simple email message.";
                $from = "someonelse@example.com";
                $header = "From: $from";
                //send_mail($to, $from, $subject, $message);
            }
        }
    }
}
?>