<?php
// File so that php info can be quickly seen to diagnose issues.
include ('../config.php');

$key = $_GET['key'];
$key = md5($key);

// Just so any old person can't do it, but not really secure
if ($key == '9604e91c09f6d9c53ab71f6cb5f47234') {

phpinfo();

}
?>