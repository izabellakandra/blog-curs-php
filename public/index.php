<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include_once "../inc/functions.php";
include '../inc/db.php';

echo template('page_tpl', array(
    'page_title' => 'Blog title',
    'banner_tpl' => template('banner_tpl', array(
    	'page_title' => 'GastroCylexia',
    	'page_slogan' => 'Bun venit in lumea retetelor!',
    	)),
    'content' => 'Blog content <a href="#" class="btn btn-primary">asdsds</a>'
));