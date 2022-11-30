<?php
class Connection{
   private $host = "localhost";
   private $userName = "root";
   private $password = "";
   private $dbName = "Public_Library_Management";

   //--------------- Getter -------------------
   public function get_host(){
    return $this->host;
   }

    public function get_userName()
    {
       return $this->userName;
    }

   public function get_password()
   {
      return $this->password;
   }

   public function get_dbName()
   {
      return $this->dbName;
   }

   //--------------- Create connection to the server to create the db -------------------
   public function first_connection(){
    $dsn = "mysql:host=".$this->host;
    $conn = new PDO($dsn,$this->userName,$this->password);
    try{
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e;
    }
    
    return $conn;
   }
   
   //--------------- Create connection to the db -------------------
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