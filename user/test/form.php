<!DOCTYPE html>
<html>
<head>
    <title>Email Invitation</title>
</head>
<body>
    <form method="post" action="mail.php">
        <label>Enter team name:</label>
        <input type="text" name="teamName" required><br>
        <label>Enter team strength:</label>
        <input type="text" name="teamStrength" required><br>
        <label>Enter email to send invite:</label>
        <input type="email" name="email" required><br>
        <label>Enter booked futsal time:</label>
        <input type="text" name="futsalTime" required><br>
        <button type="submit">Invite</button>
    </form>
</body>
</html>
