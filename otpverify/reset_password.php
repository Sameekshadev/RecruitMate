<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RecruitMate-Smart Hiring, Simplified!</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="icon" href="../images/actuallogo.jpg" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
<body>
    <header>
      <div id="navbar" class="obj-width">
        <a href="../index.html">
          <img class="logo" src="../images/rec1logo.jpg" alt=""
        /></a>
        <ul id="menu">
          <li><a href="../index.html">Home</a></li>
          <li><a href="../contact.html">Contact Us</a></li>
          <li><a href="../aboutus.html">About Us</a></li>
          <a href="../phplogin/signup.php"><button id="w-btn">Sign Up</button></a>
        </ul>
      </div>
    </header>
     <section class="contact obj-width sec-space extra-space">
      <div class="contact-img">
        <img id="contact" src="../images/contactimg.png" alt="" />
      </div>
    <form method="POST" action="update_password.php">
        <h2>Reset Your Password</h2>
        <input type="password" name="new_password" required placeholder="New Password">
        <input type="password" name="confirm_password" required placeholder="Confirm Password">
        <button id="g-btn" type="submit">Update Password</button>
</section>
    </form>
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
</body>
</html>
