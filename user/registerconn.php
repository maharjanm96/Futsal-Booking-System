<!-- user register connection ko lagi database code -->
<?php
	session_start();

	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$Contact = $_POST['Contact'];
	$password = $_POST['password'];

	if (!empty($fname) || !empty($email) || !empty($Contact) || !empty($password)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "futsal";
	
		// code...
		//create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if (mysqli_connect_error()) {
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		} else {
			$SELECT = "SELECT Contact from register where Contact = ? Limit 1";
			$INSERT = "INSERT Into register (fname, email, Contact, password) values(?, ?, ?, ?)";

			//Prepare statement
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("i",$Contact);
			$stmt->execute();
			$stmt->bind_result($Contact);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if ($rnum==0) {
				$stmt->close();

				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssis", $fname , $email, $Contact, $password);
				$stmt->execute();

				$string = "Registration Successfull";
				$_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 600px; top: 90px"> ' . $string.  '</span>';
				header("Location: http://localhost/project/user/index.php");
				exit();
			} else{
				$mesg = "Contact has already been registered";
				$_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 525px; top: 90px"> ' . $mesg.  '</span>';
				header("Location: http://localhost/project/user/index.php");

				// echo "<h1>Someone has already registered with this number.</h1>";
			}
			$stmt->close();
			$conn->close();
		}
	} else {
		echo "All field are required";
	}
?>
