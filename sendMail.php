<?php
require 'vendor/autoload.php'; // PHPMailer installed via Composer
require 'vendor/autoload.php'; // PHPMailer installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json'); // response in JSON
header('Content-Type: application/json'); // response in JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    
    $servername = "localhost"; // On GoDaddy it is usually localhost
    $username   = "KundanPro";
    $password   = "Sujeet@3005";
    $database   = "KUNDANPRO@LIVE";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully!"; 
    
    $sql = "INSERT INTO Contact_info (NAME, EMAIL, MESSAGE) VALUES ('$name','$email','$message')";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){
        echo "Error: " . mysqli_error($conn);
    } else {
        // echo "Data saved successfully!";
        
        
        // sending mail
        $mail = new PHPMailer(true);
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    
    $servername = "localhost"; // On GoDaddy it is usually localhost
    $username   = "KundanPro";
    $password   = "Sujeet@3005";
    $database   = "KUNDANPRO@LIVE";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully!"; 
    
    $sql = "INSERT INTO Contact_info (NAME, EMAIL, MESSAGE) VALUES ('$name','$email','$message')";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){
        echo "Error: " . mysqli_error($conn);
    } else {
        // echo "Data saved successfully!";
        
        
        // sending mail
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.kundanpro.com';   // try smtpout.secureserver.net if this fails
            $mail->SMTPAuth   = true;
            $mail->Username   = 'contact@kundanpro.com'; 
            $mail->Password   = 'Sujeet@3005';  // the password you set in cPanel
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587;
        
            // Recipients
            $mail->setFrom('contact@kundanpro.com', 'By Kundan Projects');
            $mail->addAddress('kundanprojects@gmail.com', 'KundanPro Website');
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body    = "Username : <b>$name</b><br>Email : <b>$email</b><br>Message : <b>$message</b>";
        
            $mail->send();
        
            echo json_encode(["status" => "success", "message" => "Thanks for contacting us, we will reply soon!"]);
            exit;
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "Mailer Error: {$mail->ErrorInfo}"]);
            exit;
        }

        
    }
    
    
    

    
    $conn->close();
}
