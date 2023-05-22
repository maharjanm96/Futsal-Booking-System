<!-- User ko login ko lagi database code -->
<?php 
session_start();     
    include('config.php');  

    $Contact = $_POST['Contact'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $Contact = stripcslashes($Contact);  
        $password = stripcslashes($password);  
        $Contact = mysqli_real_escape_string($con, $Contact);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from register where Contact = '$Contact' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
         
        if($count == 1){  

            $_SESSION['logged_in'] = $Contact;
            
            $_SESSION['status'] = "<h1><center>Welcome To FUTxSAL " . $Contact. "</center></h1>"; 
            
            header("Location: http://localhost/project/user/userdashboard.php");
				exit(); 
        }  
        else{  
            $string= "Invalid Login Credentials ";
            $_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 600px; top: 100px"> ' . $string.  '</span>';           
            header("Location: http://localhost/project/user/index.php");
            // echo "<h1> Login failed. Invalid Contact or password.</h1>";  
        }     
?>  


