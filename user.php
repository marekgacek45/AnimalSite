<?php require('includes/header.php')?>
<?php $conn = require('includes/database.php')?>
<?php 

$id = $_GET['id'];
$user = User::getByID($conn,$id);

?>

<div>
    <p><?php echo htmlspecialchars($user->username) ?></p>
   <img src="uploads/<?= htmlspecialchars($user->image)  ?>" alt="">
</div>



<?php require('includes/footer.php')?>