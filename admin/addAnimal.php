<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>
<?php

$animal = new Animal();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $animal->name = $_POST['name'];
    $animal->type = $_POST['type'];
    $animal->age = $_POST['age'];

    if ($animal->create($conn)) {
        redirect("/AnimalSite/animal.php?id={$animal->id}");
    }

}
?>

<h2>Dodaj nowego zwierzaka</h2>

<form method="post">



    <label for="name">Nazwa:</label>
    <input type="text" name="name" id="name">
    <label for="type">Typ:</label>
    <input type="text" name="type" id="type">
    <label for="age">Wiek:</label>
    <input type="number" name="age" id="age">
    <button type="submit">dodaj</button>
</form>