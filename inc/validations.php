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
                $error = 'Mărimea prea mare!';
                return FALSE;
            }
        case UPLOAD_ERR_FORM_SIZE: {
                $error = 'Mărimea prea mare!';
                return FALSE;
            }
        default: {
                $error = 'Eroare necunoscută!';
                return FALSE;
            }
    }
    if ($_FILES[$id]['size'] > $size) {
        $error = 'Mărimea prea mare!';
        return FALSE;
    }
    if ($_FILES[$id]['type'] != "image/jpg" && $_FILES[$id]['type'] != "image/png" && $_FILES[$id]['type'] != "image/jpeg" && $_FILES[$id]['type'] != "image/gif") {
        $error = 'Format invalid!';
        return FALSE;
    }
    return TRUE;
}

function checkText($text, &$error, $minSize, $maxSize) {
    if(trim($text) == '' || $text== NULL ) {
        $error = 'Câmp gol!';
        return FALSE;
    } 
    if(strlen($text)>=$maxSize){
        $error = 'Text prea lung!';
        return FALSE;
    }
    if(strlen($text)<=$minSize){
        $error = 'Text prea scurt!';
        return FALSE;
    }
    return TRUE;
}