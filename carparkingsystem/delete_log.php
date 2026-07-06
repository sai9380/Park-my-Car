<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM logtable WHERE id = $id";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Log deleted successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error deleting log: " . mysqli_error($con) . "'); window.location.href='admin.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='admin.php';</script>";
}
?>
