<?php
include_once('../Enums/TableName.enum.class.php');
class user
{
   private $userFirstName;
   private $userLastName;
   private $userAddress;
   private $userEmail;
   private $userPassword;

   //--------------- Getter and Setter  -------------------
   public function get_userFirstName()
   {
      return $this->userFirstName;
   }

   public function set_userFirstName($firstName)
   {
      $this->userFirstName = $firstName;
   }

   public function get_userLastName()
   {
      return $this->userLastName;
   }

   public function set_userLastName($lastName)
   {
      $this->userLastName = $lastName;
   }

   public function get_userAddress()
   {
      return $this->userAddress;
   }

   public function set_userAddress($address)
   {
      $this->userAddress = $address;
   }

   public function get_userEmail()
   {
      return $this->userEmail;
   }
   public function set_userEmail($email)
   {
      $this->userEmail = $email;
   }

   public function get_userPassword()
   {
      return $this->userPassword;
   }
   public function set_userPassword($password)
   {
      $this->userPassword = $password;
   }

   //--------------- Methods  -------------------

   public function addUser($status)
   {

      $conn = new Connection();
      if($status == "Admin"){
         $sqlAddUser = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADMIN . "(adminFirstName, adminLastName, addressId, adminEmail, adminPassword)
         VALUES ('" . $this->userFirstName . "', '" . $this->userLastName . "', " . $this->userAddress . ", '" . $this->userEmail . "', '" . $this->userPassword . "');";
      }else{
         $sqlAddUser = "INSERT INTO " . $conn->get_dbName() . "." . TableName::RESIDENT . "(residentFirstName, residentLastName, addressId, residentEmail, residentPassword)
         VALUES ('" . $this->userFirstName . "', '" . $this->userLastName . "', " . $this->userAddress . ", '" . $this->userEmail . "', '" . $this->userPassword . "');";
      }

      $stmt = $conn->connect()->prepare($sqlAddUser);
      $stmt->execute();
      echo $sqlAddUser;
   }
}
