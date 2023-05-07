<?php 
require('includes/init.php');
$conn = require('includes/database.php');

if(isset($_SESSION['username'])){

    $userTest = User::getByUsername($conn, $_SESSION['username']);
}

?>


<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Site</title>
</head>
<body>
    
