<?php
$showFileInput = true; // Ustawienie domyślnie na false

// Sprawdź, czy jesteś na stronie, na której chcesz wyświetlić pole input file
if ($_SERVER['REQUEST_URI'] === '/AnimalSite/admin/addAnimal.php') {
    $showFileInput = false;
}

?>

<form method="post" enctype="multipart/form-data" id="animal_form">

    <label for="name">Imię:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($animal->name) ?>">

    <label for="type">Typ:</label>
    <input type="text" name="type" id="type" value="<?= htmlspecialchars($animal->type) ?>">

    <label for="age">Skąd:</label>
    <input type="text" name="from_where" id="from_where" value="<?= htmlspecialchars($animal->from_where) ?>">

    <label for="age">Płeć:</label>
    <input type="text" name="gender" id="gender" value="<?= htmlspecialchars($animal->gender) ?>">

    <label for="age">Wiek:</label>
    <input type="number" name="age" id="age" value="<?= htmlspecialchars($animal->age) ?>">

    <?php if ($showFileInput): ?>
        <label for="animalImg">Zdjęcie:</label>
        <input type="file" name="animalImg" id="animalImg">
    <?php endif; ?>

    <label for="description">description</label>
    <textarea name="description" id="description" cols="30"
        rows="10"><?= htmlspecialchars($animal->description) ?></textarea>
</form>