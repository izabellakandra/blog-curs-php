<?php

function template($file, $args) {
    ob_start();
    extract($args);
    include __DIR__ . '/../templates/' . $file . '.php';
    return ob_get_clean();
}

function img($file, $alt = '', $width = '') {
    return '<img src="' . $file . '" alt="' . $alt . '" width="' . $width . '">';
}

function lnk($content, $url = '#') {
    return '<a href="' . $url . '">' . $content . '</a>';
}

function ellipsis($string, $length) {
    $string = strip_tags($string);
    return strlen($string) > $length ? substr($string, 0, $length) . "..." : $string;
}