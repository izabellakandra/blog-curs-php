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


    if (empty($namedError)) {
        $query = 'SELECT * FROM autori where user=:user';
        $result = db_select($conn, $query, array(
            ':user' => $_POST['user'],
        ));
        if (!empty($result)) {
            echo password_verify($_POST['pass'], $result[0]['parola']);
            if (!password_verify($_POST['pass'], $result[0]['parola'])) {
                $namedError['user'] = 'Invalid login data!';
                $namedError['pass'] = 'Invalid login data!';
                showForm($ref, $namedError, $_POST);
                exit;
            }
            //showForm($ref, $namedError, $_POST);
            $_SESSION['userID'] = $result[0]['ID'];
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
