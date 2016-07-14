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

if(isset($detaliiAutor[0]['caleImg']) && $detaliiAutor[0]['caleImg'] != ''){
  $caleImg = $detaliiAutor[0]['caleImg'];
}
else{
  $caleImg = '../images/profile.jpg';
}

echo template('page_tpl', array(
    'page_title' => 'Autor',
    'content' => template('autor_tpl', array(
      'numeAutor' => $numeAutor,
      'username' => $username,
      'email' => $email,
      'caleImg' => $caleImg
      ))
));