<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the deletion
    $query = "DELETE FROM lot WHERE id = $id";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Lot deleted successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error deleting lot: " . mysqli_error($con) . "'); window.location.href='admin.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='admin.php';</script>";
}
?>
