<!-- banning contact from admin side ,database code. -->
<?php
session_start();
$servername='localhost';
$username='root';
$password='';
$dbname = "futsal";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
	  die('Could not Connect MySql Server:' .mysql_error());
	}

// include_once 'config.php';
if(isset($_POST['submit']));;;;
{    
     
     //$email = $_POST['email'];
     $Contact = $_POST['Contact'];
     $sql = "INSERT INTO ban (Contact) VALUES ('$Contact')";
     if (mysqli_query($conn, $sql)) 
     {
      $_SESSION['status'] = "<h1><center>Contact Successfully Banned.</center></h1>";
      header("Location: http://localhost/project/admin/adminbann.php");
     }
      else
       {
        $_SESSION['status'] = "<h1><center>Already in a bann list.</center></h1>"; 
        header("Location: http://localhost/project/user/userdashbooking.php");
        //echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>