<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once "../inc/functions.php";
include '../inc/db.php';

echo template('page_tpl', array(
    'page_title' => 'Blog title',
    'content' => 'Blog content'
));