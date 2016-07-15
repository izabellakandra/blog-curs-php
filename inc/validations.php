<?php

function checkImgFile($id, &$error, $dir, $user, $size = 2000000) {
    switch ($_FILES[$id]['error']) {
        case UPLOAD_ERR_OK:
            break;
        /* case UPLOAD_ERR_NO_FILE: {
          array_push($error, 'No file sent.');
          return FALSE;
          } */
        case UPLOAD_ERR_INI_SIZE: {
                $error = 'Exceeded filesize limit.';
                return FALSE;
            }
        case UPLOAD_ERR_FORM_SIZE: {
                $error = 'Exceeded filesize limit.';
                return FALSE;
            }
        default: {
                $error = 'Unknown errors.';
                return FALSE;
            }
    }
    if ($_FILES[$id]['size'] > $size) {
        $error = 'Exceeded filesize limit.';
        return FALSE;
    }
    if ($_FILES[$id]['type'] != "image/jpg" && $_FILES[$id]['type'] != "image/png" && $_FILES[$id]['type'] != "image/jpeg" && $_FILES[$id]['type'] != "image/gif") {
        $error = 'Invalid file format.';
        return FALSE;
    }
    $path = $dir . $user . '_' . $_FILES[$id]['name'];
    if (!move_uploaded_file($_FILES[$id]['tmp_name'], $path)) {
        $error = 'Failed to move uploaded file.';
        return FALSE;
    } else {
        return $path;
    }
}
