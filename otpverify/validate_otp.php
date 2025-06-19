<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];
    
    if ($entered_otp == $_SESSION['otp']) {
        header("Location: reset_password.php");
        exit();
    } else {
        echo "<script>alert('Invalid OTP.'); window.location.href='verify_otp.php';</script>";
    }
}
?>
