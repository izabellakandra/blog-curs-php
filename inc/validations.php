<?php

function checkFile($id, &$errorStack, $dir, $size = 2000000) {
    if (isset($_FILES[$id]['error'])) {
        switch ($_FILES[$id]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE: {
                    array_push($errorStack, 'No file sent.');
                    return;
                }
            case UPLOAD_ERR_INI_SIZE: {
                    array_push($errorStack, 'Exceeded filesize limit.');
                    return;
                }
            case UPLOAD_ERR_FORM_SIZE: {
                    array_push($errorStack, 'Exceeded filesize limit.');
                    return;
                }
            default: {
                    array_push($errorStack, 'Unknown errors.');
                    return;
                }
        }
        if ($_FILES[$id]['size'] > $size) {
            array_push($errorStack, 'Exceeded filesize limit.');
            return;
        }
        if ($_FILES[$id]['type'] != "image/jpg" && $_FILES[$id]['type'] != "image/png" && $_FILES[$id]['type'] != "image/jpeg" && $_FILES[$id]['type'] != "image/gif") {
            array_push($errorStack, 'Invalid file format.');
            return;
        }
        $path = $dir . sha1_file($_FILES[$id]['tmp_name'],TRUE) . '_' . $_FILES[$id]['name'];
        if (!move_uploaded_file($_FILES[$id]['tmp_name'], $path)) {
            array_push($errorStack, 'Failed to move uploaded file.');
            return;
        } else {
            return $path;
        }
    }
}
