<?php

class User
{
    public $id;
    public $username;
    public $email;
    public $password;


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

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    public static function checkUsername($conn, $username)
    {
        $sql = "SELECT username FROM user WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
    public static function checkUserEmail($conn, $email)
    {
        $sql = "SELECT email FROM user WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function create($conn)
    {
            $sql = "INSERT INTO user(username,email,password) VALUES(:username,:email,:password)";


            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":username", $this->username, PDO::PARAM_STR);
            $stmt->bindValue(":email", $this->email, PDO::PARAM_STR);
            $stmt->bindValue(":password", $this->password, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertID();
                return true;
            } else {
                return false;
            }
        }
    }



?>