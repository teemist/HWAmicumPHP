<?php
require_once "../../config/config.php";
require_once('../functions.php');
require_once '../db.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $new_user = $_POST['username'];
    $new_password = $_POST['password'];
    $hash1 = md5($new_password);

    $transfer_sql = "INSERT INTO user (login, password) VALUES ('$new_user', '$hash1');";

    mysqli_query(connect(), $transfer_sql);

    require_once '../../templates/index.php';
} else echo 'Логин и пароль не переданы';