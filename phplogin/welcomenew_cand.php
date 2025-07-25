<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: sign.php"); // Redirect if not logged in
    exit();
}

$username = $_SESSION['username']; // 🟡 Get the username
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- Header  Section-->
    <header>
      <div id="navbar" class="obj-width">
        <a href="welcomenew_cand.php">
          <img class="logo" src="../images/rec1logo.jpg" alt=""
        /></a>
        <ul id="menu">
          <li><a href="welcomenew_cand.php">Home</a></li>
          <li><a href="../jobs/job.html">Browse Jobs</a></li>
          <li><a href="../contact_cand.html">Contact Us</a></li>
          <a href="../index.html"><button id="w-btn">Logout</button></a>
        </ul>
      </div>
    </header>

    <!-- Hero  Section-->
    <section class="hero">
      <div class="hero-box obj-width">
        <div class="h-left">
            <h1 id="welcome"><?php echo "Welcome, ".htmlspecialchars($username);?>!</h1>
          <h2>
            Find the right job faster with RecruitMate – a smart portal
            connecting job seekers to verified opportunities.
          </h2>
          <p>
            Search by location, role, or skill to land your dream job at the
            right place and time.
          </p>
        </div>
        <div class="h-right">
          <img src="../images/homeimg.jpg" alt="" />
        </div>
      </div>
    </section>
 

    <!-- Job Listing  Section-->
    <section class="jobs sec-space obj-width">
      <h2 id="test">Jobs in demand</h2>
      <p id="jobd">Most viewed and all-time top-searched jobs.</p>
<ul class="job-id">
  <li data-target="all" class="filter-btn active" onclick="showAllJobs()">Recent Jobs</li>

  <li class="filter-btn" onclick="toggleDropdown('rolesDropdown')">Role
    <ul class="dropdown" id="rolesDropdown">
      <li onclick="filterJobs('Web Developer')">Web Developer</li>
      <li onclick="filterJobs('Business Associate')">Business Associate</li>
      <li onclick="filterJobs('Graphic Designer')">Graphic Designer</li>
      <li onclick="filterJobs('Digital Marketing')">Digital Marketing</li>
      <li onclick="filterJobs('Java Developer')">Java Developer</li>
    </ul>
  </li>

   <li class="filter-btn" onclick="toggleDropdown('experienceDropdown')">
          Experience
          <ul class="dropdown" id="experienceDropdown">
            <li onclick="filterJobs('Fresher')">Fresher</li>
            <li onclick="filterJobs('1-2 yr')">1-2 yrs</li>
            <li onclick="filterJobs('2-3 yr')">2-3 yrs</li>
            <li onclick="filterJobs('3+ yrs')">3+ yrs</li>
          </ul>
        </li>
  <li class="filter-btn" onclick="toggleDropdown('locationDropdown')">Location
    <ul class="dropdown" id="locationDropdown">
      <li onclick="filterJobs('Delhi')">Delhi</li>
      <li onclick="filterJobs('Mumbai')">Mumbai</li>
      <li onclick="filterJobs('Hyderabad')">Hyderabad</li>
      <li onclick="filterJobs('Gurgaon')">Gurgaon</li>
    </ul>
  </li>
</ul>
      <div class="jobs-container">
         <li class="jList">
          <img src="../images/google.png" alt="" />
          <h3>Web Developer</h3>
          <p>1-2 yrs</p>
          <span id="key">Bangalore</span>
        </li>

        <li class="jList">
          <img src="../images/uber.png" alt="" />
          <h3>Business Associate</h3>
          <p>Fresher</p>
          <span id="key">Gurgaon</span>
        </li>

        <li class="jList">
          <img src="../images/linkedin.png" alt="" />
          <h3>Graphic Designer</h3>
          <p>2-3 yrs</p>
          <span id="key">Mumbai</span>
        </li>

        <li class="jList">
          <img src="../images/facebook.png" alt="" />
          <h3>Digital Marketing</h3>
          <p>Fresher</p>
          <span id="key">Hyderabad</span>
        </li>
        <li class="jList">
          <img src="../images/yahoo.png" alt="" />
          <h3>Java Developer</h3>
          <p>3+ yrs</p>
          <span id="key">Delhi</span>
        </li>
      </div>
    </section>

   

    <!-- Team  Section-->
    <h2 id="test">Testimonials</h2>
    <div class="cards-container">
      <div class="card">
        <img src="../images/fl-1.png" alt="" />
        <p class="card-title">Sarah</p>
        <p class="card-info">
          "This amazing website helped me get a job within a month!"
        </p>
      </div>

      <div class="card">
        <img src="../images/fl-2.png" alt="" />
        <p class="card-title">Marienne</p>
        <p class="card-info">
          "I was struggling to get a job when I heard about this website through
          a friend! It changed my life!"
        </p>
      </div>

      <div class="card">
        <img src="../images/fl-3.png" alt="" />
        <p class="card-title">David</p>
        <p class="card-info">
          "Was tough finding job roles that aligned with my qualifications and
          interests but now I'm glad I found this website!"
        </p>
      </div>
      <div class="card">
        <img src="../images/fl-4.png" alt="" />
        <p class="card-title">Catherine</p>
        <p class="card-info">
          "Finding a job near my locality really reduced my commute and saved me
          time to be more creative!"
        </p>
      </div>
    </div>

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
      function toggleDropdown(id) {
        const dropdowns = document.querySelectorAll(".dropdown");
        dropdowns.forEach((d) => {
          if (d.id === id) {
            d.style.display = d.style.display === "block" ? "none" : "block";
          } else {
            d.style.display = "none";
          }
        });
      }

      function filterJobs(criteria) {
        const jobs = document.querySelectorAll(".jList");
        jobs.forEach((job) => {
          const text = job.innerText.toLowerCase();
          if (text.includes(criteria.toLowerCase())) {
            job.style.display = "block";
          } else {
            job.style.display = "none";
          }
        });
      }
      function showAllJobs() {
        const jobs = document.querySelectorAll(".jList");
        jobs.forEach((job) => {
          job.style.display = "block";
        });

        // Optional: Close all dropdowns if open
        const dropdowns = document.querySelectorAll(".dropdown");
        dropdowns.forEach((d) => (d.style.display = "none"));

        // Optional: highlight the active tab
        document.querySelectorAll(".filter-btn").forEach((btn) => {
          btn.classList.remove("active");
        });
        event.target.classList.add("active");
      }
    </script>
  </body>
</html>
