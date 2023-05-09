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
    public static function getByID($conn,$id,$columns="*"){
        $sql = "SELECT $columns FROM animal WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Animal');

        if($stmt->execute()){
            return $stmt->fetch();
        }
    }

}


?>