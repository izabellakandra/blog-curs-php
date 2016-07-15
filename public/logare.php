<?php

include_once "../inc/functions.php";
include '../inc/db.php';

session_start();
$ref = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'index.php';

if(isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['user'])) {
    if (trim($_POST['user']) != '') {
        if(isset($_POST['ref']))
            $ref = $_POST['ref'];
        $conn = db_connect(array(
            'database' => 'blog_curs_php',
            'pass' => 'root',
        ));
        $sth = $conn->prepare('SELECT parola FROM autori WHERE user = :user LIMIT 1');
        $sth->bindParam(':user', $_POST['user']);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_OBJ);       
        $result=db_select($conn, 'SELECT * FROM autori where user=:user and parola=:pass', array(
            ':user' => $_POST['user'],
            ':pass' => $user->parola
        ));
        if(!empty($result)){
            $_SESSION['user']=$_POST['user'];
            header('Location: '. $ref);
            exit;
        } else {
            showForm($ref);
        }
    } else {
        showForm($ref);
    }
} else {
    showForm($ref);
}

function showForm($ref) {
    echo template('page_tpl', array (
        'page_title' => 'Logare',
        'content' => template('logare_tpl', array(
                        'ref' => $ref,
                    )),
    ));
}
