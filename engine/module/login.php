<?php
require_once "../../config/config.php";
require_once "../auth.php";
$vars = [];
// если уже залогинен, то выбрасываем на главную
if(alreadyLoggedIn()){
    header('Location: /');
}

// если есть куки, то авторизуем сразу
// if(checkAuthWithCookie()){
//     header('Location: /');
// }

// иначе пробуем авторизовать по логину и паролю
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!authWithCredentials()){
        $error = 'Неправильный логин/пароль';
    }
    else{
        header('Location: /');
    }
}

$vars = [
    'errors' => $error
];

require_once '../../templates/login.php';
