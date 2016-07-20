<?php

function checkImgFile($id, &$error, $size = 2000000) {
    switch ($_FILES[$id]['error']) {
        case UPLOAD_ERR_OK:
            break;
        /* case UPLOAD_ERR_NO_FILE: {
          array_push($error, 'No file sent!');
          return FALSE;
          } */
        case UPLOAD_ERR_INI_SIZE: {
                $error = 'Exceeded filesize limit!';
                return FALSE;
            }
        case UPLOAD_ERR_FORM_SIZE: {
                $error = 'Exceeded filesize limit!';
                return FALSE;
            }
        default: {
                $error = 'Unknown errors!';
                return FALSE;
            }
    }
    if ($_FILES[$id]['size'] > $size) {
        $error = 'Exceeded filesize limit!';
        return FALSE;
    }
    if ($_FILES[$id]['type'] != "image/jpg" && $_FILES[$id]['type'] != "image/png" && $_FILES[$id]['type'] != "image/jpeg" && $_FILES[$id]['type'] != "image/gif") {
        $error = 'Invalid file format!';
        return FALSE;
    }
    return TRUE;
}

function checkText($text, &$error, $minSize, $maxSize) {
    if(trim($text) == '' || $text== NULL ) {
        $error = 'Field is empty!';
        return FALSE;
    } 
    if(strlen($text)>$maxSize){
        $error = 'Text too long!';
        return FALSE;
    }
    if(strlen($text)<$minSize){
        $error = 'Text too short!';
        return FALSE;
    }
    return TRUE;
}