<?php
class user{
    private $userFirstName;
    private $userLastName;
    private $userAddress;
    private $userEmail;
    private $userPassword;

    //--------------- Getter and Setter  -------------------
     public function get_userFirstName(){
        return $this->userFirstName;
     }

     public function set_userFirstName($firstName){
        $this->userFirstName = $firstName;
     }

     public function get_userLastName(){
        return $this->userLastName;
     }

     public function set_userLastName($lastName){
        $this->userLastName = $lastName;
     }

     public function get_userAddress(){
        return $this->userAddress;
     }

     public function set_userAddress(Address $address){
        $this->userAddress = $address;
     }

     public function get_userEmail(){
        return $this->userEmail;
     }
     public function set_userEmail($email){
        $this->userEmail = $email;
     }
     public function set_userPassword($password){
        $this->userPassword = $password;
     }
}
?>