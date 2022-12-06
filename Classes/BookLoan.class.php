<?php
include_once('../Autoload.inc.php');
include_once('../Enums/TableName.enum.class.php');

class BookLoan
{

    private $loanId;
    private $residentId;
    private $inventoryId;
    private $returnDate;
    private $loanDate;
    private $loanStatus;

    //--------------- Getter and Setter  -------------------

    public function get_userId()
    {
        return $this->residentId;
    }
    public function set_userID(Resident $resident)
    {
        $this->residentId = $resident->get_residentId();
    }

    public function get_loanId()
    {
        return $this->loanId;
    }

    public function set_loanId(Book $loan)
    {
        $this->loanId = $loan->get_bookId();
    }

    public function get_returnDate()
    {
        return $this->returnDate;
    }

    public function get_loanDate()
    {
        return $this->loanDate;
    }

    public function get_loanStatus()
    {
        return $this->loanStatus;
    }

    public function set_loanStatus(LoanStatus $status)
    {
        $this->loanStatus = $status;
    }

    public function get_inventoryId()
    {
        return $this->inventoryId;
    }

    public function set_inventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;
    }

    //--------------- Methods  -------------------

    public function retrieve_book_title_and_author_from_inventory_id()
    {
        $conn = new Connection();
        $sqlSelectBookIdFromInventoryTable = "SELECT * FROM " . $conn->get_dbName() . "." . TableName::INVENTORY . " WHERE inventoryId = " . $this->inventoryId . ";";
        $stmt = $conn->connect()->prepare($sqlSelectBookIdFromInventoryTable);
        $stmt->execute();
        $inventory = $stmt->fetch();

        $sqlSelectBookTitleFromBookTable = "SELECT * FROM " . $conn->get_dbName() . "." . TableName::BOOK . " WHERE bookId = " . $inventory["bookId"] . ";";
        $stmt = $conn->connect()->prepare($sqlSelectBookTitleFromBookTable);
        $stmt->execute();
        $book = $stmt->fetch();

        return $book["bookAuthor"] . ", " . $book["bookTitle"];
    }
}
