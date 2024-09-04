<?php

require_once('../lesson4/config/config.php');
require_once('../lesson4/engine/db.php');


$news = getAssocResult('select * from news ');
//
//var_dump($result);

//$module = 'index';
//
//if(isset($_GET['module'])){
//    $module = $_GET['module'];
//}

$vars = [
    'title' => 'Наши новости',
    'news' => $news
];

require_once '../lesson4/templates/news.php';
//require_once '../lesson4/engine/module/'.$module.'.php';