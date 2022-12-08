<?php

include_once('../Autoload.inc.php');
include_once('../Enums/TableName.enum.class.php');
include_once('../Enums/AvailabilityStatus.enum.php');

class LibraryInventory{
    private $libraryId;
    private $bookId;
    private $availabilityStatus;

    public function get_libraryId(){
        return $this->libraryId;
    }

    public function set_libraryId($libraryId){
        $this->libraryId = $libraryId;
    }

    public function get_bookId(){
        return $this->bookId;
    }

    public function set_bookId($bookId){
        $this->bookId = $bookId;
    }

    public function get_availabilityStatus(){
        return $this->availabilityStatus;
    }

    public function set_availabitityStatus(AvailabilityStatus $availability){
        $this->availabilityStatus = $availability;
    }

    //--------------- Methods  -------------------

public function add_new_inventory(){
    $conn = new Connection();

    // By default the inventory status is 'available', it is changed only when a resident rent it
    $sqlAddNewInventory =  'INSERT INTO '. $conn->get_dbName() . '.' . TableName::INVENTORY. '(libraryId, bookId, availabilityStatus)
    VALUES ('.$this->libraryId.', '.$this->bookId.', "'.AvailabilityStatus::AVAILABLE.'");'; 
    $stmt = $conn->connect()->prepare($sqlAddNewInventory);
    $stmt->execute();
}

}
