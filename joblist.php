<?php
include 'phplogin/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recruiter_email = $_POST['email'];
    $title = $_POST['title'];
    $rate = $_POST['rate'];
    $av = $_POST['av'];
    $company = $_POST['companyName'];
    $location = $_POST['location'];
    $hours = $_POST['hours'];
    $description = $_POST['description'];
    $workplace = $_POST['workplace'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];

    $sql = "INSERT INTO jobs (title, rate, av, companyName, location, hours, description, workplace, education, experience, recruiter_email) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssss",
        $title, $rate, $av, $company, $location,
        $hours, $description, $workplace, $education,
        $experience, $recruiter_email
    );

    if ($stmt->execute()) {
        echo "Job posted successfully!";
        header("Location: joblistingsuccess.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>
