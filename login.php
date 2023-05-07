<?php require("includes/header.php") ?>
<?php $users = User::getAll($conn); ?>
<main>


    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
            session_regenerate_id(true);
            $_SESSION['is_logged_in'] = true;

            redirect('index.php');

        } else {
            echo 'login lub hasło jest nieprawidłowe';
        }


    } ?>
    <form action="login.php" method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>



</main>



<?php require("includes/footer.php") ?>