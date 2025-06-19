<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

require 'connection.php'; // Your DB connection

$status = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['resume'])) {
    $resume = $_FILES['resume'];
    $tmp_name = $resume['tmp_name'];
    $filename = basename($resume['name']);

    $job_id = $_POST['job_id'];

    // ✅ Step 1: Get recruiter email and job title from DB
    $sql = "SELECT recruiter_email, title FROM jobs WHERE job_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $stmt->bind_result($recruiter_email, $jobTitle);
    $stmt->fetch();
    $stmt->close();

    if (!$recruiter_email) {
        die("Recruiter email not found for the given job.");
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sameekshadevulapally13@gmail.com';  // Your Gmail
        $mail->Password   = 'fzjqbfniydgzyvhz';                   // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($mail->Username, 'RecruitMate Resume Submission');
        $mail->addAddress($recruiter_email); // ✅ Recruiter's email

        // ✅ Attachment
        $mail->addAttachment($tmp_name, $filename);

        // ✅ Email content
        $mail->isHTML(true);
        $mail->Subject = "New Resume for '$jobTitle'";
        $mail->Body    = "A candidate has applied for the position of <strong>$jobTitle</strong>.<br><br>Please find the resume attached.";

        $mail->send();

        // ✅ Redirect on success
        header("Location:applysuccess.php");
        exit();

    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
