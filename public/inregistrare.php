<?php

include_once "../inc/functions.php";
include '../inc/db.php';

session_start();
$ref = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'index.php';

if (isset($_POST['name'])) {
    if (trim($_POST['name']) != '') {
        if(isset($_POST['ref']))
            $ref = $_POST['ref'];
        $conn = db_connect(array(
            'database' => 'blog_curs_php',
            'pass' => 'root',
        ));
        db_insert($conn, 'INSERT INTO autori (nume,email,user,parola) VALUES (:name, :email, :user, :pass)', array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':user' => $_POST['user'],
            ':pass' => $_POST['pass']
        ));
        $_SESSION['user']=$_POST['user'];
        header('Location: '. $ref);
        exit;
    } else {
        showForm($ref);
    }
} else {
    showForm($ref);
}

function showForm($ref) {
    echo template('page_tpl', array (
        'page_title' => 'Inregistrare',
        'content' => template('inregistrare_tpl', array(
                        'ref' => $ref,
                    )),
    ));
}
