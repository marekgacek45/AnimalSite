<?php require("includes/header.php") ?>
<?php 
$user = new User();
?>
<main>


  <h1>Strona Główna</h1>

  <h2>Witaj <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'przyjacielu'; ?></h2>

  <a href="login.php"><button>login</button></a>
  <a href="logout.php"><button>logout</button></a>
 





</main>



<?php require("includes/footer.php") ?>