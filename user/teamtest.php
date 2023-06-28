<?php

// Define team strength levels
$strengthLevels = [
    1 => 'Beginner',
    2 => 'Intermediate',
    3 => 'Advanced',
    4 => 'Expert',
    5 => 'Professional',
];

// Get team information from form
$teamName = $_POST['teamName'];
$teamStrength = $_POST['teamStrength'];

// Check if team strength is valid
if ($teamStrength < 1 || $teamStrength > 5) {
    echo 'Invalid team strength';
    exit;
}


// Connect to database and insert team data
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'futsal';

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (mysqli_connect_error()) {
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		} 
        else {
                 $SELECT_info = "SELECT * from teams where name='$teamName' and strength='$teamStrength'";		
                $exe = mysqli_query($conn,$SELECT_info);
                if($row=mysqli_fetch_assoc($exe))
                {
                        //error to register team
                        echo 'Team already exists.';
                        //$_SESSION['status'] = "<h1><center>Someone has already booked this time. Please select different time.</center></h1>";
                        //header("Location: http://localhost/project/user/userdashbooking.php");

                        $sql = "SELECT * FROM teams WHERE strength='$teamStrength' AND name<>'$teamName'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo 'Matching teams found:<br>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['name'] . ' (' . $strengthLevels[$row['strength']] . ')<br>';
                            }
                        } else {
                            echo 'No matching teams found';
                        }

                        }

			    
                else{

                        $sql = "INSERT INTO teams (name, strength) VALUES ('$teamName', $teamStrength)";
                        if (mysqli_query($conn, $sql)) {
                            echo 'Team registered successfully';


                            //try code
                            $sql = "SELECT * FROM teams WHERE strength='$teamStrength' AND name<>'$teamName'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo 'Matching teams found:<br>';

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['name'] . ' (' . $strengthLevels[$row['strength']] . ')<br>';
                                }
                            } else {
                                echo '<br>No matching teams found';
                            }

                        } 
                        else {
                        echo 'Error registering team: ' . mysqli_error($conn);
                        }
                    }        
            }

mysqli_close($conn);

?>