<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qry = mysqli_query($con, "SELECT * FROM logtable WHERE id = $id");
    $data = mysqli_fetch_assoc($qry);

    if (!$data) {
        echo "<script>alert('Record not found'); window.location.href='admin.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='admin.php';</script>";
    exit;
}

if (isset($_POST['update'])) {
    $useruid = $_POST['useruid'];
    $carno = $_POST['carno'];
    $lotname = $_POST['lotname'];
    $fromtime = $_POST['fromtime'];
    $totime = $_POST['totime'];
    $status = $_POST['status'];

    $update = mysqli_query($con, "UPDATE logtable SET useruid='$useruid', carno='$carno', lotname='$lotname', fromtime='$fromtime', totime='$totime', status='$status' WHERE id=$id");

    if ($update) {
        echo "<script>alert('Log updated successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Log</title>
</head>
<body>
<h2>Edit Log Record</h2>
<form method="post">
    User UID: <input type="text" name="useruid" value="<?php echo $data['useruid']; ?>" required><br><br>
    Car No.: <input type="text" name="carno" value="<?php echo $data['carno']; ?>" required><br><br>
    Lot Name: <input type="text" name="lotname" value="<?php echo $data['lotname']; ?>" required><br><br>
    From Time: <input type="text" name="fromtime" value="<?php echo $data['fromtime']; ?>" required><br><br>
    To Time: <input type="text" name="totime" value="<?php echo $data['totime']; ?>" required><br><br>
    Status: <input type="text" name="status" value="<?php echo $data['status']; ?>" required><br><br>
    <input type="submit" name="update" value="Update Log">
</form>
</body>
</html>
