<?php
require_once('../../lesson4/config/config.php');
require_once('../../lesson4/engine/db.php');
function watchCounter($watches, $filename){
    $watches++;
    executeQuery("UPDATE images SET watches = ".$watches." WHERE filename = '".$filename."'");

}

function getWatches(){

    $filename = $_GET['name'];
    $query = "SELECT watches FROM images WHERE filename = "."'".$filename."'";
        $watches = getAssocResult($query);
        $watches = array_column($watches, 'watches');
        watchCounter($watches[0], $filename);
        return ++$watches[0];
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
    <h1>Картинка в полном размере</h1>
        <img src='<?= '../public/img/' . $_GET['name'] ?>' width='400'>
    <h2><?= getWatches() ?></h2>
</div>
</body>
</html>