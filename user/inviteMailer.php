<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamName = $_POST["teamName"];
    $teamStrength = $_POST["teamStrength"];
    $email = $_POST["email"];
    $futsalDate = $_POST["futsalDate"];
    $futsalTime = $_POST["futsalTime"];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0; 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail ->Username ='shadowdead714@gmail.com';
        $mail ->Password ='tofslpvkivnifpqz';
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption; 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to, typically 587 (TLS) or 465 (SSL)

        $mail->setFrom('shadowdead714@gmail.com', 'FUTxSAL');
        $mail->addAddress($email);

        $mail->isHTML(false);
        $mail->Subject = 'Invitation for a Match';
        $mail->Body = "Hello,\n\nYou are invited to participate in a futsal match!\n\nTeam Name: $teamName\nTeam Strength: $teamStrength\nBooked Futsal Date: $futsalDate\nBooked Futsal Time: $futsalTime\n\nPlease join us and enjoy the game!";

        $mail->send();
        //echo "Invitation sent successfully!";
        $_SESSION['status'] = "<h1><center>Invitation Sent.</center></h1>"; 
           
            header("Location: http://localhost/project/user/userdashboard.php");

    } catch (Exception $e) {
        echo "Error: Invitation could not be sent. {$mail->ErrorInfo}";
    }
}
?>
