<!DOCTYPE html>
<?php
include('../Classes/dbManagement.class.php');
session_start();
?>

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
    $email = $_POST["userEmail"];
    $password = $_POST["userPassword"];
    $status = $_POST["typeOfUser"];

    $dbManagement = new dbManagement();
    $_SESSION["userId"]= $dbManagement->dbConnection($email, $password, $status);
    $_SESSION{""}
}
?>