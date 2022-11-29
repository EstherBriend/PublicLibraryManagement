<?php
class Connection{
   private $host = "localhost";
   private $userName = "root";
   private $password = "";
   private $dbName = "Public_Library_Management";
   
   public function connect(){
    $dsn = "mysql:host=".$this->host.";dbName=".$this->dbName;
    $conn = new PDO($dsn,$this->userName,$this->password);
    try{
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e;
    }
    
    return $conn;
   }
}
?>