<?php
require_once('db.php');

function showCart()
{
    if (isset($_SESSION['user'])) {
        $login = $_SESSION['user'];
//        $user_id = getAssocResult("SELECT id FROM user WHERE login = '{$login}'");
//        var_dump($login);
//        var_dump($user_id);
        $cart = getAssocResult("SELECT title, img, description, price FROM user
                                    INNER JOIN cart ON user.id = cart.user_id
                                    INNER JOIN goods ON cart.goods_id = goods.id
                                    WHERE user.login = '{$login}';");

//        $cart = getAssocResult("use test;SELECT * FROM cart;");
        var_dump($cart);

        return $cart;
    }
//        return $cart;
//    }



//    $goodInfo = getAssocResult('SELECT title, img, price FROM goods');
//    foreach ($goodInfo as $good) {
//        $title = $good['title'];
//        $img = $good['img'];
//        $price = $good['price'];
//    }
//    var_dump($goodInfo);
}

function getImg($dir)
{
    $imgType = ['img', 'png', 'jpg'];


    $files = array_diff(scandir($dir, 0), array('..', '.'));
    var_dump($files);
}

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

function isCollision($a, $b)
{
    if ($a[1] > $b[0]) {
        echo true;
        return true;
    } else if ($a[0] > $b[1]) {
        echo true;
        return true;
    } else {
        echo false;
        return false;
    }
}

function showGoodImg()
{
    $file = getAssocResult('SELECT img FROM goods');
    $fileName = array_column($file, 'img');
    return $fileName;
}

function deleteGood()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $deletedGood = '';
        if (isset($_POST['image'])) $deletedGood = $_POST['image'];
        executeQuery("DELETE FROM goods WHERE (img = '{$deletedGood}')");
        $_POST = [];
    }
    $file = getAssocResult('SELECT img FROM goods');
    $fileName = array_column($file, 'img');
    return $fileName;
}

function addGood()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $good = [];
        if (isset($_POST['title'])) $good['title'] = $_POST['title'];
        if (isset($_POST['img'])) $good['img'] = $_POST['img'];
        if (isset($_POST['description'])) $good['description'] = $_POST['description'];
        if (isset($_POST['price'])) $good['price'] = $_POST['price'];
        executeQuery("INSERT INTO goods (title, img, description, price) 
              VALUES ('{$good['title']}', '{$good['img']}', '{$good['description']}', '{$good['price']}')");
    }
}

function escapeString($db, $str)
{
    return mysqli_real_escape_string($db, htmlspecialchars(strip_tags($str)));
}