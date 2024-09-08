<?php
require_once "../config/config.php";
require_once LIB_DIR . "auth.php";

session_start();
$module = 'index';
//var_dump($_SESSION);

//$_SESSION['user'] = 'admin';
//
//$_SESSION['password'] = 'NG4K0gXTvk4tE';
$_SESSION = [];

//var_dump($_COOKIE);
var_dump($_SESSION);

if(isset($_GET['module'])) {
    $module = trim(str_replace(['/', '\\', '.'], ['', '', ''], $_GET['module']));
}
if($module !== 'login' && !alreadyLoggedIn()){
    header('Location: ../engine/module/login.php');
}


//require_once '../engine/module/'.$module.'.php';