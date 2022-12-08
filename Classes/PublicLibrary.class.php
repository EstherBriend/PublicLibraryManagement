<?php
class PublicLibrary{
    private $libraryId;
    private $libraryName;
    private $libraryAddress;

//--------------- Getter and Setter  -------------------

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
    
       //--------------- Methods  -------------------

   public function retrieve_all_libraries(){
    $conn = new Connection();
    $sqlRetrieveAllLibraries = 'SELECT * FROM '.$conn->get_dbName().".".TableName::LIBRARY.';';
    $stmt = $conn->connect()->prepare($sqlRetrieveAllLibraries);
    $stmt->execute();
    $resultRetrieveAllLibraries = $stmt->fetchAll();

    return $resultRetrieveAllLibraries;
   }
}
?>