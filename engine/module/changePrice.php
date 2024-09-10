<?php
require_once "../db.php";
require_once "../../config/config.php";


// Вывод в шаблон
$goods = getGoodsPrices();

$vars = [
    'goods' => $goods
];

require_once '../../templates/changePrice.php';