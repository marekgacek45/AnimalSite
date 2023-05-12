<?php require("includes/header.php") ?>


<?php



$user = null;
if (isset($_SESSION['username'])) {
  $user = User::getByUsername($conn, $_SESSION['username']);
  
  $_SESSION['admin'] = $user->admin;

  

}
$animals = Animal::getAll($conn);


?>
<main>
  <h1>Strona Główna</h1>

  <?php if ($user !== null): ?>
    <h2>Witaj, <?php echo $user->username; ?></h2>

    <?php if (isset($user->admin) && $user->admin == 'yes'): ?>
      <a href="admin/index.php"><button>Panel admina</button></a>
    <?php endif ?>

    <a href="logout.php"><button>Wyloguj</button></a>
  <?php else: ?>
    <h2>Witaj, przyjacielu</h2>

    <a href="login.php"><button>Zaloguj</button></a>
  <?php endif ?>



  <?php foreach ($animals as $animal): ?>

    <div>
      <img src="uploads/<?=$animal->image ?>" alt="">
      <p>
        <?= $animal->name ?>
      </p>
      <p><a href="animal.php?id=<?= $animal->id ?>"> zobacz zwierzaka</a></p>
    </div>


  <?php endforeach ?>




</main>



<?php require("includes/footer.php") ?>