<?php

include_once "../inc/functions.php";
include '../inc/db.php';
include_once "../inc/validations.php";

session_start();
$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$conn = db_connect(array(
    'database' => 'blog_curs_php',
    'pass' => 'root',
        ));

if (isset($_POST['name'])) {
    if (isset($_POST['ref']))
        $ref = $_POST['ref'];
    if (!checkText($_POST['name'], $error, 3, 80))
        $namedError['name'] = $error;
    if (!checkText($_POST['email'], $error, 6, 254))
        $namedError['email'] = $error;
    else {
        if (!preg_match('/\b[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}\b/', $_POST['email']))
            $namedError['email'] = 'Not valid email address format!';
    }
    if (!checkText($_POST['user'], $error, 3, 80))
        $namedError['user'] = $error;
    if(trim($_POST['pass']) != '' && $_POST['pass']== NULL ) {
        if (!checkText($_POST['pass'], $error, 4, 50))
            $namedError['pass'] = $error;
    }

    if (!isset($namedError['email']) || !isset($namedError['user'])) {
        $result = db_select($conn, 'SELECT ID, email, user FROM autori WHERE email=:email or user=:user', array(
            ':email' => $_POST['email'],
            ':user' => $_POST['user'],
        ));
        //print_r($result);
        if (!empty($result)) {
            if (($result[0]['email'] == trim($_POST['email'])) && ($result[0]['ID'] != $_POST['ID']))
                $namedError['email'] = 'The new email address is already registered!';
            if (($result[0]['user'] == trim($_POST['user'])) && ($result[0]['ID'] != $_POST['ID']))
                $namedError['user'] = 'The new user name is already taken!';
        }
    }

    $path = 'images/profile.png';
    if (!empty($_FILES['userImage']['name'])) {
        if (!checkImgFile('userImage', $error)) {
            $namedError['img'] = $error;
        }
        if (empty($namedError)) {
            $path = 'images/users/' . time() . '_' . $_POST['user'] . '_' . $_FILES['userImage']['name'];
            if (!move_uploaded_file($_FILES['userImage']['tmp_name'], $path)) {
                $namedError['img'] = 'Failed to move uploaded file.';
            }
        }
    }
    //print_r($namedError);
    if (empty($namedError)) {
        $conn = db_connect(array(
            'database' => 'blog_curs_php',
            'pass' => 'root',
        ));
        db_insert($conn, 'INSERT INTO autori (nume,email,user,parola,caleImg) VALUES (:name, :email, :user, :pass, :path)', array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':user' => $_POST['user'],
            ':pass' => password_hash($_POST['pass'], PASSWORD_BCRYPT),
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
    $result = db_select($conn, 'SELECT * FROM autori WHERE user=:user', array(
        ':user' => $_SESSION['user'],
    ));
    if (!empty($result)) {
        $values['ID'] = $result[0]['ID'];
        $values['name'] = $result[0]['nume'];
        $values['email'] = $result[0]['email'];
        $values['user'] = $result[0]['user'];
        //$values['name'] = $result['nume'];
    }
    showForm($ref, NULL, $values);
}

function showForm($ref, $error, $values = NULL) {
    echo template('page_tpl', array(
        'page_title' => 'Editare',
        'content' => template('inregistrare_tpl', array(
            'ref' => $ref,
            'error' => $error,
            'values' => $values,
        )),
    ));
}
