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
</head>

<body>
<div id="preloader"></div>
<?php include('header.php'); ?>

<div class="limiter">
    <div class="container-login100" style="background-image: url('img/security.jpeg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <?php
            $uid = $_SESSION['useruid'];
            $qry = mysqli_query($con, "SELECT * FROM logtable WHERE useruid='$uid' ORDER BY id DESC");
            $row = mysqli_fetch_array($qry);
            
            // Direct bypass without OTP verification
            if ($row['status'] != 'Park') {
                $id=$row['id'];
                // mysqli_query($con, "UPDATE logtable SET status='Park' WHERE useruid='$uid'");
                mysqli_query($con, "UPDATE logtable SET status='Park', totime=NOW() WHERE id='$id'");
                echo '<p>Parking confirmed successfully.</p>';
            } else {
                mysqli_query($con, "UPDATE logtable SET status='Left' WHERE useruid='$uid'");
                echo '<p>You have successfully left the parking lot.</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

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