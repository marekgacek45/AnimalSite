<?php

class User
{
    public static $db_table = "user";
    public $id;
    public $username;
    public $email;
    public $password;


    public static function authenticate($conn, $username, $password)
    {
     $sql = 'SELECT * FROM ' . static::$db_table . ' WHERE username = :username';

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
        $sql = "SELECT * from ". static::$db_table . " WHERE  username=:username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute();

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    public static function getByID($conn, $id, $columns = "*")
    {
        $sql = "SELECT $columns FROM ". static::$db_table ." WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    public static function checkUsername($conn, $username)
    {
        $sql = "SELECT username FROM ". static::$db_table . " WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
    public static function checkUserEmail($conn, $email)
    {
        $sql = "SELECT email FROM ". static::$db_table . " WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function create($conn)
    {
            $sql = "INSERT INTO ". static::$db_table . "(username,email,password) VALUES(:username,:email,:password)";


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

        public static function get_page($conn, $limit, $offset) {
            $sql = "SELECT * FROM " . static::$db_table . " LIMIT :limit OFFSET :offset";
        
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        
            $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Animal');
        }

        public static function get_total($conn){
            return $conn->query("SELECT COUNT(*) FROM ". static::$db_table . "")->fetchColumn();
        }
        public static function getAll($conn)
        {
    
            $sql = "SELECT * FROM ". static::$db_table ." ORDER BY id DESC";
    
            $result = $conn->query($sql);
            return $result->fetchAll(PDO::FETCH_CLASS, 'User');
        }
    }



?>