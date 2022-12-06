<?php
include_once('../Autoload.inc.php');
include_once('header.php');
session_start();
?>
<!DOCTYPE html>

<link rel="stylesheet" href="../CSSFiles/residentPage.css">



<div class="WecolmeMessage">
    <h2 ><?php echo "Welcome " . $_SESSION["residentFirstName"] . " " . $_SESSION["residentLastName"] . "<br><br>"; ?></h2>
</div> 

<div class="Loans">
    <?php
    $residentLoans = $_SESSION["loggedResident"]->retrieve_loans();
    ?>
    <h4>My current loans</h4>
    <table>
        <thead>
            <th>Book</th>
            <th>Loan Date</th>
            <th>Return Date</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php
            $tempLoan = new BookLoan();
            foreach ($residentLoans as $loan) {
                $tempLoan->set_inventoryId($loan["inventoryId"]);
                echo "<tr><td>" . $tempLoan->retrieve_book_title_and_author_from_inventory_id() . "</td>";
                echo "<td>" . $loan["loanDate"] . "</td>";
                echo "<td>" . $loan["returnDate"] . "</td>";
                echo "<td>" . $loan["loanStatus"] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>