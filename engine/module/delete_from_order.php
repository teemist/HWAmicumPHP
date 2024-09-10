<?php
require_once '../db.php';
//var_dump($_SESSION);
$userId = $_POST['userId'];
$goodId = $_POST['goodId'];
$amount = $_POST['amount'];
var_dump($_POST);
$result = deleteGoodFromOrder($userId, $goodId, $amount);
//$result = addProductToCart($userId, $productTitle);
echo $result ? 'Товар удален' : http_response_code(400);
?>