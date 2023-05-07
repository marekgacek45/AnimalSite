<?php require("includes/header.php") ?>
<?php $users = User::getAll($conn); ?>
<main>
  <?php foreach($users as $user): ?>
    <ul>
        <li><?=htmlspecialchars($user['username']) ?></li>
    </ul>
    <?php endforeach ?>





</main>



<?php require("includes/footer.php") ?>