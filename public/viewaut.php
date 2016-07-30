<?php
include '../inc/db.php';
include '../inc/functions.php';
session_start();

if(!isset($_GET['autID'])){
    page_not_found();
}

$con = db_connect($config['DB']);

$query = "SELECT titlu, continut, autID, nume, data, articole.ID FROM articole INNER JOIN autori ON articole.autID=autori.ID WHERE articole.autID = :aut";

$results = db_select($con, $query, array(
    ':aut' => $_GET['autID']
));

if(!isset($results[0])){
    page_not_found();
}
$articol = $results[0];


echo template('page_tpl', array(
  'page_title' => 'Autor: ' . $articol['nume'],
  'content' => template('main_tpl', array ( 
    'art' => template('articole/autor_tpl', array(
      'articole' => $results))
    ))
));


?>