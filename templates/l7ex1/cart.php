<?php
require_once('../../config/config.php');
require_once('../../engine/db.php');
require_once('../../engine/functions.php');

session_start();
$_SESSION['user'] = 'test';
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
        <h1><?= $image['title'] ?></h1>
        <a href="<?= 'goodCard.php' . '?name=' . $image['img'] ?>">
            <form method="post" action="catalog.php">
                <input type="hidden" name="image" value="<?= $image['img'] ?>">
                <input type="submit" value="Удалить товар">
            </form>
            <img src='<?= '../'. IMGL6_DIR . "/{$image['img']}" ?>' width='400'>
        </a>
        <h1><?= $image['description'] ?></h1>
        <h1><?= $image['price'] ?> руб.</h1>
    <?php endforeach; ?>
</div>

<div>
<!--    <h3>Добавить товар</h3>-->
<!--    <form method="POST" action="catalog.php">-->
<!--        <table>-->
<!--            <tr>-->
<!--                <td>Название:</td>-->
<!--                <td> <input type="text" name="title"> </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Изображение:</td>-->
<!--                <td><input type="text" name="img"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Описание:</td>-->
<!--                <td><input type="text" name="description"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Цена:</td>-->
<!--                <td> <input type="text" name="price"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td colspan="2">-->
<!--                    <input type="submit" value="Добавить товар">-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->
<!--    </form>-->

</div>
</body>
</html>