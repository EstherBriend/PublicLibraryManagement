<?php
class BookLoan{
    private $loanId;
    private $residentId;
    private $inventoryId;
    private $returnDate;
    private $loanDate;
    private $loanStatus;

    //--------------- Getter and Setter  -------------------
    
    public function get_userId(){
        return $this->residentId;
    }
    public function set_userID(Resident $resident){
        $this->residentId = $resident->get_residentId();
    }

    public function get_loanId(){
        return $this->loanId;
    }

    public function set_loanId(Book $loan){
        $this->loanId = $loan->get_bookId();
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

    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    public function setInventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;
    }
}
?>
