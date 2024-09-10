<?php require_once 'main/header.php'; ?>

<?php foreach ($vars['products'] as $product):?>
<div class="product">
<h1><?= $product['title'] ?></h1>
    <h2><?= $product['description'] ?></h2>
    <h3><?= $product['created_at'] ?></h3>
    <button class="buy_button" product="<?= $product['id'] ?>">Купить</button>
</div>
    <?php endforeach; ?>
<div>
<button class="show_more_button" offset="<?= $offset['id'] ?>">Показать следующие 25 товаров</button>
</div>
<?php require_once 'main/footer.php'; ?>
