<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include_once "../inc/functions.php";
include '../inc/db.php';

echo template('page_tpl', array(
    'page_title' => 'Detalii de contact',
    'content' => template('contact_tpl', array())
));