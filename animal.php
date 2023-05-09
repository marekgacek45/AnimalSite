<?php require('includes/header.php')?>
<?php $conn = require('includes/database.php')?>
<?php 

$id = $_GET['id'];
$animal = Animal::getByID($conn,$id);

?>

<div>
    <p><?php echo htmlspecialchars($animal->name) ?></p>
</div>



<?php require('includes/footer.php')?>