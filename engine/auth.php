<?php
//require_once "../config/config.php";
require_once 'db.php';
require_once 'functions.php';

function alreadyLoggedIn()
{
    return isset($_SESSION['user']);
}

/**
 * авторизация через логин и пароль
 */
function authWithCredentials(){
    $db = connect();
    $username = escapeString($db, $_POST['username']);
    $password = $_POST['password'];

    // получаем данные пользователя по логину
    $sql = "SELECT login, password FROM user WHERE login = '{$username}'";
    $user = getRowResult($sql);

    // проверяем соответствие логина и пароля
    if($user === null){
        $isAuth = false;
    } else {
        $isAuth = checkPassword($password, $user['password']);
    }

    if($isAuth){
        // сохраняем данные в сессию
        $_SESSION['user'] = $user;
    }

    return $isAuth;
}

function hashPassword($password){
    $salt = md5(SALT);
    $salt = substr(base64_encode($salt), 0, 22);
    return crypt($password, $salt);
}

function checkPassword($password, $hash){
    return hashPassword($password) === $hash;
}
