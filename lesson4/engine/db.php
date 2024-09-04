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

    executeQuery("INSERT INTO reviews (id, title, author, text, rate) VALUES ('" . 1 . "', '"  . $title . "', '" . $author . "', '" . $text . "', '" . $rate . "')");

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
