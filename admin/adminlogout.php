<!-- logout for admin -->
<?php
session_start();

session_destroy();

//echo 'You have been logged out.';
$string= "You have been logged out. ";
$_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 600px; top: 100px"> ' . $string.  '</span>';
header("location:admin.php");
?>

