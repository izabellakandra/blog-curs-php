<?php

include_once "../inc/functions.php";
include '../inc/db.php';
include_once "../inc/validations.php";

session_start();
if (isset($_SESSION['user'])) {

    $ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

    if (isset($_POST['titlu'])) {
        if (isset($_POST['ref']))
            $ref = $_POST['ref'];
        $error = NULL;
        $namedError = array();
        if (!checkText($_POST['titlu'], $error, 3, 200))
            $namedError['titlul'] = $error;

        if (!checkText($_POST['continut'], $error, 3, 10000))
            $namedError['descrierea'] = $error;

        $conn = db_connect($config['DB']);

        $path = '';
        if (!empty($_FILES['caleImg']['name'])) {
            if (!checkImgFile('caleImg', $error)) {
                $namedError['img'] = $error;
            }
            if (empty($namedError)) {
                $path = 'images/' . time() . '_' . $_SESSION['user'] . '_' . $_FILES['caleImg']['name'];
                if (!move_uploaded_file($_FILES['caleImg']['tmp_name'], $path)) {
                    $namedError['img'] = 'Nu se poate salva fisierul la calea curenta.';
                }
            }
        }
        //print_r($namedError);
        if (empty($namedError)) {
            $conn = db_connect($config['DB']);
            //echo $_POST['titlul'] , PHP_EOL;
            //echo $_POST['descrierea'] , PHP_EOL;
            //echo $path, PHP_EOL;die;
            $query = 'SELECT ID FROM autori where user=:user';
            $result = db_select($conn, $query, array(
                ':user' => $_SESSION['user'],
            ));
            db_insert($conn, 'INSERT INTO articole (titlu,continut,caleImg,autID) VALUES (:titlul,:descrierea,:path,:autID)', array(
                ':titlul' => $_POST['titlu'],
                ':descrierea' => $_POST['continut'],
                ':path' => $path,
                ':autID' => $result[0]['ID'],
            ));
            $query = 'SELECT ID FROM articole ORDER BY ID DESC LIMIT 1';
            $result = db_select($conn, $query);
            //print_r($result);die;
            header('Location: /view.php?ID=' . $result[0]['ID'] . '#n');
            //showForm($ref);
            exit;
        } else {
            showForm($ref, $namedError, $_POST);
        }
    } else {
        showForm($ref, NULL);
    }
} else {
    //header('X-A: inregistrare');	
    header('Location: inregistrare.php');
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