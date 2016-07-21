<?php

include_once "../inc/functions.php";
include '../inc/db.php';
include_once "../inc/validations.php";

session_start();

$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

if (isset($_POST['titlul'])) {
    if (isset($_POST['ref']))
        $ref = $_POST['ref'];
    $error = NULL;
    $namedError = array();
    if (!checkText($_POST['titlul'], $error, 3, 200))
        $namedError['titlul'] = $error; 
	
    if (!checkText($_POST['descrierea'], $error, 3, 10000))
        $namedError['descrierea'] = $error;    

    $conn = db_connect(array(
        'database' => 'blog_curs_php',
        'pass' => 'root',
    ));

    $path = 'images/retete.jpg';
    if (!empty($_FILES['img_art']['name'])) {
        if (!checkImgFile('img_art', $error)) {
            $namedError['img'] = $error;
        }
        if (empty($namedError)) {
            $path = 'images/' . time(). '_' . $_SESSION['user'] . '_' . $_FILES['img_art']['name'];
            if (!move_uploaded_file($_FILES['img_art']['tmp_name'], $path)) {
                $namedError['img'] = 'Nu se poate salva fisierul la calea curenta.';
            }
        }
    }
    //print_r($namedError);
    if (empty($namedError)) {
        $conn = db_connect(array(
            'database' => 'blog_curs_php',
            'pass' => 'root',
        ));
        db_insert($conn, 'INSERT INTO articole (titlu,continut) VALUES (:titlul,:descrierea)', array(
            ':titlul' => $_POST['titlul'],
            ':descrierea' => $_POST['descrierea'],            
            ':path' => $path,
        ));        
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
    echo template('page_tpl', array(
        'page_title' => 'Adaugare retete culinare',
        'content' => template('adaugare_art_tpl', array(
            'ref' => $ref,
            'error' => $error,
            'values' => $values,
        )),
    ));
}


