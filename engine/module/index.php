<?php
//require_once LIB_DIR.'all_libs.php';
//require_once '../db.php';
session_start();
$_SESSION['user'] = "anton";
var_dump($_SESSION);

$vars = [
    'title' => 'Привет, это стартовая страница',
    'username' => $_SESSION['user']
];

require_once '../../templates/index.php';