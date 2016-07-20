<?php
include '../inc/db.php';
include '../inc/functions.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

if(!isset($_GET['ID'])){
    page_not_found();
}

$con = db_connect(array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'database' => 'blog_curs_php',
        'charset' => 'utf8',
        'user' => 'root',
        'pass' => 'root',
));

$query = "SELECT titlu, continut, autID, articole.caleImg, nume, data, articole.ID FROM articole INNER JOIN autori ON articole.autID=autori.ID WHERE articole.ID = :val";

$results = db_select($con, $query, array(
    ':val' => $_GET['ID']
));

if(!isset($results[0])){
    page_not_found();
}
$articol = $results[0];


echo template('page_tpl', array(
                                          'page_title' => $articol['titlu'],
                                          'content' => template('main_tpl', array ( 'art' => template('articole/view_tpl', array('articole' => $results)
                                 )))
            ));


?>