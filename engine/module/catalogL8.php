<?php
require_once '../../config/config.php';
require_once '../../engine/db.php';



$_SESSION['id'] = 1;
$_SESSION['login'] = 'admin';
$_SESSION['password'] = 'NGTx0DtUDeQJQ';

session_start();
if (isset($_GET['module']) && $_GET['module'] === 'put_product') {
    var_dump($_SESSION);
    // Возвращаем вьюшку с текстом "ok"
    require_once 'put_product.php';
    exit;  // Завершаем выполнение скрипта после рендера вьюшки
}

$products = getAllTableData('products', '*', null, 'created_at', 'desc');

$vars = [
    'products'=>$products
];

require_once '../../templates/catalogL8.php';