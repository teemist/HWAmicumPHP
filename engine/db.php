<?php

function getAssocResult($sql)
{
    $result = executeQuery($sql);

    $array_result = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    return $array_result;
}

function getRowResult($sql)
{
    $array_result = getAssocResult($sql);

    if (isset($array_result[0])) {
        $result = $array_result[0];
    } else {
        $result = null;
    }

    return $result;
}


function executeQuery($sql)
{
    $db = connect();
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

function getAllTableData($tableName, $select = '*', $limit = null, $order = null, $orderDirection = 'ASC')
{
    $sql = "SELECT {$select} FROM {$tableName}";

    if ($order !== null) {
        $sql .= " ORDER BY {$order} {$orderDirection}";
    }

    if ($limit !== null) {
        $sql .= " LIMIT {$limit}";
    }

    return getAssocResult($sql);
}


function connect()
{
    $db = mysqli_connect(HOST, USER, PASS, DB);
    if (!$db) {
        echo 'Ошибка: Невозможно установить соединение с MySQL.' . PHP_EOL;
        exit;
    }
    return $db;
}


function addReview($review)
{
    $title = $review['title'];
    $text = $review['text'];
    $rate = $review['rate'];
    $author = $review['author'];

    executeQuery("INSERT INTO reviews (title, author, text, rate) VALUES ('" . $title . "', '" . $author . "', '" . $text . "', '" . $rate . "')");

}

function getReviews()
{
    return getAssocResult('SELECT title, author, text, rate FROM reviews');
}

function showReviews()
{
    $reviews = getReviews();

    foreach ($reviews as $review) {
        $title = $review['title'];
        $author = $review['author'];
        $text = $review['text'];
        $rate = $review['rate'];
        print "<h3>$title</h3>";
        print "<h4>$text</h4>";
        print "<h5>$rate, $author</h5>";
    }
}

function getProducts()
{
    return getAssocResult('SELECT * FROM products');
}

function addProductToCart($userId, $productId)
{
    $sql = "SELECT count(*) as amount from cart where user_id = $userId && goods_id = $productId";
    $result = getRowResult($sql);
    if ($result['amount'] > 0) {
        $sql = "UPDATE cart
                SET amount = amount + 1
                WHERE user_id = $userId AND goods_id = $productId;";
    } else {
        $sql = "INSERT INTO cart (user_id, goods_id, amount) VALUES ($userId, $productId, 1)";
    }

    return executeQuery($sql);
}

function deleteGoodFromOrder($userId, $goodId, $amount)
{
    if ($amount === "1") {
        $sql = "DELETE FROM cart WHERE user_id = {$userId} AND goods_id = {$goodId}";
    } else {
        $sql = "UPDATE cart
                SET amount = amount - 1
                WHERE user_id = $userId AND goods_id = $goodId;";
    }
    return executeQuery($sql);
}


function getOrders()
{
    $sql = "SELECT cart.user_id as userId, user.login, goods_id as goodId, goods.title, goods.price, cart.amount FROM cart
            INNER JOIN user ON cart.user_id = user.id
            INNER JOIN goods ON cart.goods_id = goods.id";
    $orders = getAssocResult($sql);
    var_dump($orders);
    return $orders;
}

function getGoodsPrices(){
    return getAssocResult("SELECT id, title, price FROM goods");
}

function changeGoodPrice($price, $goodId){
    return executeQuery("UPDATE goods SET goods.price = '{$price}' WHERE goods.id = '{$goodId}'");
}

//module2lesson4hw
function getProductsWithLimit($limit, $offset){
    $query = $pdo->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}