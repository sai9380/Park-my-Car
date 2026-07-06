<?php
session_start();

// ✅ If user is not logged in, redirect them to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link href="img/favicon.png" rel="shortcut icon" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

   <!-- Bootstrap CSS File -->
    <!-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Libraries CSS Files -->
    <!-- <link href="lib/animate-css/animate.min.css" rel="stylesheet"> -->

    <!-- Main Stylesheet File -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->




  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Georgia, 'Times New Roman', Times, serif;


}

body{
  display:flex;
  justify-content:space-between;
}

.container {
  display: flex;
}

.sidebar {
  width: 200px;
  height: 100%;
  background: linear-gradient(to right, #1ab394, #006f97);
  position: fixed;
  z-index:1000;
  color: white;
  padding: 16px;
  font-size: 15px;
}

.sidebar a  {
  margin-bottom: 20px;
    text-decoration: none;
      color: white;

}

.sidebar ul {
  list-style: none;
}
.sidebar ul li a{
  list-style-type: none;
  /* background-color:white; */
  text-decoration:none;
  color:white;
}
.sidebar li {
  padding: 14px;
  cursor: pointer;
  transition: background 0.2s;
}

.sidebar li:hover {
  background: #006f97;
  
}

.main-content{
  background:url(./img/b2.jpeg);
  /* width:60rem; */
  height:100%;
  object-fit:cover;
}

 .page {
      /* background: linear-gradient(to right, #f9fbfc, #ffffff); */
    background:transparent;
      padding: 40px ;
      margin: 50px 35px;
      border-radius: 12px;
      max-width: 1000px;
      box-shadow: 1px 4px 9px rgba(255, 255, 255, 0.85);
      backdrop-filter:blur(18px);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: black;
    }

    .page h1 {
      font-size: 2.5rem;
      /* color:rgb(6, 44, 61); */
      color:white;
      margin-bottom: 25px;
      text-align: center;
      position: relative;
    }

    .page h1::after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background-color:rgb(57, 116, 152);
      margin: 10px auto 0;
      border-radius: 2px;
    }

    .page p {
      font-size: 1.1rem;
      line-height: 1.8;
      text-align: justify;
      padding: 0 10px;
      color:white;
    }

    @media screen and (max-width: 768px) {
      .page {
        padding: 40px 20px;
      }

      .page h1 {
        font-size: 2rem;
      }

      .page p {
        font-size: 1rem;
      }
    }


  </style>
 
</head>
<body>  
    
<div class="container">
    <nav class="sidebar">
         <a href="dashboard.php"> <h2>Easy ParkSync</h2></a>

      ---------------------------
      <ul>
        <li onclick="openPage('About Us')"><a href="about.php">ABOUT US</a></li>
        <li onclick="openPage('View Free Slot')"><a href="view.php">VIEW FREE SLOT</a></li>
        <li onclick="openPage('Book Free Slot')"><a href="book.php">BOOK FREE SLOT</a></li>
        <li onclick="openPage('Check Out of Parking Lot')"><a href="verify.php">CHECK OUT OF PARKING LOT</a></li>
        <li onclick="openPage('Parking Fees')"><a href="fee.php">PARKING FEES</a></li>
        <li onclick="openPage('Contact Us')"><a href="contact.php">CONTACT US</a></li>
        <li onclick="openPage('logout')"><a href="logout.php">LOGOUT</a></li>

        <!-- <a href="logout.php"><li>Logout</li></a> -->

      </ul>
    </nav>
</div>
    <main class="main-content">
     <div id="About Us" class="page">
    <h1>About Us</h1>
    <p>
      Ease ParkSync is a visionary project developed by a passionate team of students from Jain College of BBA, BCA, and Commerce, Belagavi. 
      In today’s fast-paced urban environment, parking has become a major challenge, contributing to traffic congestion, wasted time, and inefficiencies. 
      Our mission is to transform traditional parking management by providing an intelligent, automated platform that addresses these issues head-on.
      <br><br>
      Through Ease ParkSync, users can easily locate available parking spaces, reserve them in advance, and make payments securely—all via a user-friendly web interface. 
      Our solution also empowers parking lot administrators with real-time data, analytics, and management tools to maximize space utilization and streamline operations.
      <br><br>
      Built using cutting-edge web technologies like PHP, MySQL, HTML, CSS, and JavaScript, Ease ParkSync offers a modern, scalable, and efficient parking management experience. 
      Our commitment is to enhance urban living by reducing parking-related stress, saving valuable time and fuel, and promoting smarter resource management.
      <br><br>
      With Ease ParkSync, we aim to contribute to the development of smart cities where technology and convenience go hand-in-hand.
     </p>
    </div>
 

   
    </main>
  

  <script src="script.js"></script>
</body>
</html>