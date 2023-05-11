<?php require("includes/header.php") ?>
<?php
if (isset($_SESSION['loggedIn'])) {
    redirect('index.php');
}
?>

<?php 

$user = new User();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $user->username = $_POST['regUsername'];
    $user->email = $_POST['regEmail'];
    $user->password = $_POST['regPass'];
    $passwordConfirm = $_POST['regPassConfirm'];
    $errors = [];
    
    if(User::checkUsername($conn,$user->username)){
array_push($errors,'Podana nazwa użytkownika już istnieje');
    }
    if(User::checkUserEmail($conn,$user->email)){
array_push($errors,'Podana email jest już użyty');
    }
    if($user->password!=$passwordConfirm){
        array_push($errors,'Podane hasła nie są takie same');
    }


    if(empty($errors)){
$user->create($conn);
redirect('login.php');
    }



}

?>

<form action="register.php" method="post">

<?php if(!empty($errors)): ?>
<?php foreach($errors as $error): ?>
    <p><?= $error ?></p>
<?php endforeach ?>
<?php endif ?>

<label for="regUsername">nazwa użytkownika</label>
<input type="text" name="regUsername" id="regUsername">
<label for="regEmail">email</label>
<input type="email" name="regEmail" id="regEmail">
<label for="regPass">hasło</label>
<input type="password" name="regPass" id="regPass">
<label for="regPassConfirm">powtórz hasło</label>
<input type="password" name="regPassConfirm" id="regPassConfirm">

<button type="submit">Zarejestruj się</button>
</form>