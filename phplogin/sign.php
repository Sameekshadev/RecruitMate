<?php
session_start();
// Connect to your DB
$conn = new mysqli("localhost", "root", "", "recruit_mate");

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// On form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usertype = $_POST['user_type'];
    $username = $_POST['user'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['pass']; 
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
    die("<script>alert('Only Gmail addresses are allowed.'); window.location.href='signup.php';</script>");
}


    // First, insert login credentials into their respective login tables
    if ($usertype == "candidate") {
        $login_sql = "INSERT INTO cand_login (username, password) VALUES (?, ?)";
        $info_sql = "INSERT INTO cand_info (username, first_name, last_name, email, mobile, password) VALUES (?, ?, ?, ?, ?, ?)";
    } else if ($usertype == "recruiter") {
        $login_sql = "INSERT INTO recruit_login (username, password) VALUES (?, ?)";
        $info_sql = "INSERT INTO recruit_info (username, first_name, last_name, email, mobile, password) VALUES (?, ?, ?, ?, ?, ?)";
    } else {
        die("Invalid user type selected.");
    }

    // Insert into login table
    $stmt_login = $conn->prepare($login_sql);
    $stmt_login->bind_param("ss", $username, $password);

    // Insert into info table
    $stmt_info = $conn->prepare($info_sql);
    $stmt_info->bind_param("ssssss", $username, $fname, $lname, $email, $mobile, $password);

    // Execute both
    if ($stmt_login->execute() && $stmt_info->execute()) {
        $_SESSION['username'] = $username;
        if ($usertype == "candidate") {
            header("Location: ../welcomeback_cand.html");
        } else {
            header("Location: ../welcomeback_recruit.html");
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statements
    $stmt_login->close();
    $stmt_info->close();
    $conn->close();
}
?>