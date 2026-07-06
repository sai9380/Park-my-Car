<?php
session_start();
include('config.php');
include('sessioncheck.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Free Lots</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">

  
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/animate-css/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="css/main.css">

    <style type="text/css">
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


        table{
            border: 1px solid #1a1a1a;
            width: 100%;
            text-align: center;
        }
        td{
            height: 250px;
        }
        a{
            color: skyblue;
        }
        .dash{
            padding-top: 20px;
            padding-right: 23px;
            padding-left: 23px;
            padding-bottom: 17px;

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
<!-- #header -->

<div class="limiter">
    <div class="container-login100" style="background-image: url('img/back.png');">
        <div class="wrap-login100 dash" style="width: 75%;">
        <span class="login100-form-title p-b-53">
            Current Status
          </span>
            <table rules="all">
                <tr>
                    <?php
$qry = mysqli_query($con,"SELECT * FROM lot");
$lots = [];
while($row = mysqli_fetch_array($qry)) {
    $lots[] = $row;
}

$total = count($lots);
$half = ceil($total / 2);

// First row
echo "<tr>";
for ($i = 0; $i < $half; $i++) {
    $row = $lots[$i];
    if ($row['status'] == 'Free') {
        echo "<td><span><a href='book.php'>Book Now<br>Parking Lot - {$row['lotname']}</a></span></td>";
    } elseif ($row['status'] == 'Leaving') {
        echo "<td style='background: #1a1a1a;'><span><a href='book.php'>Leaving Soon<br>Parking Lot - {$row['lotname']}</a></span></td>";
    } else {
        echo "<td style='background: #1a1a1a;'><span><a href='#'>Booked<br>Parking Lot - {$row['lotname']}</a></span></td>";
    }
}
echo "</tr>";

// Second row
echo "<tr>";
for ($i = $half; $i < $total; $i++) {
    $row = $lots[$i];
    if ($row['status'] == 'Free') {
        echo "<td><span><a href='book.php'>Book Now<br>Parking Lot - {$row['lotname']}</a></span></td>";
    } elseif ($row['status'] == 'Leaving') {
        echo "<td style='background: #1a1a1a;'><span><a href='book.php'>Leaving Soon<br>Parking Lot - {$row['lotname']}</a></span></td>";
    } else {
        echo "<td style='background: #1a1a1a;'><span><a href='#'>Booked<br>Parking Lot - {$row['lotname']}</a></span></td>";
    }
}
echo "</tr>";
?>

                </tr>
            </table>
        </div>
    </div>
</div>




<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Required JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/morphext/morphext.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/stickyjs/sticky.js"></script>
<script src="lib/easing/easing.js"></script>

<!-- Template Specisifc Custom Javascript File -->
<script src="js/custom.js"></script>

<script src="contactform/contactform.js"></script>


</body>

</html>
