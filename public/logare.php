<?php

include_once "../inc/functions.php";
include '../inc/db.php';
include_once "../inc/validations.php";

session_start();
$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['user'])) {
    if (isset($_POST['ref']))
        $ref = $_POST['ref'];
    $error = NULL;
    $namedError = array();
    if (!checkText($_POST['user'], $error, 3, 80))
        $namedError['user'] = $error;
    if (!checkText($_POST['pass'], $error, 4, 50))
        $namedError['pass'] = $error;
    
    $conn = db_connect(array(
        'database' => 'blog_curs_php',
        'pass' => 'root',
    ));
    
    //print_r($namedError);
    if (empty($namedError)) {
        $sth = $conn->prepare('SELECT parola FROM autori WHERE user = :user LIMIT 1');
        $sth->bindParam(':user', $_POST['user']);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_OBJ);
        $result = db_select($conn, 'SELECT * FROM autori where user=:user and parola=:pass', array(
            ':user' => $_POST['user'],
            ':pass' => $user->parola
        ));
        if (!empty($result)) {
            $_SESSION['user'] = $_POST['user'];
            header('Location: ' . $ref);
            exit;
        } else {
            $namedError['user'] = 'Invalid login data!';
            $namedError['pass'] = 'Invalid login data!';
            showForm($ref, $namedError, $_POST);
        }
    } else {
        showForm($ref, $namedError, $_POST);
    }
} else {
    showForm($ref, NULL);
}

function showForm($ref, $error, $values = NULL) {
    echo template('page_tpl', array(
        'page_title' => 'Logare',
        'content' => template('logare_tpl', array(
            'ref' => $ref,
            'error' => $error,
            'values' => $values,
        )),
    ));
}
