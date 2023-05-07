<?php 

class User{
    private $id;
    public $username;
    private $password;


    public static function authenticate($conn, $username, $password) {
        $sql = 'SELECT * FROM users WHERE username = :username';
    
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute();
    
        if ($user = $stmt->fetch()) {
            return $password == $user->password;
        }

       
    }
    
    public function setUsername($username){
        $this->username = $username;
    }

    public static function getAll($conn){
        $sql = "SELECT * from users";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>