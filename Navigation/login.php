<!DOCTYPE html>
<?php
include('../Classes/dbManagement.class.php');
?>

<!----------------------- Login Form ------------------------->

<form name="loginForm" method="post" action="login.php">
    <h3>Connection to my account</h3>
    <table>
        <tr>
            <input type="radio" id="resident" name="typeOfUser" value="Resident" checked>
            <label for="resident">Resident</label>
            <input type="radio" id="admin" name="typeOfUser" value="Admin">
            <label for="admin">Admin</label>
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
            <td><input type="submit" size = 25 name = "btnSubmit" onclick="return check(this.form)" value="Sign In"></td>
        </tr>
    </table>
</form>
<br>
<a href="http://localhost/PublicLibraryManagement/Navigation/newAccount.php">No account yet?</a>


<?php
if(isset($_POST["btnSubmit"])){
    $email = $_POST["userEmail"];
    $password = $_POST["userPassword"];
    $status = $_POST["typeOfUser"];

    $dbManagement = new dbManagement();
    $dbManagement->dbConnection($email,$password,$status);
  
}
?>