<?php
include '../inc/db.php';
include '../inc/functions.php';


if(!isset($_GET['autID'])){
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

$query = "SELECT * FROM articole WHERE autID = :aut";

$results = db_select($con, $query, array(
    ':aut' => $_GET['autID']
));

if(!isset($results[0])){
    page_not_found();
}
$articol = $results[0];


echo template('page_tpl', array(
                                          'page_title' => 'Afisare dupa ArtID nr. : ' . $articol['autID'],
                                          'content' => template('main_tpl', array ( 'art' => template('articole/autor_tpl', array('articole' => $results)
                                 )))
            ));


?>