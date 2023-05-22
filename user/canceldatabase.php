<!-- User le cancel gare pacchi database ko code -->
<?php
session_start();

$con = mysqli_connect('localhost','root','','futsal');

    $Contact=$_GET['Contact'];

    //$cancel="INSERT into cancel values ('$Contact', '$time')"  ,'$fname','$date','$time';
    $cancel="INSERT into cancel VALUES  ('$Contact')";
    $execute = mysqli_query($con,$cancel);


        //echo 'Successful from user folder';
         $_SESSION['status'] = "<h1><center>Cancelled. Please wait for ADMIN Approval for Deletion.</center></h1>";
        header("Location:http://localhost/project/user/userloyalty.php");
       

?>