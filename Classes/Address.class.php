<?php
include_once('Connection.class.php');
include_once('../Enums/TableName.enum.class.php');
class Address
{

   private $streetNum;
   private $streetName;
   private $appNum;
   private $city;
   private $province;
   private $postalCode;


   //--------------- Getter and Setter  -------------------
   public function get_streeNum()
   {
      return $this->streetNum;
   }

   public function set_streetNum($streeNum)
   {
      $this->streetNum = $streeNum;
   }

   public function get_streetName()
   {
      return $this->streetName;
   }

   public function set_streetName($streetName)
   {
      $this->streetName = $streetName;
   }

   public function get_appNum()
   {
      return $this->appNum;
   }

   public function set_appNum($appNum)
   {
      $this->appNum = $appNum;
   }

   public function get_city()
   {
      return $this->city;
   }

   public function set_city($city)
   {
      $this->city = $city;
   }

   public function get_province()
   {
      return $this->province;
   }

   public function set_province($province)
   {
      $this->province = $province;
   }

   public function get_postalCode()
   {
      return $this->postalCode;
   }

   public function set_postalCode($postalCode)
   {
      $this->postalCode = $postalCode;
   }

   //--------------- Methods  -------------------

   public function retrieveAddressIdInDb()
   {
      $conn = new Connection();
      $sqlSelectAddress = "SELECT * FROM " . $conn->get_dbName() . "." . TableName::ADDRESS . " WHERE  streetNum = '" . $this->streetNum . "'AND streetName = '" . $this->streetName . "'AND appNum = '" . $this->appNum . "'AND city = '" . $this->city . "'AND province = '" . $this->province . "'AND postalCode = '" . $this->postalCode . "';";
      $stmt = $conn->connect()->prepare($sqlSelectAddress);
      $stmt->execute();
      $resultSelectAddress = $stmt->fetch();
      if ($resultSelectAddress) {
         return $resultSelectAddress["addressId"];
      } else {
         return false;
      }
   }

   public function addAddressInDb()
   {
      $conn = new Connection();
      $sqlAddAddress = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS . "(streetNum, streetName, appNum, city, province, postalCode) VALUES ('" . $this->streetNum . "', '" . $this->streetName . "', '" . $this->appNum . "', '" . $this->city . "', '" . $this->province . "', '" . $this->postalCode . "');";
      $stmt = $conn->connect()->prepare($sqlAddAddress);
      $stmt->execute();
   }
}
