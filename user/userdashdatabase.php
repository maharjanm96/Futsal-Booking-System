<!-- User le booking garey pacchi database ma jani code/// form bata details jani -->
<?php
	session_start();

	$fname = $_POST['fname'];
	$Contact = $_POST['Contact'];
	$email = $_POST['email'];
	$date=$_POST['date'];
	$time = $_POST['time'];
	
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "futsal";
			
		// code...
		//create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== $Contact)
		{
			//echo "Allow Booking";	

		if (mysqli_connect_error()) {
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		} else {
			
			$SELECT_info = "SELECT * from booking where date='$date' and time = '$time'";		
			$exe = mysqli_query($conn,$SELECT_info);
			if($row=mysqli_fetch_assoc($exe))
			{
					//error to book
					$_SESSION['status'] = "<h1><center>Someone has already booked this time. Please select different time.</center></h1>";
					header("Location: http://localhost/project/user/userdashbooking.php");
			}
			else
			{
				$INSERT = "INSERT Into booking (fname,Contact,email,date,time) values(?, ?, ?, ?, ?)";
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sssss", $fname, $Contact, $email, $date, $time);
				$stmt->execute();
				$_SESSION['status'] = "<h1><center>Your game has been booked from " .$time. "</center></h1>";
				include('mailsender.php'); 
				header("Location: http://localhost/project/user/userdashboard.php");
			}
			
			$stmt->close();
			$conn->close();
		}
	}

	else{
		//echo 'Contact is not Authorized.';
		$_SESSION['status'] = "<h1><center>This Contact (".$Contact.") is Not Authorized.</center></h1>";

		header("Location: http://localhost/project/user/userdashboard.php");
	}
	
	
?>