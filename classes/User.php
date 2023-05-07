<?php

class User
{
    public $id;
    public $username;
    private $password;


    public static function authenticate($conn, $username, $password)
    {
        $sql = 'SELECT * FROM user WHERE username = :username';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute();


        if ($user = $stmt->fetch()) {
            return $password == $user->password;

        }


    }

    public static function getByUsername($conn, $username)
    {
        $sql = "SELECT * from user WHERE  username=:username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute();

        $user = $stmt->fetch();
        return $user;
    }
}

?>