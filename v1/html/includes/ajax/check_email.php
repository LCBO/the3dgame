<?
include '../../config.php';
include '../../includes/core.php';
include '../../language/'.$setting['language'].'.php';

if(isset($_POST['data'])) {
    $email = $_POST['data'];
    $email_valid = preg_match('^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$^', $email);
    if($email_valid == false) {
        echo json_encode(REG_ERROR9);
    }else{
        $sql_email_check = mysql_query("SELECT email FROM ava_users WHERE email='$email'");
        $email_check = mysql_num_rows($sql_email_check);
        // Email is in use
        if($email_check > 0) {
            echo json_encode(REG_ERROR5);
        }else{
            echo json_encode('This email can be used.');
        }
    }
}else{
    echo json_encode(false);
}