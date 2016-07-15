<?php 

include_once "../inc/functions.php";
include '../inc/db.php';

session_start();

$query = "SELECT * FROM autori WHERE user =" . "'" . $_SESSION['user'] . "'";
$conn = db_connect(array(
          'database' => 'blog_curs_php',
          'pass' => 'root',
      ));

$detaliiAutor = db_select($conn, $query);
$numeAutor = $detaliiAutor[0]['nume'];
$email = $detaliiAutor[0]['email'];
$username = $detaliiAutor[0]['user'];
if(isset($detaliiAutor[0]['caleImg']) && $detaliiAutor[0]['caleImg'] != '') {
  $caleImgAutor = $detaliiAutor[0]['caleImg'];
}
else {
  $caleImgAutor = '../images/profile.png';
}

$query2 = "SELECT * FROM articole WHERE autID =" . "'" . $detaliiAutor[0]['ID'] . "'";
$detaliiArticol = db_select($conn, $query2);



echo template('page_tpl', array(
    'page_title' => 'Autor',
    'content' => template('autor_tpl', array(
      'numeAutor' => $numeAutor,
      'username' => $username,
      'email' => $email,
      'caleImgAutor' => $caleImgAutor,
      'detaliiArticol' => $detaliiArticol,
      ))
));