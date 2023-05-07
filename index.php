<?php require("includes/header.php") ?>

<?php

$animals = Animal::getAll($conn);

?>
<main>


  <h1>Strona Główna</h1>

  <h2>Witaj
    <?php echo isset($userTest->username) ? $userTest->username : 'przyjacielu'; ?>
  </h2>

  <a href="login.php"><button>login</button></a>
  <a href="logout.php"><button>logout</button></a>
  <a href="admin/index.php"><button>admin</button></a>


  <?php foreach ($animals as $animal): ?>

    <div>
      <p>
        <?= $animal->name ?>
      </p>
    </div>


  <?php endforeach ?>




</main>



<?php require("includes/footer.php") ?>