<!-- Admin login page ko lagi database code -->
<?php  

session_start();

    include('config.php');  
    if(isset($_POST['adminlogin']))
 {

    $Contact = $_POST['Contact'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $Contact = stripcslashes($Contact);  
        $password = stripcslashes($password);  
        $Contact = mysqli_real_escape_string($con, $Contact);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from adminloginconn where Contact = '$Contact' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  

            $_SESSION['logged_in'] = true;
            $_SESSION['status'] = "<h1><center>WELCOME ADMIN</center></h1>"; 
            
            header("Location:http://localhost/project/admin/admindashboard.php");
			exit(); 
        }  
        else{ 
            $string = "Invalid Admin Login Credentials";
            $_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 550px; top: 90px"> ' . $string.  '</span>';

            header("Location:http://localhost/project/admin/admin.php");
            
        } 
 }
 if(isset($_POST['userlogin'])){
    header("Location:/project/user/index.php");
    //echo "user login button is clicked";
} 
?>  


