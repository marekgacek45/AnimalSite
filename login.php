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



    if (User::authenticate($conn, $username, $password)) {

        Authentication::login();

        redirect('index.php');

    } else {
        $message = 'login lub hasło jest nieprawidłowe';
    }


} ?>

<main>

    <h2>masz konto? zaloguj się!</h2>

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

<h2>nie masz konta?zarejestruj się</h2>

<a href="register.php"><button>Zarejestruj się</button></a>

</main>



<?php require("includes/footer.php") ?>