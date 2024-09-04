<?php

require_once('../config/config.php');
// 1, 2
function showImg($dir)
{
    $imgType = ['img', 'png', 'jpg'];
    $files = array_diff(scandir($dir, 0), array('..', '.'));

    $result = [];

    foreach ($files as $file) {
        $fileType = explode('.', $file)[1];
        if (\in_array($fileType, $imgType, true)) {
            $result[] = $file;
        }
    }
    return $result;
}

function isCollision($a, $b){
    if($a[1] >= $b[0] || $a[0] >= $b[1]) { return true; }
    else { return false; }
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
    <h2>Задание 1, 2</h2>

    <?php foreach (showImg(IMG_DIR) as $image): ?>
        <a href="<?='img/'. $image ?>"><img src='<?='img/'.$image ?>' width='240'></a>
    <?php endforeach;?>
</div>
<div>
    <h2>Задание 4</h2>
        <?php



        $a[0] = 2;
        $a[1] = 5;

        $b[0] = 2;
        $b[1] = 7;
        if(isCollision($a, $b)) echo 'Отрезки пересекаются';
        else echo 'Отрезки не пересекаются';
        ?>
</div>
</body>
</html>