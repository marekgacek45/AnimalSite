<?php 

class Database{
    public function getConn(){
        $dbHost = 'localhost';
        $dbName = 'animal_site';
        $dbUser = 'root';
        $dbPass = "";

        $dsn = 'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8';
         
        

        try{
            $db= new PDO($dsn,$dbUser,$dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $db;
        }catch(PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }
}

?>