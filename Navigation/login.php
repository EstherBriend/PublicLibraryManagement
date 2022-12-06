<?php
include_once('../Autoload.inc.php');
session_start(); ?>
<!DOCTYPE html>

<link rel="stylesheet" href="../CSSFiles/form.css">

<!----------------------- Login Form ------------------------->

<form name="loginForm" method="post" action="login.php">
    <h3>Connection to my account</h3>
    <table>
        <tr>
            <td>
                <input type="radio" id="resident" name="typeOfUser" value="Resident" checked>
                <label for="resident">Resident</label>
            </td>
            <td>
                <input type="radio" id="admin" name="typeOfUser" value="Admin">
                <label for="admin">Admin</label>
            </td>

        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size=25 name="userEmail"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="Password" size=25 name="userPassword"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" size=25 name="btnSubmit" onclick="return check(this.form)" value="Sign In"></td>
        </tr>
    </table>
    <a href="http://localhost/PublicLibraryManagement/Navigation/newAccount.php">
        <p>No account yet?</p>
    </a>
</form>
<br>



<?php
if (isset($_POST["btnSubmit"])) {
    $status = $_POST["typeOfUser"];

    if ($status == "Admin") {
        //Connection for admin

        // Retrieve form infos
        $loggedAdmin = new Admin();
        $loggedAdmin->set_userEmail($_POST["userEmail"]);
        $loggedAdmin->set_userPassword($_POST["userPassword"]);

        // Set session infos
        if ($loggedAdmin->find_admin()) {
            $adminInfos =  $loggedAdmin->find_admin();
            $loggedAdmin->set_adminId($adminInfos["adminId"]);
            $_SESSION["loggedAdmin"] = $loggedAdmin;
        }

        // Try to connect to the account
        $loggedAdmin->connect_to_admin_account();
        
    } else {
        // Connection for resident

        // Retrieve form infos
        $loggedResident = new Resident();
        $loggedResident->set_userEmail($_POST["userEmail"]);
        $loggedResident->set_userPassword($_POST["userPassword"]);

        // Set session infos

        if ($loggedResident->find_resident()) {
            $residentInfos =  $loggedResident->find_resident();
            $loggedResident->set_residentId($residentInfos["residentId"]);
            $_SESSION["loggedResident"] = $loggedResident;
        }

        // Try to connect to the account
        $loggedResident->connect_to_resident_account();
    }
}
?>