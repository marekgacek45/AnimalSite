<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>

<?php


if (isset($_GET["id"])) {
    $animal = Animal::getByID($conn, $_GET['id']);

    if (!$animal) {
        die('animal not found');
    }
} else {
    die('nie ma takiego zwierza');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        switch ($_FILES['animalImg']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('no file uploaded');
            // break;
            default:
                throw new Exception('an error occurred');
        }

        $pathinfo = pathinfo($_FILES['animalImg']['name']);
        $base = $pathinfo['filename'];
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
        $filename = $base . "." . $pathinfo['extension'];

        $imgTypes = ['image/jpg', 'image/png', 'image/gif', 'image/webp'];
        $dest = "../uploads/" . $filename;

        if ($_FILES['animalImg']['size'] > 1000000) {
            throw new Exception('zdjęcie jest za duże');
        }

        if (!in_array($_FILES['animalImg']['type'], $imgTypes)) {
            throw new Exception('niedozwolony rodzaj pliku');
        }

        $i = 1;
        while (file_exists($dest)) {
            $filename = $base . "_$i." . $pathinfo["extension"];
            $dest = "../uploads/$filename";
            $i++;
        }

        if (move_uploaded_file($_FILES['animalImg']['tmp_name'], $dest)) {
            if ($animal->setImageFile($conn, $filename))
                ; {
                redirect("/AnimalSite/admin/index.php");
            }
        } else {
            throw new Exception('nie udało się');
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>


<h2>Zmień zdjęcie</h2>
<?php if (isset($error)): ?>
    <p>
        <?= $error ?>
    </p>
<?php endif ?>

<form method="post" enctype="multipart/form-data">

    <label for="animalImg">Zdjęcie:</label>
    <input type="file" name="animalImg" id="animalImg">
    <button type="submit">edytuj</button>