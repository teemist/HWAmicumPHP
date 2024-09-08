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

function getRowResult($sql){
    $array_result = getAssocResult($sql);

    if(isset($array_result[0])){
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

function addReview($review)
{
    $title = $review['title'];
    $text = $review['text'];
    $rate = $review['rate'];
    $author = $review['author'];

    executeQuery("INSERT INTO reviews (title, author, text, rate) VALUES ('" . $title . "', '" . $author . "', '" . $text . "', '" . $rate . "')");

}

function getReviews(){
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

function getProducts(){
    return getAssocResult('SELECT * FROM products');
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
