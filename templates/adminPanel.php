<?php
?>
<h1>Актуальные заказы:</h1>
<?php foreach ($vars['orders'] as $order):?>
<div class="order">
<h2>Заказчик: <?= $order['login'] ?></h2>
    <h3>Товар: <?= $order['title'] ?></h3>
    <h3>Количество: <?= $order['amount'] ?></h3>
    <button class="delete_button" userId="<?= $order['userId'] ?>" amount="<?= $order['amount'] ?>" goodId="<?= $order['goodId'] ?>">Удалить товар из заказа</button>
</div>
    <?php endforeach; ?>

<?php require_once 'main/footer.php'; ?>