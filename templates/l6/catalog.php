<?php
require_once('../../config/config.php');
require_once('../../engine/db.php');

require_once('../../engine/functions.php');

if(isset($_POST['image'])){
    deleteGood();
}
if(isset($_POST['title']) && isset($_POST['img']) || isset($_POST['description']) || isset($_POST['price']))
addGood();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
</head>
<body>
<div>

    <?php foreach (showGoodImg() as $image):
        ?>
        <a href="<?= 'goodCard.php' . '?name=' . $image ?>">
            <form method="post" action="catalog.php">
                <input type="hidden" name="image" value="<?= $image ?>">
                <input type="submit" value="Удалить товар">
            </form>
            <img src='<?= '../'. IMGL6_DIR . "/{$image}" ?>' width='400'>
        </a>
    <?php endforeach; ?>
</div>

<div>
    <h3>Добавить товар</h3>
    <form method="POST" action="catalog.php">
        <table>
            <tr>
                <td>Название:</td>
                <td> <input type="text" name="title"> </td>
            </tr>
            <tr>
                <td>Изображение:</td>
                <td><input type="text" name="img"></td>
            </tr>
            <tr>
                <td>Описание:</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td>Цена:</td>
                <td> <input type="text" name="price"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Добавить товар">
                </td>
            </tr>
        </table>
    </form>

</div>
</body>
</html>