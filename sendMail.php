<?php
// session_start();

// set-Up to send email 
require 'vendor/autoload.php'; // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// geting email entered my user and checking existance and send OTp 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // global $email;
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'sswayam211@gmail.com'; // Replace with your email
        $mail->Password = 'cvbo lxnw pnbp gmtc'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sswayam211@gmail.com', 'Reset Password'); // Replace with your email and name
        $mail->addAddress($email, $row['NAME']); // Replace with recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body = "Your OTP code to reset password is: <br><b>$randNo</b>";

        $mail->send();
        echo 'OTP has been sent successfully!';

        $encryptOTP = password_hash($randNo, PASSWORD_DEFAULT);
        // echo 'Encrypted otp is : ' . $encryptOTP;

        $_SESSION['user_email'] = $email;
        $_SESSION['OTP'] = $encryptOTP;

        header('Location: /Office/blog-website/pages/forgetPass.php?otp=send');
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        header('Location: /Office/blog-website/pages/forgetPass.php?error=2');
        exit();
    }
}
