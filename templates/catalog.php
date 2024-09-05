<?php
require_once('../config/config.php');
require_once('../engine/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $good = [];
    if (isset($_POST['title'])) $good['title'] = $_POST['title'];
    if (isset($_POST['img'])) $good['img'] = $_POST['img'];
    if (isset($_POST['description'])) $good['description'] = $_POST['description'];
    if (isset($_POST['price'])) $good['price'] = $_POST['price'];
    executeQuery("INSERT INTO goods (title, img, description, price) VALUES ('" . $good['title'] . "', '" . $good['img'] . "', '" . $good['description'] . "', '" . $good['price'] . "')");
    var_dump($good);
}

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
            <img src='<?= IMGL6_DIR . '/' . $image ?>' width='400'>
        </a>
    <?php endforeach; ?>
</div>

<div>
    <h3>Добавить товар</h3>
    <form type="post" action="catalog.php">
        <table>
            <tr>
                <td>Название:</td>
                <td> <input type="text" name="title"> </td>
            </tr>
            <tr>
                <td>Изображение:</td>
                <td><input type="text" name="img"></td>
            <tr>
                <td>Описание:</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td>Цена:</td>
                <td> <input type="text" name="price"></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
        </table>
    </form>
</div>
</body>
</html>