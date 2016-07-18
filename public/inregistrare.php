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
$namedError = array();
if (isset($_POST['name'])) {
    if (isset($_POST['ref']))
        $ref = $_POST['ref'];
    if (!checkText($_POST['name'], $error, 3, 80))
        $namedError['name'] = $error;
    if (!checkText($_POST['email'], $error, 6, 254))
        $namedError['email'] = $error;
    if (!checkText($_POST['user'], $error, 3, 80))
        $namedError['user'] = $error;
    if (!checkText($_POST['pass'], $error, 4, 50))
        $namedError['pass'] = $error;

    $path = 'images/profile.png';
    if (!empty($_FILES['userImage']['name'])) {
        if (!checkImgFile('userImage', $error))
            $namedError['img'] = $error;
        if (empty($namedError)) {
            $path = 'images/users/' . $_POST['user'] . '_' . $_FILES['userImage']['name'];
            if (!move_uploaded_file($_FILES['userImage']['tmp_name'], $path)) {
                $namedError['img'] = 'Failed to move uploaded file.';
            }
        }
    }
    print_r($namedError);
    if (empty($namedError)) {
        $conn = db_connect(array(
            'database' => 'blog_curs_php',
            'pass' => 'root',
        ));
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;

        db_insert($conn, 'INSERT INTO autori (nume,email,user,parola,caleImg) VALUES (:name, :email, :user, :pass, :path)', array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':user' => $_POST['user'],
            ':pass' => crypt($_POST['pass'], $salt),
            ':path' => $path,
        ));
        $_SESSION['user'] = $_POST['user'];
        header('Location: ' . $ref);
        //showForm($ref);
        exit;
    } else {
        showForm($ref, $namedError, $_POST);
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
