<?php
//include('../Autoload.inc.php');
include('Connection.class.php');
include ('../Enums/TableName.enum.class.php');

class dbManagement{

    public function dbConnection($userEmail, $userPassword, $typeOfUser){
        $conn = new Connection();

        if($typeOfUser == 'Admin'){
            //Connection for admin
            try{
                $sqlSelectAdmin = " SELECT * FROM ".$conn->get_dbName().".".TableName::ADMIN." WHERE adminEmail = '".$userEmail."' AND adminPassword = '".$userPassword."';";
                 $stmt = $conn->connect()->prepare($sqlSelectAdmin);
                 $stmt->execute(); 
                 $resultSelectAdmin = $stmt->fetch();

                 echo ("RESULT = ".$resultSelectAdmin == false);

                //If given email and password match an existing admin in the db
                if($resultSelectAdmin){
                    header("Location:".$conn::URL."adminPage.php");
                }else{
                    echo ("Oups! Those Logins seems invalid! Please try to enter new ones");
                }
    
            }catch(PDOException $e){
                echo $e;
            }
    
        }else if($typeOfUser == 'Resident'){
            //Connection for resident
            try{
                $sqlSelectResident = " SELECT * FROM ".$conn->get_dbName().".".TableName::RESIDENT." WHERE residentEmail = '".$userEmail."' AND residentPassword = '".$userPassword."';";
                $stmt = $conn->connect()->prepare($sqlSelectResident);
                $stmt->execute();
                $resultSelectResident = $stmt->fetch();

                //If given email and password match an existing resident in the db
                if($resultSelectResident){
                    header("Location:".$conn::URL."residentPage.php");
                }else{
                    echo ("Oups! Those Logins seems invalid! Please try to enter new ones");
                }
    

            }catch(PDOException $e){
                echo $e;
            }
    
        }
    
}

public function findUserOrAdmin(){
    
}


}
?>