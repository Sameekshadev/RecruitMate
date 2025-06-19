<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

session_start();
include("../phplogin/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $email = $_POST['email'];
    if (isset($_POST['user_type'])) {
    $user_type = $_POST['user_type'];
} else {
    echo "<script>alert('Please select user type.'); window.location.href='../forgotpass.html';</script>";
    exit();
}

    $table = ($user_type === 'candidate') ? 'cand_info' : (($user_type === 'recruiter') ? 'recruit_info' : '');

    if ($table === '') {
        echo "<script>alert('Invalid user type!'); window.location.href='../phplogin/index.php';</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM $table WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $user_type; // ✅ this fixes your missing user_type later

        // Send OTP via Gmail SMTP using PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sameekshadevulapally13@gmail.com'; // 👉 your Gmail
            $mail->Password   = 'fzjqbfniydgzyvhz';   // 👉 16-digit App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('sameekshadevulapally13@gmail.com', 'RecruitMate');
            $mail->addAddress($email, $username);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP for Password Reset - RecruitMate';
            $mail->Body    = "Hello <b>$username</b>,<br><br>Your OTP is: <b>$otp</b><br><br>Use it to reset your RecruitMate password.";

            $mail->send();
            header("Location: verify_otp.php");
            exit();

        } catch (Exception $e) {
            echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.location.href='../forgotpass.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with that username and email!'); window.location.href='../forgotpass.html';</script>";
    }
}
?>