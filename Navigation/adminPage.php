<?php
session_start();
 ?>
<!DOCTYPE html>
<?php
include_once('../Autoload.inc.php');
?>

<?php
echo "Welcome " . $_SESSION["adminFirstName"] . " " . $_SESSION["adminLastName"];
?>