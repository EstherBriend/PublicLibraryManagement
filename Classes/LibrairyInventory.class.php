<?php

class LibrairyInventory{
    private $librairyId;
    private $bookId;

    public function get_librairyId(){
        return $this->librairyId;
    }

    public function set_librairyId(PublicLibrary $library){
        $this->librairyId = $library->get_libraryId();
    }

    public function get_bookId(){
        return $this->bookId;
    }

    public function set_bookId(Book $book){
        $this->bookId = $book->get_bookId();
    }

}

?>