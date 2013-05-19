<?
include '../../config.php';
include '../../includes/core.php';
include '../../language/'.$setting['language'].'.php';

if(isset($_POST['data'])) {
    $username = $_POST['data'];
    $username_valid = preg_match('/^[A-Za-z \-][A-Za-z0-9 \-]*(?:_[A-Za-z0-9 ]+)*$/', $username);
    if($username_valid == false) {
        echo json_encode(REG_ERROR2);
    }else{
        $sql_username_check = mysql_query("SELECT username FROM ava_users WHERE username='$username'");
        $username_check = mysql_num_rows($sql_username_check);
        // Email is in use
        if($username_check > 0) {
            echo json_encode(REG_ERROR7);
        }else{
            echo json_encode('This name can be used.');
        }
    }
}else{
    echo json_encode(false);
}