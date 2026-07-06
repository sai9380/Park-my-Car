<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current data
    $query = "SELECT * FROM lot WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $lotname = $row['lotname'];
        $status = $row['status'];
    } else {
        echo "Lot not found.";
        exit;
    }
}

if (isset($_POST['update'])) {
    $lotname = $_POST['lotname'];
    $status = $_POST['status'];

    $update_query = "UPDATE lot SET lotname='$lotname', status='$status' WHERE id=$id";
    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Lot updated successfully'); window.location.href='admin-dashboard.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Lot</title>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        .container { 
            margin-top: 100px; 
            width: 500px;
            height: 280px; 
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Lot</h2>
    <form method="post">
        <div class="form-group">
            <label>Lot Name:</label>
            <input type="text" name="lotname" class="form-control" value="<?php echo htmlspecialchars($lotname); ?>" required>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="Free" <?php if ($status == "Free") echo "selected"; ?>>Free</option>
                <option value="Occupied" <?php if ($status == "Occupied") echo "selected"; ?>>Occupied</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="admin-dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
