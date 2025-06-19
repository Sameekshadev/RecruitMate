<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sameekshadevulapally13@gmail.com';       // ✅ Your Gmail address
        $mail->Password   = 'fzjqbfniydgzyvhz';         // ✅ Your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        // Email content
        $mail->setFrom($mail->Username, 'RecruitMate Contact Form');
        $mail->addAddress('fikimey887@besibali.com');      // ✅ Your temporary/fake email

        $mail->Subject = "New contact message from $name";
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        header("Location:phplogin/contactsuccess.php");
        /*echo "Message sent successfully!";*/
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
