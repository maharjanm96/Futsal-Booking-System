<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\PHPMailer;

 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/SMTP.php';

 if(isset($_POST["book"])){
    $date= $_POST['date'];
    $time= $_POST['time'];

    $mail = new PHPMailer(true);

    $mail ->isSMTP();
    $mail ->Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true;
    $mail ->Username ='shadowdead714@gmail.com';
    $mail ->Password ='tofslpvkivnifpqz';
    $mail ->SMTPSecure = 'ssl';
    $mail ->Port = 465;

    $mail ->setFrom('shadowdead714@gmail.com','FUTxSAL');

    $mail ->addAddress($_POST['email']);
    $mail ->isHTML(true);

    $mail ->Subject =  'Booking Successfull';
    $mail->Body =  'Your game from '.$time.' has been booked successfully at '.$date.'. Please arrive in time. Thank You for choosing FUTxSAL. Have a great game.';

    $mail ->send();


 }
?>