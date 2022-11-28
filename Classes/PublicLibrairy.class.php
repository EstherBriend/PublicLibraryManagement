<?php
class PublicLibrary{
    private $libraryId;
    private $libraryName;
    private $libraryAddress;


    public function get_libraryId(){
        return $this->libraryId;
    }

    public function get_libraryName(){
        return $this->libraryName;
    }

    public function set_libraryName($name){
        $this->libraryName = $name;
    }

    public function get_libraryAddress(){
        return $this->libraryAddress;
    }

    public function set_libraryAddress(Address $address){
        $this->libraryAddress = $address;
    }
    
}
?>