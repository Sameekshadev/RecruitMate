<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $user_type = $_POST['user_type']; // from dropdown

    $_SESSION['user_type'] = $user_type; // ✅ store it here for use in forgot password too

    if ($user_type == "candidate") {
        $table = "cand_login";
    } elseif ($user_type == "recruiter") {
        $table = "recruit_login";
    } else {
        echo "<script>alert('Invalid user type selected!'); window.location.href='index.php';</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM $table WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;

        if ($user_type == "candidate") {
            header("Location: welcome_cand.php");
        } else {
            header("Location: welcome_recruit.php");
        }
        exit();
    } else {
        echo '<script>
            alert("Login failed. Invalid username or password!");
            window.location.href="index.php";
        </script>';
    }
}
?>
