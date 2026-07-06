<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qry = mysqli_query($con, "SELECT * FROM logtable WHERE id = $id");
    $data = mysqli_fetch_assoc($qry);

    if (!$data) {
        echo "<script>alert('Record not found'); window.location.href='admin-dashboard.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='admin-dashboard.php';</script>";
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
        echo "<script>alert('Log updated successfully'); window.location.href='admin-dashboard.php';</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Log</title>
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #444444;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Log Record</h2>
    <form method="post">
        <label>User UID:</label>
        <input type="text" name="useruid" value="<?php echo $data['useruid']; ?>" required>

        <label>Car No.:</label>
        <input type="text" name="carno" value="<?php echo $data['carno']; ?>" required>

        <label>Lot Name:</label>
        <input type="text" name="lotname" value="<?php echo $data['lotname']; ?>" required>

        <label>From Time:</label>
        <input type="text" name="fromtime" value="<?php echo $data['fromtime']; ?>" required>

        <label>To Time:</label>
        <input type="text" name="totime" value="<?php echo $data['totime']; ?>" required>

        <label>Status:</label>
        <input type="text" name="status" value="<?php echo $data['status']; ?>" required>

        <input type="submit" name="update" value="Update Log">
    </form>
</div>
</body>
</html>

