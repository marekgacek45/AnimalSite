<?php 

class User{
    private $id;
    public $username;
    private $password;

    public static function getAll($conn){
        $sql = "SELECT * from users";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>