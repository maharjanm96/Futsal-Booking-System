<!-- user le delete garni database code -->
<?php
    $conn = mysqli_connect("localhost", "root", "", "futsal");
    if(isset($_POST['delete'])){
        

        $sn= $_POST['sn'];

        $dis_query ="DELETE from booking WHERE sn='$sn' ";
        $dis_execute = mysqli_query($conn,$dis_query);

       
        if($dis_execute){
            $_SESSION['status'] = "<h1><center>Booking Deleted Successfully..</center></h1>"; 
            header("location:userloyalty.php");
        }
        else{
            $_SESSION['status'] = "<h1><center>Delete Failed.</center></h1>"; 
            header("location:userloyalty.php");
        }
        
    }

?>