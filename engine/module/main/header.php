<?php
$menu = [
    'Главная' => '../../public/index.php',
    'Каталог' => '/?module=catalog',
    'Корзина' => '/?module=cart',
];

$headVars = [
    'menu'=> $menu
];
require_once '../../templates/main/header.php';