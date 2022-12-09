<!DOCTYPE html>
<?php
include_once('../Autoload.inc.php');
include_once('../Enums/LiteraryGenre.enum.php');
include_once('adminHeader.php');
?>

<link rel="stylesheet" href="../CSSFiles/form.css">

<!----------------------- Add Book Form ------------------------->

<form name="newBookForm" method="post" action="addBookPage.php">
    <h3>Add new book</h3>
    <p>Fields with an asterix are mandatory</p>
    <table>
        <tr>
            <td>* Author</td>
            <td><input type="text" size=25 name="author"></td>
        </tr>
        <tr>
            <td>* Title</td>
            <td><input type="text" size=25 name="title"></td>
        </tr>
        <tr>
            <td>* Category</td>
            <td><select name="category" id="category">
                    <option value="fiction"><?php echo LiteraryGenre::FICTION ?></option>
                    <option value="humanities"><?php echo LiteraryGenre::HUMANITIES ?></option>
                    <option value="periodical"><?php echo LiteraryGenre::PERIODICAL ?></option>
                    <option value="science"><?php echo LiteraryGenre::SCIENCE ?></option>
                    <option value="wellbeing"><?php echo LiteraryGenre::WELLBEING ?></option>
                </select></td>
        </tr>
        <tr>
            <td>* Editor</td>
            <td><input type="text" size=25 name="editor"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" size=25 name="btnSubmit" onclick="return check(this.form)" value="Add new book"></td>
        </tr>
    </table>
</form>
<br><br>

<?php
$isComplete = true;
$formBook = new Book();
if (isset($_POST["btnSubmit"])) {
    
    $formBook->set_bookCategory($_POST["category"]);
    
    //Verify fullfiled fiels
    if (!empty($_POST["author"])) {
        $formBook->set_bookAuthor($_POST["author"]);
    } else {
        echo "Please enter the author";
        $isComplete = false;
    }

    if (!empty($_POST["title"])) {
        $formBook->set_bookTitle($_POST["title"]);
    } else {
        echo "Please enter the tile";
        $isComplete = false;
    }

    if (!empty($_POST["editor"])) {
        $formBook->set_bookEditor($_POST["editor"]);
    } else {
        echo "Please enter the editor";
        $isComplete = false;
    }

    if ($isComplete) {
        //Verify if the book already exist
        if ($formBook->check_if_book_exist()) {
            echo ("This book is already in the database. If you want to add it to a new library, please go to the page add inventory.");
        } else {
            // Add the new book to the database
            $formBook->add_new_book();
        }
    }
}

?>