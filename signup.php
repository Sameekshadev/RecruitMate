<?php
session_start();
   include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <a href="index.php"><button id="w-btn">Login</button></a>
        </ul>
      </div>
    </header>
    <div class="contact obj-width sec-space extra-space" id="form">
        <div>
              <img id="contact" src="../images/contactimg.png" alt=""></div>

    <form class="contact-form" name="form" action="sign.php" method="POST">
           <h2>SIGN UP</h2>
          <select id="join" name="user_type" required> 
        <option value="candidate">Candidate</option>
        <option value="recruiter">Recruiter</option>
      </select><br>
      <label>Username:</label>
      <input type="text" id="user" name="user" required />
       <label>First Name:</label>
      <input type="text" name="fname" required />
      <label>Last Name:</label>
      <input type="text" name="lname" required />
      <label>Email:</label>
      <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@gmail\.com"title="Only Gmail addresses allowed" required />
      <label>Mobile No:</label>
      <input type="tel" name="mobile"/>
      <label>Password:</label>
      <input type="password" id="pass" name="pass"   required />
  
      <button type="submit" id="g-btn" value="signup" name="submit"> Sign Up</button>
</div>
    </form>

     <!-- Footer  Section-->
      <footer class="footer">
      <div class="obj-width">
        <div class="top">
          <div>
            <img class="logo" src="../images/rec1logo.jpg" alt="" />
          </div>
          <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
          </div>
          <ul class="bottom" id="menu">
          <li><a href="../FAQs.html">FAQs</a></li>
          <li><a href="../terms.html">Terms & Conditions</a></li>
          <li><a href="../aboutus.html">About Us</a></li>
        </ul>
        </div>
        <p>&copy; 2025 RecruitMate. All rights reserved.</p>
        </div>
      </div>
    </footer>
    <script src="../script.js"></script>
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