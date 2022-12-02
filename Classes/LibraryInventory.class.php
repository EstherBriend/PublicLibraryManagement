<?php

class LibraryInventory{
    private $libraryId;
    private $bookId;
    private $availabilityStatus;

    public function get_libraryId(){
        return $this->libraryId;
    }

    public function set_libraryId(PublicLibrary $library){
        $this->libraryId = $library->get_libraryId();
    }

    public function get_bookId(){
        return $this->bookId;
    }

    public function set_bookId(Book $book){
        $this->bookId = $book->get_bookId();
    }

    public function get_availabilityStatus(){
        return $this->availabilityStatus;
    }

    public function set_availabitityStatus(AvailabilityStatus $availability){
        $this->availabilityStatus = $availability;
    }

}

?>