<?php
class Resident extends User
{
    private $residentId;

    //--------------- Getter and Setter -------------------

    public function get_residentId()
    {
        return $this->residentId;
    }

    public function set_residentId($id){
        $this->residentId = $id;
    }

    public function find_resident()
    {
        $conn = new Connection();
        try {
            $sqlSelectResident = " SELECT * FROM " . $conn->get_dbName() . "." . TableName::RESIDENT . " WHERE residentEmail = '" . $this->get_userEmail() . "' AND residentPassword = '" . $this->get_userPassword() . "';";
            $stmt = $conn->connect()->prepare($sqlSelectResident);
            $stmt->execute();
            $resultSelectResident = $stmt->fetch();

            //If given email and password match an existing resident in the db
            if ($resultSelectResident) {
                return $resultSelectResident;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }



    public function connect_to_resident_account()
    {
        $conn = new Connection();
        $resultSelect = $this->find_resident();
        if ($resultSelect) {
            header("Location:" . $conn::URL . "residentPage.php");
        } else {
            echo ("Oups! Those Logins seems invalid! Please try to enter new ones");
        }
    }

    public function check_if_resident_exist()
    {
        $conn = new Connection();
        try {
            $sqlSelectResident = " SELECT * FROM " . $conn->get_dbName() . "." . TableName::RESIDENT . " WHERE residentEmail = '" . $this->get_userEmail() . "';";
            $stmt = $conn->connect()->prepare($sqlSelectResident);
            $stmt->execute();
            $resultSelectResident = $stmt->fetch();

            //If given email match an existing resident in the db
            if ($resultSelectResident) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function retrieve_loans()
    {
        $conn = new Connection();
        try {
            $sqlSelectLoanByResidentId = "SELECT * FROM " . $conn->get_dbName() . "." . TableName::LOAN . " WHERE residentId = " . $this->residentId . ";";
            $stmt = $conn->connect()->prepare($sqlSelectLoanByResidentId);
            $stmt->execute();
            $resultSelectLoanByResidentId = $stmt->fetchAll();
            return $resultSelectLoanByResidentId;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
