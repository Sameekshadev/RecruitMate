<?php


session_start();

include("connection.php");



if (isset($_POST['submit'])) {

    $username = $_POST['user'];

    $password = $_POST['pass'];

    $user_type = $_POST['user_type']; 

   if ($user_type == "recruiter") {

        $table = "recruit_login";

    } else {

        echo "<script>alert('Invalid user type selected!'); window.location.href='index.php';</script>";

        exit();

    }

    $stmt = $conn->prepare("SELECT * FROM $table WHERE username = ? AND password = ?");

    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows==1){
        $_SESSION['username'] = $username; // 🌟 Store username
         if($user_type == "recruiter"){
            header("Location:../joblisting.html");
         }
        

        exit();

    } else {

        echo '<script>

            alert("Login failed. Invalid username or password!");

            window.location.href="../joblisting.php";

        </script>';
}

}
    
?>


