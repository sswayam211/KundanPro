<?php
// session_start();

// set-Up to send email 
require 'vendor/autoload.php'; // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// geting email entered my user and checking existance and send OTp 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // global $email;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'sswayam211@gmail.com'; // Replace with your email
        $mail->Password = 'akpw rqtq jlwe bqkk'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sswayam211@gmail.com', 'By Kundan Projects'); // Replace with your email and name
        $mail->addAddress('kundanprojects@gmail.com', 'KundanPro Website'); // Replace with recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'User Querry From Website';
        $mail->Body = "Username : <b>$name</b><br>Email : <b>$email</b><br>Message : <b>$message</b><br>";

        $mail->send();
        echo 'Thanks for contacting us we will contact back soon!';

        // $encryptOTP = password_hash($randNo, PASSWORD_DEFAULT);
        // echo 'Encrypted otp is : ' . $encryptOTP;

        // $_SESSION['user_email'] = $email;
        // $_SESSION['OTP'] = $encryptOTP;

        // header('Location: /Office/blog-website/pages/forgetPass.php?otp=send');
        exit();
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "There is an error, please try again later.";

        // header('Location: /Office/blog-website/pages/forgetPass.php?error=2');
        exit();
    }
}
