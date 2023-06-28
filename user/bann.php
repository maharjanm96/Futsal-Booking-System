<!-- User side bata book garda bann dekhauni database code -->
<?php      
    include('config.php'); 
    include('mailsender.php'); 

    $Contact = $_POST['Contact'];  
      
        //to prevent from mysqli injection  
        $Contact = stripcslashes($Contact);     
        $Contact = mysqli_real_escape_string($con, $Contact);   
      
        $sql = "select * from ban where Contact = '$Contact' ";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
         
        if($count == 1){     
                    
            $_SESSION['status'] = "<h1><center>You have been banned by Admin.</center></h1>"; 
            //echo 'banned';
            header("Location: http://localhost/project/user/userdashbooking.php");
			exit(); 
        }  
        else{  
           include('userdashdatabase.php');
        }     
?>  


