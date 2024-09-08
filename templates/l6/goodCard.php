<?php
require_once('../../config/config.php');
require_once('../../engine/db.php');
function watchCounter($watches, $filename){
    $watches++;
    executeQuery("UPDATE images SET watches = ".$watches." WHERE filename = '".$filename."'");

}

function getGood(){

    $filename = $_GET['name'];
    $query = "SELECT title, img, description, price FROM goods WHERE img = "."'".$filename."'";
    $good = getAssocResult($query);
    return $good[0];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Картинка</title>
</head>
<body>
<div>
    <h2><?= getGood()['title'] ?></h2>
    <img src='<?= '../'. IMGL6_DIR . '/' . $_GET['name'] ?>' width='400'>
    <h3><?= getGood()['price'] ?> руб.<br>
        <?= getGood()['description'] ?>
    </h3>
</div>
</body>
</html>