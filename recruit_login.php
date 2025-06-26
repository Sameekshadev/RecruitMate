<?php
   include("connection.php");
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecruitMate-Smart Hiring, Simplified!</title>
    <link rel="icon" href="../images/actuallogo.jpg" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
     <!-- Header  Section-->
    <header>
      <div id="navbar" class="obj-width">
        <a href="../index.html">
          <img class="logo" src="../images/rec1logo.jpg" alt=""
        /></a>
        <ul id="menu">
          <li><a href="../index.html">Home</a></li>
        
          <li><a href="../contact.html">Contact Us</a></li>
          <li><a href="../aboutus.html">About Us</a></li>
          <a href="signup.php"><button id="w-btn">Sign Up</button></a>
          
        </ul>
      </div>
    </header>
    <div class="contact obj-width sec-space extra-space" id="form">
        <div>
    <img id="contact" src="../images/contactimg.png" alt=""></div>
        

        <form class="contact-form" name="form" action="rlogin.php" onsubmit="return isvalid()" method="POST">
    <h1>LOGIN AS</h1>	

    <input type="hidden" name="user_type" value="recruiter">
            <button id="join">Recruiter</button><br>

    <label>Username</label>
    <input type="text" id="user" name="user" required><br>

    <label>Password</label>
    <input type="password" id="pass" name="pass" required><br>

    <input type="submit" id="g-btn" value="Login" name="submit">
</form>
    </div>
     <!-- Footer  Section-->
    <footer class="footer">
      <div class="obj-width">
        <div class="top">
          <div>
            <img class="logo" src="images/rec1logo.jpg" alt="" />
          </div>
          <ul id="menu" class="bottom">
          <li><a href="FAQs.html">FAQs</a></li>
          <li><a href="terms.html">Terms & Conditions</a></li>
          <li><a href="aboutus.html">About Us</a></li>
          
        </ul>
        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
           
            <i class="fa-brands fa-instagram"></i>
            
           <i class="fa-brands fa-twitter"></i>
          
           <i class="fa-brands fa-linkedin"></i>
          
          </div>
        </div>
        <p>&copy; 2025 RecruitMate. All rights reserved.</p>
        
        
      </div>
    </footer>
    <script src="script.js"></script>
    <script src="toggle.js"></script>
    <script>
        function isvalid(){
            var user=document.form.user.value;
            var pass=document.form.pass.value;
            if(user.length==""&& pass.length==""){
                alert("Please fill these fields!!!");
                return false
            }
            else{
                if(user.length==""){
                alert("Please fill the username!!");
                return false
            }
            else{
                if(pass.length==""){
                alert("Please fill the password!!");
                return false
            }
            }

            }
        }

    </script>
</body>
</html>