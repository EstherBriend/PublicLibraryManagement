<?php
class Admin extends User{
    private $adminId;

    //--------------- Getter and Setter-------------------
    public function get_adminId(){
        return $this->adminId;
    }

    public function set_adminId($id){
        $this->adminId = $id;
    }

    public function find_admin()
    {
        $conn = new Connection();
            try {
                $sqlSelectAdmin = " SELECT * FROM " . $conn->get_dbName() . "." . TableName::ADMIN . " WHERE adminEmail = '" . $this->get_userEmail() . "' AND adminPassword = '" . $this->get_userPassword() . "';";
                $stmt = $conn->connect()->prepare($sqlSelectAdmin);
                $stmt->execute();
                $resultSelectAdmin = $stmt->fetch();
 
                //If given email and password match an existing admin in the db
                if ($resultSelectAdmin) {
                    return $resultSelectAdmin;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e;
            }
        
    }
    public function connect_to_admin_account()
    {
        $conn = new Connection();
        $resultSelect = $this->find_admin();
        if ($resultSelect) {
            header("Location:" . $conn::URL . "adminPage.php");
        } else {
            echo ("Oups! Those Logins seems invalid! Please try to enter new ones");
        }
    }

    public function check_if_admin_exist()
    {
        $conn = new Connection();
            try {
                $sqlSelectAdmin = " SELECT * FROM " . $conn->get_dbName() . "." . TableName::ADMIN . " WHERE adminEmail = '" . $this->get_userEmail() ."';";
                $stmt = $conn->connect()->prepare($sqlSelectAdmin);
                $stmt->execute();
                $resultSelectAdmin = $stmt->fetch();
 
                //If given email and password match an existing admin in the db
                if ($resultSelectAdmin) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e;
            }
        
    }
}
?>