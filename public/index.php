<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include_once "../inc/functions.php";
include '../inc/db.php';

$con = db_connect(array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'database' => 'blog_curs_php',
        'charset' => 'utf8',
        'user' => 'root',
        'pass' => 'root',
));
$query = "SELECT titlu, continut, autID, articole.ID, nume, data FROM articole INNER JOIN autori ON articole.autID=autori.ID ORDER BY data DESC";
$results = db_select($con, $query);


echo template('page_tpl', array(
    'page_title' => 'Blog title',
    'banner_tpl' => template('banner_tpl', array(
    	'page_title' => 'GastroCylexia',
    	'page_slogan' => 'Bun venit in lumea retetelor!',
    	)),
     'content' => template('main_tpl', array ( 'art' => template('articole/articole_tpl', array('articole' => $results)
                                 )))
));
