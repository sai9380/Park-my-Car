<?php
session_start();
include('config.php');

// Validate input data
if (!isset($_POST['car']) || !isset($_POST['lot']) || !isset($_SESSION['log'])) {
    die("Invalid access.");
}

$car = mysqli_real_escape_string($con, $_POST['car']);
$lot = mysqli_real_escape_string($con, $_POST['lot']);
$uid = mysqli_real_escape_string($con, $_SESSION['useruid']);

// Generate dummy OTPs
$otp1 = mt_rand(100000, 999999);
$otp2 = mt_rand(100000, 999999);

// Insert into logtable and update lot status
$qry = mysqli_query($con, "INSERT INTO logtable (useruid, lotname, carno, otp1, fromtime, otp2) VALUES ('$uid', '$lot', '$car', '$otp1', NOW(), '$otp2')");
$qry1 = mysqli_query($con, "UPDATE lot SET status='Ongoing Booking' WHERE lotname='$lot'");

if ($qry && $qry1) {
    header("location:verify.php");
} else {
    echo "Error in booking. Please try again.";
}
?>
