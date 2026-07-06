<?php
session_start();
include('config.php');
// include('sessioncheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/util.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dash {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
        }
        .btn {
            margin: 5px;
        }
        .modal-content {
            color: black;
        }
        .section-container {
            display: none;
        }
    </style>
</head>

<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('img/carbgdash.jpg');">
        <div class="wrap-login100 dash" style="width: 85%;">
            <span class="login100-form-title p-b-20">Admin Dashboard</span>

            <!-- Toggle Buttons -->
            <div class="mb-4">
                <button class="btn btn-primary" onclick="showSection('addLotSection')">+ Add New Lot</button>
                <button class="btn btn-success" onclick="showSection('lotStatusSection')">Current Lot Status</button>
                <button class="btn btn-warning" onclick="showSection('logTableSection')">Log Table</button>
                <a href='adminlogout.php'><button class="btn btn-warning">Logout</button></a>
            </div>

            <!-- Add Lot Modal Trigger -->
            <div id="addLotSection" class="section-container">
                <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addLotModal">+ Add New Lot</button>
            </div>

            <!-- Current Lot Status Table -->
            <div id="lotStatusSection" class="section-container">
                <h5 class="mb-3">Current Lot Status</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Lot Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $qry = mysqli_query($con, "SELECT * FROM lot");
                    while ($row = mysqli_fetch_array($qry)) {
                    ?>
                        <tr>
                            <td><?php echo $row['lotname']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="edit_lot.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="delete_lot.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this lot?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Log Table Section -->
            <div id="logTableSection" class="section-container">
                <h5 class="mb-3">Log Table</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>User UID</th>
                            <th>Car No.</th>
                            <th>Lot Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $qry1 = mysqli_query($con, "SELECT * FROM logtable");
                    while ($row1 = mysqli_fetch_array($qry1)) {
                    ?>
                        <tr>
                            <td><?php echo $row1['useruid']; ?></td>
                            <td><?php echo $row1['carno']; ?></td>
                            <td><?php echo $row1['lotname']; ?></td>
                            <td><?php echo $row1['fromtime']; ?></td>
                            <td><?php echo $row1['totime']; ?></td>
                            <td><?php echo $row1['status']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="edit_log.php?id=<?php echo $row1['id']; ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="delete_log.php?id=<?php echo $row1['id']; ?>" onclick="return confirm('Are you sure you want to delete this log?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Lot Modal -->
<div class="modal fade" id="addLotModal" tabindex="-1" aria-labelledby="addLotLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <form method="post" action="add_lot.php">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Lot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="lotname" class="form-label">Lot Name</label>
                        <input type="text" class="form-control" name="lotname" id="lotname" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="Free">Free</option>
                            <option value="Occupied">Occupied</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Lot</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<!-- Scripts -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll('.section-container');
        sections.forEach(sec => sec.style.display = 'none');

        // Show selected section
        document.getElementById(sectionId).style.display = 'block';
    }
</script>

</body>
</html>
