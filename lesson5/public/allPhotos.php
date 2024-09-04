<?php
require_once('../../lesson4/config/config.php');
require_once('../../lesson4/engine/db.php');
// 1, 2
function showImg()
{
    $file = getAssocResult('SELECT id, filename, watches FROM images');
    $fileName = array_column($file, 'filename');
    return $fileName;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson4</title>
</head>
<body>
<div>

    <?php foreach (showImg() as $image):
        ?>
        <a href="<?= '../templates/fullPhoto.php'.'?name='.$image ?>">
            <img src='<?= '../public/img/' . $image ?>' width='400'>
        </a>
    <?php endforeach; ?>
</div>
</body>
</html>