<?php
require_once '../db.php';
//var_dump($_SESSION);
$userId = 1;
$productId = $_POST['id'];
$result = addProductToCart($userId, $productId);
echo $result ? 'Товар добавлен' : http_response_code(400);
?>
