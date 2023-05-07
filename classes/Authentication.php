<?php

class Authentication
{
    public static function login()
    {
session_regenerate_id(true);

$_SESSION['loggedIn'] = true;
$_SESSION['username'] = $_POST['username'];
    }
}

?>