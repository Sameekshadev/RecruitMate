<?php
session_start();
include("../phplogin/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $user_type = $_SESSION['user_type'];


    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password != $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='reset_password.php';</script>";
        exit();
    }

    $table = ($user_type === 'candidate') ? 'cand_info' : (($user_type === 'recruiter') ? 'recruit_info' : '');
    $logintable=($user_type === 'candidate') ? 'cand_login' : (($user_type === 'recruiter') ? 'recruit_login' : '');
    if ($table === '') {
        echo "<script>alert('Invalid user type!'); window.location.href='reset_password.php';</script>";
        exit();
    }

    $query = "UPDATE $table SET password='$new_password' WHERE email='$email'";

    if ($conn->query($query) === TRUE) {
        if($table==='cand_info'){
        echo "<script>alert('Password updated successfully!'); window.location.href='../phplogin/welcome_cand.php';</script>";
        }
        else if($table==='recruit_info'){
            echo "<script>alert('Password updated successfully!'); window.location.href='../phplogin/welcome_recruit.php';</script>";
        }
    } else {
        echo "<script>alert('Something went wrong. Try again.'); window.location.href='reset_password.php';</script>";
    }
}
?>