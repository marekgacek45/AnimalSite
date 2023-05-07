<?php require("includes/header.php") ?>
<?php
if (isset($_SESSION['loggedIn'])) {
    redirect('index.php');
}
// var_dump($_SESSION['is_logged_in']);
?>
<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = User::authenticate($conn, $username, $password);

    if ($user) {
        Authentication::login();
        redirect('index.php');

    } else {
        $message = 'login lub hasło jest nieprawidłowe';
    }


} ?>

<main>

    <?php
    if (isset($message)): ?>
        <p style="color:red">
            <?= $message ?>
        </p>
    <?php endif ?>

   

    <form action="login.php" method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>



</main>



<?php require("includes/footer.php") ?>