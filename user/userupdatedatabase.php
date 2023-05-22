<!-- user le update garni database code trial phase -->
<?php
session_start();
  $conn = mysqli_connect("localhost", "root", "");
  $db = mysqli_select_db($conn,'futsal');
  if(isset($_POST['update'])){
   
       $sn =  $_POST['sn'];
       $fname = $_POST['fname'];
      //  $Contact = $_POST['Contact'];
      //  $email = $_POST['email'];
       $date = $_POST['date'];
       $time = $_POST['time'];
 
    $query = "UPDATE booking SET fname='$fname', date='$date', time='$time'  WHERE sn='$sn'";

    $query_run = mysqli_query($conn,$query);

      if($query_run==true){
          //echo "Updated ";
          $_SESSION['status'] = "<h1><center> Booking Updated Successfull</center></h1>";
          header("location:userdashboard.php");
      }
      else{
          // echo "Data Not Updated";
          $_SESSION['status'] = "<h1><center>Booking Update Failed</center></h1>";
          header("location:userdashboard.php");
      }    
  }
?>

