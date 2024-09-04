<h2>Ваш отзыв на новость:</h2>
<form method="post" action="index.php">
    Заголовок
    <input type="text" name="title"><br>
    Автор
    <input type="text" name="author"><br>
    Текст
    <input type="text" name="text"><br>
    Оценка
    <select name="rate">
        <option value="1">*</option>
        <option value="2">**</option>
        <option value="3">***</option>
        <option value="4">****</option>
        <option value="5">*****</option>
        </option>
    </select><br>
    <input type="submit">
</form>

<?php
require_once('../lesson4/config/config.php');
require_once('../lesson4/engine/db.php');
$review = [];
if(isset($_POST['title'])) $review['title'] = $_POST['title'];
if(isset($_POST['author'])) $review['author'] = $_POST['author'];
if(isset($_POST['text'])) $review['text'] = $_POST['text'];
if(isset($_POST['rate'])) $review['rate'] = $_POST['rate'];
var_dump($review);
addReview($review);
?>
