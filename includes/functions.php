<?php

function redirect($location)
{

    header("Location:{$location}");
}

function uploadImage($file, $obj, $conn)
{
    try {
        if (empty($_FILES[$file]['tmp_name'])) {
            return ''; //
        }
        switch ($_FILES[$file]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('no file uploaded');
                break;
            default:
                throw new Exception('an error occurred');
        }

        $pathinfo = pathinfo($_FILES[$file]['name']);
        $base = $pathinfo['filename'];
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
        $filename = $base . "." . $pathinfo['extension'];

        $imgTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $dest = "../uploads/" . $filename;

        if ($_FILES[$file]['size'] > 7000000) {
            throw new Exception('zdjęcie jest za duże');
        }

        if (!in_array($_FILES[$file]['type'], $imgTypes)) {
            throw new Exception('niedozwolony rodzaj pliku');
        }

        $i = 1;
        while (file_exists($dest)) {
            $filename = $base . "_$i." . $pathinfo["extension"];
            $dest = "../uploads/$filename";
            $i++;
        }

        if (move_uploaded_file($_FILES[$file]['tmp_name'], $dest)) {

            $previous_image = $obj->image;


            if ($obj->setImageFile($conn, $filename))
                ; {

                if ($previous_image) {
                    unlink("../uploads/$previous_image");
                }

                redirect("/AnimalSite/admin/index.php");
            }
        } else {
            throw new Exception('nie udało się');
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    return $error;
}


?>