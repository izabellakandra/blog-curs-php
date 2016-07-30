<?php
include_once "../inc/functions.php";
include '../inc/db.php';

session_start();

if(isset($_SESSION['user'])){
		
	$conn = db_connect($config['DB']);
	db_delete($conn, 'DELETE FROM articole WHERE ID=:id', array(
		':id' => $_GET['ID'],		
	));
	header('Location: index.php');
}
else{
	header('Location: logare.php');
}