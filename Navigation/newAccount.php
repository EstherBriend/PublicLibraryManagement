<!DOCTYPE html>
<?php
include_once('../Autoload.inc.php');
?>

<link rel="stylesheet" href="../CSSFiles/form.css">

<!----------------------- Add User Form ------------------------->

<form name="newAccountForm" method="post" action="newAccount.php">
    <h3>Create my account</h3>
    <p>Fields with an asterix are mandatory</p>
    <table>
        <tr>
            <input type="radio" id="resident" name="typeOfUser" value="Resident" checked>
            <label for="resident">Resident</label>
            <input type="radio" id="admin" name="typeOfUser" value="Admin">
            <label for="admin">Admin</label>
        </tr>
        <tr>
            <td>
                <h4>Personnal informations<h4>
            </td>
        </tr>
        <tr>
            <td>* First Name</td>
            <td><input type="text" size=25 name="userFirstName"></td>
        </tr>
        <tr>
            <td>* Last Name</td>
            <td><input type="text" size=25 name="userLastName"></td>
        </tr>
        <tr>
            <td>
                <h4>Address</h4>
            </td>
        </tr>
        <tr>
            <td>* Street Number</td>
            <td><input type="text" size=25 name="addressStreetNum"></td>
        </tr>
        <tr>
            <td>* Street Name</td>
            <td><input type="text" size=25 name="addressStreetName"></td>
        </tr>
        <tr>
            <td>Appartment Number</td>
            <td><input type="text" size=25 name="addressAppNum"></td>
        </tr>
        <tr>
            <td>* City</td>
            <td><input type="text" size=25 name="addressCity"></td>
        </tr>
        <tr>
            <td>* Province</td>
            <td><select name="addressProvince" id="province">
                    <option value="AB">AB</option>
                    <option value="BC">BC</option>
                    <option value="MB">MB</option>
                    <option value="NB">NB</option>
                    <option value="NL">NL</option>
                    <option value="NT">NT</option>
                    <option value="NS">NS</option>
                    <option value="NU">NU</option>
                    <option value="ON">ON</option>
                    <option value="PE">PE</option>
                    <option value="QC">QC</option>
                    <option value="SK">SK</option>
                    <option value="YT">YT</option>
                </select></td>
        </tr>
        <tr>
            <td>* Postal Code</td>
            <td><input type="text" size=25 name="addressPostalCode"></td>
        </tr>
        <tr>
            <td>
                <h4>Login information</h4>
            </td>
        </tr>
        <tr>
            <td>* Email</td>
            <td><input type="text" size=25 name="userEmail"></td>
        </tr>
        <tr>
            <td>* Password</td>
            <td><input type="Password" size=25 name="userPassword"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" size=25 name="btnSubmit" onclick="return check(this.form)" value="Sign Up"></td>
        </tr>
    </table>
    <a href="http://localhost/PublicLibraryManagement/Navigation/login.php">
        <p>Go back to login page</p>
    </a>

</form>
<br><br>




<?php
$isComplete = true;
$formAddress = new Address();
$formUser = new User();
if (isset($_POST["btnSubmit"])) {
    //Verify fullfiled fiels
    $status = $_POST["typeOfUser"];
    $formAddress->set_province($_POST["addressProvince"]);


    if (!empty($_POST["userFirstName"])) {
        $formUser->set_userFirstName($_POST["userFirstName"]);
    } else {
        echo "Please enter First Name";
        $isComplete = false;
    }

    if (!empty($_POST["userLastName"])) {
        $formUser->set_userLastName($_POST["userLastName"]);
    } else {
        echo "Please enter userLastName";
        $isComplete = false;
    }

    if (!empty($_POST["addressStreetNum"])) {
        $formAddress->set_streetNum($_POST["addressStreetNum"]);
    } else {
        echo "Please enter addressStreetNum";
        $isComplete = false;
    }

    if (!empty($_POST["addressStreetName"])) {
        $formAddress->set_streetName($_POST["addressStreetName"]);
    } else {
        echo "Please enter addressStreetName";
        $isComplete = false;
    }
    if (!empty($_POST["addressAppNum"])) {
        $formAddress->set_appNum($_POST["addressAppNum"]);
    } else {
        $formAddress->set_appNum("-");
    }

    if (!empty($_POST["addressCity"])) {
        $formAddress->set_city($_POST["addressCity"]);
    } else {
        echo "Please enter addressCity";
        $isComplete = false;
    }

    if (!empty($_POST["addressPostalCode"])) {
        $formAddress->set_postalCode($_POST["addressPostalCode"]);
    } else {
        echo "Please enter addressPostalCode";
        $isComplete = false;
    }

    if (!empty($_POST["userEmail"])) {
        $formUser->set_userEmail($_POST["userEmail"]);
    } else {
        echo "Please enter userEmail";
        $isComplete = false;
    }

    if (!empty($_POST["userPassword"])) {
        $formUser->set_userPassword($_POST["userPassword"]);
    } else {
        echo "Please enter userPassword";
        $isComplete = false;
    }

    if ($isComplete) {
        //Verify if the user already exist
        if ($status == "Admin") {
            $admin = new Admin();
            $admin->set_userEmail($formUser->get_userEmail());
            $userAlreadyExist = $admin->check_if_admin_exist();
        } else {
            $resident = new Resident();
            $resident->set_userEmail($formUser->get_userEmail());
            $userAlreadyExist = $resident->check_if_resident_exist();
        }

        if ($userAlreadyExist) {
            echo ("This account seems to exist already, please go back on login page to connect.");
        } else {
            //Verify if the address already exist, if yes assigne the existing address Id to the new user, else create a new address and then assign the new addressId to the user
            if ($formAddress->retrieveAddressIdInDb()) {
                $formUser->set_userAddress($formAddress->retrieveAddressIdInDb());
            } else {
                $formAddress->addAddressInDb();
                $formUser->set_userAddress($formAddress->retrieveAddressIdInDb());
            }

            //Create new user

            $formUser->addUser($status);
        }
    }
}

?>