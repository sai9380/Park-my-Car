<?php
session_start();
include('config.php');
include('sessioncheck.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fees</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   

    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
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
    <div class="container-login100" style="background-image: url('img/b1.jpeg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <?php
            $uid =$_SESSION['useruid'];
            $qry = mysqli_query($con,"SELECT * FROM logtable WHERE useruid='$uid' ORDER BY id DESC");
            $qry1 = mysqli_num_rows($qry);
            if($qry1)
            {
                $row = mysqli_fetch_array($qry);
                if($row['status']=='Left' and $row['payment']=='')
                {
                    ?>
                    <form class="login100-form validate-form flex-sb flex-w" method="post" action="payment.php">
          <span class="login100-form-title p-b-53">
            Fee Generated
          </span>

                        <?php
                        date_default_timezone_set('Asia/Kolkata');

                        $from1 = $row['fromtime'];
                        $from = date("H:i:s", strtotime($from1));
                        $to = date("H:i:s");
                        $id = $row['id'];
                        $t1 = StrToTime ( $from );
                        $t2 = StrToTime ( $to );
                        $diff = $t2 - $t1;
                        $hours = $diff / ( 60 * 60 );
                        $fee = 300*$hours;
                        $fee = round($fee, 0, PHP_ROUND_HALF_UP);

                        
                        $q="UPDATE `logtable` SET `totime` = NOW() WHERE `logtable`.`id` = '$id';";
                        mysqli_query($con,$q);
                        
                        ?>

                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="fee" value="<?php echo $fee; ?>" readonly/>
                            <!-- From <input class="input100" type="text" name="fee" value="<?php echo $from; ?>" readonly/>
                            To <input class="input100" type="text" name="fee" value="<?php echo $to; ?>" readonly/> -->
                            <span class="focus-input100"></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn">
                                Pay
                            </button>
                        </div>

                    </form>
                    <?php
                }
                else
                {
                    ?>
                    <form class="login100-form validate-form flex-sb flex-w" method="post" action="payment.php">
          <span class="login100-form-title p-b-53">
            Car Still Parked!<br>
          </span>

                    </form>
                    <?php
                }
            }
            else
            {
                ?>
                <form class="login100-form validate-form flex-sb flex-w" method="post" action="payment.php">
          <span class="login100-form-title p-b-53">
            Car Still Parked!
          </span>

                </form>
                <?php
            }
            ?>
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
