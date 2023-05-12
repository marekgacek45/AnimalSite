<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>
<?php $animals = Animal::getAll($conn) ?>


<h2>admin panel</h2>
<a href="addAnimal.php"><button>dodaj</button></a>

<div>
    <?php foreach ($animals as $animal): ?>
        <h3>
            <?= $animal->name ?>
        </h3>
        <p>
            <?= $animal->type ?>
        </p>
        <p>
            <?= $animal->age ?>
        </p>
        <a href="/AnimalSite/animal.php?id=<?= $animal->id ?>">zobacz</a>
        <a href="/AnimalSite/admin/editAnimal.php?id=<?= $animal->id ?>">edytuj</a>
        <a href="/AnimalSite/admin/image.php?id=<?= $animal->id ?>">zmień zdjęcie</a>
        <a href="/AnimalSite/admin/deleteAnimal.php?id=<?= $animal->id ?>">usuń</a>
       

    <?php endforeach ?>
</div>


<a href="../index.php">Home</a>