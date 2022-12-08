<!DOCTYPE html>
<?php
include_once('../Autoload.inc.php');
include_once('../Enums/LiteraryGenre.enum.php');
?>

<link rel="stylesheet" href="../CSSFiles/form.css">

<!----------------------- Add Inventory Form ------------------------->
<div class="NewInventoryForm">
    <form name="newInventoryForm" method="post" action="addNewInventory.php">
        <h3>Add a book to the inventory</h3>
        <p>Fields with an asterix are mandatory</p>
        <table>
            <tr>
                <td>* Book &nbsp</td>
                <td>
                    <select name="bookIdSelection" id="book">
                        <?php
                        $bookList = new Book();
                        foreach ($bookList->retrieve_all_books() as $book) {
                        ?>
                            <option value="<?php echo $book["bookId"]; ?>"><?php echo ($book["bookAuthor"] . ', ' . $book["bookTitle"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>* Library &nbsp</td>
                <td>
                    <select name="libraryIdSelection" id="library">
                        <?php
                        $librariesList = new PublicLibrary();
                        foreach ($librariesList->retrieve_all_libraries() as $library) {
                        ?>
                            <option value="<?php echo $library["libraryId"]; ?>"><?php echo $library["libraryName"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" size=25 name="btnSubmit" onclick="return check(this.form)" value="Add to the Inventory"></td>
            </tr>
        </table>
    </form>
</div>
<br><br>

<?php

if (isset($_POST["btnSubmit"])) {
    echo ('post : '.$_POST["bookIdSelection"]);
    $inventory = new LibraryInventory();
    $inventory->set_bookId($_POST["bookIdSelection"]);
    $inventory->set_libraryId($_POST["libraryIdSelection"]);

    //No need to verify inventory exist because a library can have multiple copy of the same book
    // Add the new inventory
    $inventory->add_new_inventory();
}






?>