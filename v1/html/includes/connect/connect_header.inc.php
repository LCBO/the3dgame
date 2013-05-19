<?php
$allowConnections = array('facebook', 'twitter', 'google');
$conn_type = $_GET['type'];
if(!in_array($conn_type, $allowConnections)) {
    header("HTTP/1.0 404 Not Found");
    include 'includes/misc/404.php';
    exit();
}
