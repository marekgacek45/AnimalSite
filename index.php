<?php require("includes/header.php") ?>


<?php
$animals = Animal::getAll($conn);
?>
<main class="container">
  <h1>Przygarnij Zwierzaka</h1>

  



  <?php foreach ($animals as $animal): ?>

    <div class="animal__card">
      <img src="uploads/<?=$animal->image ?>" alt="" style="width:100px">
      <p>
        <?= $animal->name ?>
      </p>
      <p><a href="animal.php?id=<?= $animal->id ?>"> zobacz zwierzaka</a></p>
    </div>


  <?php endforeach ?>




</main>



<?php require("includes/footer.php") ?>