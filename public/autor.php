<?php

include_once "../inc/functions.php";
include '../inc/db.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$query = "SELECT * FROM autori WHERE user =" . "'" . $_SESSION['user'] . "'";
$conn = db_connect($config['DB']);

$detaliiAutor = db_select($conn, $query);
$autID = $detaliiAutor[0]['ID'];
$numeAutor = $detaliiAutor[0]['nume'];
$email = $detaliiAutor[0]['email'];
$username = $detaliiAutor[0]['user'];
if (isset($detaliiAutor[0]['caleImg']) && $detaliiAutor[0]['caleImg'] != '') {
    $caleImgAutor = $detaliiAutor[0]['caleImg'];
} else {
    $caleImgAutor = '../images/profile.png';
}

$query2 = "SELECT titlu, continut, autID, nume, data, articole.ID FROM articole INNER JOIN autori ON articole.autID=autori.ID WHERE articole.autID = :aut";
$detaliiArticol = db_select($conn, $query2, array(
    ':aut' => $detaliiAutor[0]['ID']
        ));


// print_r($detaliiArticol);
// die;

echo template('page_tpl', array(
    'page_title' => 'Autor',
    'content' => template('autor_tpl', array(
        'ID' => $autID,
        'numeAutor' => $numeAutor,
        'username' => $username,
        'email' => $email,
        'caleImgAutor' => $caleImgAutor,
        'detaliiArticol' => $detaliiArticol,
        'articoleAut' => template('articole/autor_tpl', array(
            'articole' => $detaliiArticol
        ))
    )),
));
