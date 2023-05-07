<?php 

class Animal{

    public $id;
    public $type;
    public $name;
    public $age;

    public static function getAll($conn){

        $sql = "SELECT * FROM animal";

        $result = $conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS,'Animal');
    }
}

?>