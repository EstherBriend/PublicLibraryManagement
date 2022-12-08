<!DOCTYPE html>
<?php
include_once('../Autoload.inc.php');
include_once('../Enums/LiteraryGenre.enum.php');
?>

<link rel="stylesheet" href="../CSSFiles/bookList.css">

<Table>
    <th>Author</th>
    <th>Title</th>
    <th>Category</th>
    <th>Editor</th>
    <?php
    $bookList = new Book();
    foreach ($bookList->retrieve_all_books() as $book) {
    ?>
        <tr>
            <td><?php echo $book["bookAuthor"]; ?></td>
            <td><?php echo $book["bookTitle"]; ?></td>
            <td><?php echo $book["bookCategory"]; ?></td>
            <td><?php echo $book["bookEditor"]; ?></td>
            <td><input type="submit" size=25 name="btnSubmit" onclick="return check(this.form)" value="Select"></td>
        </tr>
    <?php
    }
    ?>
</Table>