<?php

class LibraryInventory{
    private $libraryId;
    private $bookId;

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

}

?>