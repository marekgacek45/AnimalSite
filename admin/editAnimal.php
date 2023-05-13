<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>
<?php require('../includes/upload_image.php'); ?>

<?php



if (isset($_GET["id"])) {
    $animal = Animal::getByID($conn, $_GET['id']);

    if (!$animal) {
        die('animal not found');
    }

} else {
    die('nie ma takiego zwierza');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $animal->name = $_POST['name'];
    $animal->type = $_POST['type'];
    $animal->age = $_POST['age'];

    // require('../includes/upload_image.php');

    $animalImg = 'animalImg';

    $imageError = uploadImage($animalImg, $animal, $conn);


    if (empty($imageError)) {

        if ($animal->update($conn)) {
            redirect("/AnimalSite/animal.php?id={$animal->id}");
        }
    }

}
?>

<h2>Edytuj zwierzaka</h2>

<!-- <form method="post">
    <label for="name">Nazwa:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($animal->name) ?>">
    <label for="type">Typ:</label>
    <input type="text" name="type" id="type" value="<?= htmlspecialchars($animal->type) ?>">
    <label for="age">Wiek:</label>
    <input type="number" name="age" id="age" value="<?= htmlspecialchars($animal->age) ?>">
    <label for="photo">Zdjęcie:</label>
    <input type="file" name="photo" id="photo">
    <button type="submit">edytuj</button>
</form> -->

<?php if (!empty($imageError)): ?>
    <p>
        <?= $imageError ?>
    </p>
<?php endif ?>


<form method="post" enctype="multipart/form-data">
    <label for="name">Nazwa:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($animal->name) ?>">
    <label for="type">Typ:</label>
    <input type="text" name="type" id="type" value="<?= htmlspecialchars($animal->type) ?>">
    <label for="age">Wiek:</label>
    <input type="number" name="age" id="age" value="<?= htmlspecialchars($animal->age) ?>">
    <label for="animalImg">Zdjęcie:</label>
    <input type="file" name="animalImg" id="animalImg">
    <button type="submit">edytuj</button>
</form>