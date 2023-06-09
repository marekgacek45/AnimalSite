<?php

class Animal
{

    protected static $db_table = 'animal';
    public $id;
    public $name;
    public $type;
    public $from_where;
    public $gender;
    public $age;
    public $image;
    public $description;
    public $errors = [];

    public static function getAll($conn)
    {

        $sql = "SELECT * FROM ". static::$db_table ." ORDER BY id";

        $result = $conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, 'Animal');
    }
    public static function getByID($conn, $id, $columns = "*")
    {
        $sql = "SELECT $columns FROM ". static::$db_table ." WHERE id=:id";
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
            $sql = "INSERT INTO ". static::$db_table ."(name, type, from_where, gender, age, description) VALUES(:name, :type, :from_where, :gender, :age, :description)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
            $stmt->bindValue(":type", $this->type, PDO::PARAM_STR);
            $stmt->bindValue(":from_where", $this->from_where, PDO::PARAM_STR);
            $stmt->bindValue(":gender", $this->gender, PDO::PARAM_STR);
            $stmt->bindValue(":age", $this->age, PDO::PARAM_INT);
            $stmt->bindValue(":description", $this->description, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertID();
                return true;
            } else {
                return false;
            }
        }
    }
   
    public function update($conn)
    {
        if ($this->validate()) {
            $sql = "UPDATE ". static::$db_table ." SET name=:name, type=:type, from_where=:from_where, gender=:gender, age=:age, description=:description WHERE id=:id";

            $stmt = $conn->prepare($sql);
    
            $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
            $stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
            $stmt->bindValue(":type", $this->type, PDO::PARAM_STR);
            $stmt->bindValue(":from_where", $this->from_where, PDO::PARAM_STR);
            $stmt->bindValue(":gender", $this->gender, PDO::PARAM_STR);
            $stmt->bindValue(":age", $this->age, PDO::PARAM_INT);
            $stmt->bindValue(":description", $this->description, PDO::PARAM_STR);

            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function delete($conn)
    {
        $sql = "DELETE FROM ". static::$db_table ." WHERE id=:id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function setImageFile($conn, $filename)
    {
        $sql = "UPDATE ". static::$db_table ." SET image =:image WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindValue(":image", $filename, PDO::PARAM_STR);
        $stmt->execute();
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
}
?>