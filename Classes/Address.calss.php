<?php
class Address{
   private $streetNum;
   private $streetName;
   private $appNum;
   private $city;
   private $province;
   private $postalCode;

   //--------------- Getter and Setter  -------------------
   public function get_streeNum(){
    return $this->streetNum;
   }

   public function set_streetNum($streeNum){
    $this->streetNum = $streeNum;
   }

   public function get_streetName(){
    return $this->streetName;
   }

   public function set_streetName($streetName){
    $this->streetName = $streetName;
   }

   public function get_appNum(){
    return $this->appNum;
   }

   public function set_appNum($appNum){
    $this->appNum = $appNum;
   }

   public function get_city(){
    return $this->city;
   }

   public function set_city($city){
    $this->city = $city;
   }

   public function get_province(){
    return $this->province;
   }

   public function set_province($province){
    $this->province = $province;
   }

   public function get_postalCode(){
    return $this->postalCode;
   }

   public function set_postalCode($postalCode){
    $this->postalCode = $postalCode;
   }

}

?>
