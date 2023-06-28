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
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

// Check if team already exists
$sql = "SELECT * FROM teams WHERE name = '$teamName' AND strength = '$teamStrength'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo 'Team already exists.';

    // Find matching teams with the same strength but different names using brute force algorithm
    $matchingTeams = findMatchingTeams($teamName, $teamStrength, $conn);

    if (!empty($matchingTeams)) {
        echo 'Matching teams found:<br>';
        foreach ($matchingTeams as $matchingTeam) {
            echo $matchingTeam['name'] . ' (' . $strengthLevels[$matchingTeam['strength']] . ')<br>';
        }
    } else {
        echo 'No matching teams found';
    }
} else {
    // Insert team data into the database
    $sql = "INSERT INTO teams (name, strength) VALUES ('$teamName', '$teamStrength')";

    if (mysqli_query($conn, $sql)) {
        echo 'Team registered successfully';

        // Find matching teams with the same strength but different names using brute force algorithm
        $matchingTeams = findMatchingTeams($teamName, $teamStrength, $conn);

        if (!empty($matchingTeams)) {
            echo 'Matching teams found:<br>';
            foreach ($matchingTeams as $matchingTeam) {
                echo $matchingTeam['name'] . ' (' . $strengthLevels[$matchingTeam['strength']] . ')<br>';
            }
        } else {
            echo 'No matching teams found';
        }
    } else {
        echo 'Error registering team: ' . mysqli_error($conn);
    }
}

mysqli_close($conn);

/**
 * Find matching teams with the same strength but different names using brute force algorithm
 * @param string $teamName The name of the team
 * @param int $teamStrength The strength level of the team
 * @param mysqli $conn The database connection object
 * @return array The array of matching teams
 */
function findMatchingTeams($teamName, $teamStrength, $conn) {
    $matchingTeams = [];

    // Retrieve all teams with the same strength level
    $sql = "SELECT * FROM teams WHERE strength = '$teamStrength'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        // Exclude the team with the same name as the registered team
        if ($row['name'] !== $teamName) {
            $matchingTeams[] = $row;
        }
    }

    return $matchingTeams;
}

?>
