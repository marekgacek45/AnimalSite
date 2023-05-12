<?php

class Animal
{

    public $id;
    public $type;
    public $name;
    public $age;
    public $image;
    public $errors = [];

    public static function getAll($conn)
    {

        $sql = "SELECT * FROM animal ORDER BY id";

        $result = $conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, 'Animal');
    }
    public static function getByID($conn, $id, $columns = "*")
    {
        $sql = "SELECT $columns FROM animal WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Animal');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    protected function validate()
    {
        if ($this->name == '') {
            array_push($this->errors, 'wprowadź imię');
        }
        if ($this->type == '') {
            array_push($this->errors, 'wprowadź typ zwierzaka');
        }
        if ($this->type == '') {
            array_push($this->errors, 'wprowadź ile ma lat');
        }
        return empty($this->errors);
    }

    public function create($conn)
    {
        if ($this->validate()) {
            $sql = "INSERT INTO animal(name,type,age) VALUES(:name,:type,:age)";


            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
            $stmt->bindValue(":type", $this->type, PDO::PARAM_STR);
            $stmt->bindValue(":age", $this->age, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertID();
                return true;
            } else {
                return false;
            }
        }
    }
public function update($conn){
    if ($this->validate()) {
        $sql = "UPDATE animal SET name=:name, type=:type,age=:age WHERE :id=id";


        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindValue(":type", $this->type, PDO::PARAM_STR);
        $stmt->bindValue(":age", $this->age, PDO::PARAM_INT);

       return $stmt->execute();
    }else{
        return false;
    }
}

public function delete($conn){
    $sql = "DELETE FROM animal WHERE id=:id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);

    return $stmt->execute();
}

public function setImageFile($conn,$filename){
    $sql = "UPDATE animal SET image =:image WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id",$this->id,PDO::PARAM_INT);
    $stmt->bindValue(":image",$filename,PDO::PARAM_STR);
    $stmt->execute();
}
}


?>