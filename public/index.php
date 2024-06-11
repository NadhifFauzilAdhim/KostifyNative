<?php
session_start();
require_once '../app/init.php';
$app = new App;

$max_duration = 1800; //30 Menit Session Time

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $max_duration)) {
    session_unset();     
    session_destroy();   
    header('Location: ' . BASEURL . 'login');
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$_SESSION['last_activity'] = time(); 
