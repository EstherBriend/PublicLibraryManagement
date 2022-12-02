<?php
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

    public function set_bookCategory(LiteraryGenre $category){
        $this->bookCategory = $category;
    }

    public function get_bookEditor(){
        return $this->bookEditor;
    }

    public function set_bookEditor($editor){
        $this->bookEditor = $editor;
    }
}
?>