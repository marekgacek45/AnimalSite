<!-- <?php
function uploadImage($file,$obj,$conn = $conn){
    try {
        switch ($_FILES[$file]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('no file uploaded');
            // break;
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
            if ($obj->setImageFile($conn, $filename))
                ; {
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
// try {
//     switch ($_FILES['animalImg']['error']) {
//         case UPLOAD_ERR_OK:
//             break;
//         case UPLOAD_ERR_NO_FILE:
//             throw new Exception('no file uploaded');
//         // break;
//         default:
//             throw new Exception('an error occurred');
//     }

//     $pathinfo = pathinfo($_FILES['animalImg']['name']);
//     $base = $pathinfo['filename'];
//     $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
//     $filename = $base . "." . $pathinfo['extension'];

//     $imgTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
//     $dest = "../uploads/" . $filename;

//     if ($_FILES['animalImg']['size'] > 5000000) {
//         throw new Exception('zdjęcie jest za duże');
//     }

//     if (!in_array($_FILES['animalImg']['type'], $imgTypes)) {
//         throw new Exception('niedozwolony rodzaj pliku');
//     }

//     $i = 1;
//     while (file_exists($dest)) {
//         $filename = $base . "_$i." . $pathinfo["extension"];
//         $dest = "../uploads/$filename";
//         $i++;
//     }

//     if (move_uploaded_file($_FILES['animalImg']['tmp_name'], $dest)) {
//         if ($animal->setImageFile($conn, $filename))
//             ; {
//             redirect("/AnimalSite/admin/index.php");
//         }
//     } else {
//         throw new Exception('nie udało się');
//     }
// } catch (Exception $e) {
//     $error = $e->getMessage();
// }
?> -->