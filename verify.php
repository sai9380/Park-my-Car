<?php
session_start();
include('config.php');
include('sessioncheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Verification</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate-css/animate.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/util.css">
    <style>
            * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;

}


      body{
 
  display:flex;
  justify-content:space-between;
}

.container {
  width: 150px;
  margin-left:-20px;
}

.sidebar {
  width: 200px;
  height: 100%;
  background: linear-gradient(to right, #1ab394, #006f97);
  position: fixed;
  z-index:1000;
  color: white;
  padding: 20px;
}

nav{
  margin:0;

}
.sidebar a {
     text-decoration: none;
      color: white;
  margin-bottom: 20px;
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
  padding: 10px;
  cursor: pointer;
  transition: background 0.2s;
}

.sidebar li:hover {
  background: #006f97;
  
}

.log p{
  font-size:20px;
  margin-bottom:29px;
  font-weight:600;

}

    </style>
</head>

<body>
<div id="preloader"></div>

<div class="container">
    <nav class="sidebar">
         <a href="dashboard.php"> <h2>Easy ParkSync</h2></a>

      ------------------------------
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
<div class="limiter">
    <div class=" log container-login100" style="background-image: url('img/back.png');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <?php

            $uid = $_SESSION['useruid']='useruid';
            $qry = mysqli_query($con, "SELECT * FROM logtable WHERE useruid='$uid' ORDER BY id DESC");
            $row = mysqli_fetch_array($qry);
            
         
           if ($row) {
    if ($row['status'] != 'Park') {
        $id = $row['id'];
        mysqli_query($con, "UPDATE logtable SET status='Park', totime=NOW() WHERE id='$id'");
        echo '<p>Parking confirmed successfully.</p>';
    } else {
        mysqli_query($con, "UPDATE logtable SET status='Left' WHERE useruid='$uid'");
        echo '<p>You have successfully left the parking lot.</p>';
    }
} else {
    echo "<p>No parking record found for this user.</p>";
}

            ?>
        </div>
    </div>
</div>



<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JS Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/stickyjs/sticky.js"></script>
<script src="lib/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html