<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include_once "../inc/functions.php";

echo template('page_tpl', array(
    'page_title' => 'Despre noi',
    'content' => template('despre_tpl', array())
));