<?php
require(dirname(__DIR__) . '/includes/init.php');
$conn = require(dirname(__DIR__) . '/includes/database.php');



$user = null;
if (isset($_SESSION['username'])) {
  $user = User::getByUsername($conn, $_SESSION['username']);
  
  $_SESSION['admin'] = $user->admin;

  

}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Nunito+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <title>Animal Site</title>
</head>

<body>

   <?php include('navigation.php'); ?>