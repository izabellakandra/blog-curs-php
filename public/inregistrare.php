<?php

include_once "../inc/functions.php";
include '../inc/db.php';
include_once "../inc/validations.php";

session_start();
$ref = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'index.php';

if(isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$error = NULL;
if (isset($_POST['name'])) {
    if (isset($_POST['ref']))
        $ref = $_POST['ref'];
    if (trim($_POST['name']) != '') {
        $path = NULL;
        if(!empty($_FILES['userImage']['name']))
        {
            $path = checkImgFile('userImage', $error, 'images/users/', $_POST['user']);
            if(!$path){
                showForm($ref, $error, $_POST);
                exit;
            }
        }
        $conn = db_connect(array(
            'database' => 'blog_curs_php',
            'pass' => 'root',
        ));
        db_insert($conn, 'INSERT INTO autori (nume,email,user,parola,caleImg) VALUES (:name, :email, :user, :pass, :path)', array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':user' => $_POST['user'],
            ':pass' => $_POST['pass'],
            ':path' => $path
        ));
        $_SESSION['user']=$_POST['user'];
        header('Location: '. $ref);
        //showForm($ref);
        exit;
    } else {
        showForm($ref, $error, $_POST);
    }
} else {
    showForm($ref, NULL);
}

function showForm($ref, $error, $values = NULL) {
    echo template('page_tpl', array (
        'page_title' => 'Inregistrare',
        'content' => template('inregistrare_tpl', array(
                        'ref' => $ref,
                        'error' => $error,
                        'values' => $values,
                    )),
    ));
}
