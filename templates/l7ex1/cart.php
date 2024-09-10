<?php
require_once('../../config/config.php');
require_once('../../engine/db.php');
require_once('../../engine/functions.php');

session_start();
$_SESSION['user'] = 'test';
deleteGoodFromCart();
addGoodToCart()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>
<div>

    <?php showCart(); ?>
    <?php foreach (showCart() as $image):
        ?>
    <?=var_dump($image['id'])?>
        <h1><?= $image['title'] ?></h1>
        <a href="<?= 'goodCard.php' . '?name=' . $image['img'] ?>">

            <img src='<?= '../'. IMGL6_DIR . "/{$image['img']}" ?>' width='400'>
        </a>
        <h2>Описание: <?= $image['description'] ?></h2>
        <h2>Цена: <?= $image['price'] ?> руб.</h2>
        <form method="post" action="cart.php">
            <input type="hidden" name="id" value="<?= $image['id'] ?>">
            <input type="submit" value="Удалить товар">
        </form>
    <?php endforeach; ?>
</div>
<div>
    <h1>Добавление товара</h1>
    <h3>Товары в наличии:</h3>
<?php foreach(getGoodTitleList() as $title): ?>
    <h4><?= $title['title'] ?>
        <form method="post">
            <input type="hidden" name="title" value="<?=$title['id'] ?>">
            <input type="submit" value="Добавить в корзину">
        </form>
    </h4>
    <?php endforeach; ?>
</div>
</body>
</html>