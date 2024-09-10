<?php
require_once '../db.php';
require_once '../../config/config.php';

// Обработка запроса на удаление из заказа
if (isset($_GET['module']) && $_GET['module'] === 'delete_from_order') {
    // Возвращаем вьюшку с текстом "ok"
    require_once 'delete_from_order.php';
    exit;  // Завершаем выполнение скрипта после рендера вьюшки
}



// Вывод в шаблон
$orders = getOrders();

$vars = [
  'orders' => $orders
];

require_once '../../templates/adminPanel.php';