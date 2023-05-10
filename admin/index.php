<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>
<?php $animals = Animal::getAll($conn) ?>


<h2>admin panel</h2>
<a href="addAnimal.php"><button>dodaj</button></a>

<div>
    <?php  foreach ($animals as $animal):?>
        <h3><?= $animal->name ?></h3>
        <p><?= $animal->type ?></p>
        <p><?= $animal->age ?></p>
        
    <?php  endforeach ?>
</div>


<a href="../index.php">Home</a>

