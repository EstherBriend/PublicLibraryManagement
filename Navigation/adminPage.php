<?php
session_start();
 ?>
<!DOCTYPE html>
<?php
include_once('../Autoload.inc.php');
include_once('adminHeader.php');
?>

<body>
<?php
echo "Welcome " . $_SESSION["adminFirstName"] . " " . $_SESSION["adminLastName"];
?>
</body>
