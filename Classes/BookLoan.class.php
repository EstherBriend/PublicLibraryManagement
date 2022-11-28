<?php
class BookLoan{
    private $residentId;
    private $bookId;
    private $returnDate;
    private $loanDate;
    private $loanStatus;

    public function get_userId(){
        return $this->residentId;
    }
    public function set_userID(Resident $resident){
        $this->residentId = $resident->get_residentId();
    }

    public function get_bookId(){
        return $this->bookId;
    }

    public function set_bookId(Book $book){
        $this->bookId = $book->get_bookId();
    }

    public function get_returnDate(){
       return $this->returnDate;
    }

    public function get_loanDate(){
        return $this->loanDate;
    }

    public function get_loanStatus(){
        return $this->loanStatus;
    }

    public function set_loanStatus(LoanStatus $status){
        $this->loanStatus = $status;
    }




}
?>
