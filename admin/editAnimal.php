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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $animal->name = $_POST['name'];
    $animal->type = $_POST['type'];
    $animal->from_where = $_POST['from_where'];
    $animal->gender = $_POST['gender'];
    $animal->age = $_POST['age'];
    $animal->description = $_POST['description'];



    $imageError = uploadImage("animalImg", $animal, $conn);


    if (empty($imageError)) {

        if ($animal->update($conn)) {
            redirect("/AnimalSite/animal.php?id={$animal->id}");
        }
    }

}
?>

<h2>Edytuj zwierzaka</h2>



<?php if (!empty($imageError)): ?>
    <p>
        <?= $imageError ?>
    </p>
<?php endif ?>

<?php include('includes/animal_form.php') ?>

<button type="submit" form="animal_form">edytuj</button>