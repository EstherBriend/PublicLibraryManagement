<?php
include_once('../Autoload.inc.php');
include_once('../Enums/TableName.enum.class.php');

class Book{
    private $bookId;
    private $bookAuthor;
    private $bookTitle;
    private $bookCategory;
    private $bookEditor;


    //--------------- Getter and Setter  -------------------
    
    public function get_bookId(){
        return $this->bookId;
    }

    public function get_bookAuthor(){
        return $this->bookAuthor;
    }

    public function set_bookAuthor($author){
        $this->bookAuthor = $author;
    }

    public function get_bookTitle(){
        return $this->bookTitle;
    }

    public function set_bookTitle($title){
        $this->bookTitle = $title;
    }

    public function get_bookCategory(){
        return $this->bookCategory;
    }

    public function set_bookCategory($category){
        $this->bookCategory = $category;
    }

    public function get_bookEditor(){
        return $this->bookEditor;
    }

    public function set_bookEditor($editor){
        $this->bookEditor = $editor;
    }

    //--------------- Methods  -------------------

    public function check_if_book_exist(){
        $conn = new Connection();
        $sqlSelectBook = 'SELECT * FROM '.$conn->get_dbName().'.'.TableName::BOOK.' WHERE bookAuthor = "'.$this->bookAuthor.'" AND bookTitle = "'.$this->bookTitle.'" AND bookCategory = "'.$this->bookCategory.'" AND bookEditor = "'.$this->bookEditor.'";';
        $stmt = $conn->connect()->prepare($sqlSelectBook);
        $stmt->execute();
        $resultSelectBook = $stmt->fetch();

        if($resultSelectBook){
            return true;
        }else{
            return false;
        }
    }

    public function add_new_book(){
        $conn = new Connection();
        $sqlAddBook = 'INSERT INTO '. $conn->get_dbName() . '.' . TableName::BOOK. '(bookAuthor, bookTitle, bookCategory, bookEditor)
        VALUES ("'.$this->bookAuthor.'", "'.$this->bookTitle.'", "'.$this->bookCategory.'", "'.$this->bookEditor.'");';
        $stmt = $conn->connect()->prepare($sqlAddBook);
        $stmt->execute();
    }

    public function retrieve_all_books(){
        $conn = new Connection();
        $sqlRetrieveAllBooks = 'SELECT * FROM '.$conn->get_dbName().'.'.TableName::BOOK.';';
        $stmt = $conn->connect()->prepare($sqlRetrieveAllBooks);
        $stmt->execute();
        $resultRetrieveAllBooks = $stmt->fetchAll();
        return $resultRetrieveAllBooks;
    }
}
?>