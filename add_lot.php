<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lotname = $_POST['lotname'];
    $status = $_POST['status'];

    $insert = mysqli_query($con, "INSERT INTO lot (lotname, status) VALUES ('$lotname', '$status')");

    if ($insert) {
        echo "<script>alert('Lot added successfully'); window.location.href='admin-dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to add lot'); window.location.href='admin-dashboard.php';</script>";
    }
}
?>
