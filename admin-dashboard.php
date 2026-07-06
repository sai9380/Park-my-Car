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

    <link href="img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/util.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
  margin-left:0px;
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
  /* margin-bottom: 20px; */
}

.sidebar ul {
  list-style: none;
  margin-left:-30px;
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

.log a{
  margin-top:-10rem;
  cursor: pointer;
  font-family: Arial, sans-serif;
  font-size:17px;
}

.sidebar li:hover {
  /* background:rgb(2, 22, 30); */
  background: #006f97;

  
}
        .dash-box {
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
           

<div class="sidebar">
   <a href="dashboard.php"> <h2>Easy ParkSync</h2></a>

      ------------------------------
      <ul>
                <li  onclick="showSection('addLotSection')">ADD NEW LOT</li>
                   <div id="addLotSection" class="section-container"> 
                <button class=" mb-3" data-bs-toggle="modal" id="btn" data-bs-target="#addLotModal" style="margin-left:20px; color:rgb(2, 22, 30);">+ ADD NEW LOT</button>
            </div>

                <li  onclick="showSection('lotStatusSection')">CUREENT LOT STATUS</li>
                <li  onclick="showSection('logTableSection')">LOG TABLE</li><br>
                 <li onclick="showSection('viewMessagesSection')">VIEW MESSAGES</li>
                <li class="log"> <a  href='index.php'>LOGOUT</a></li>
                </ul>
              
            </div>

<div class="limiter">
    <div class="container-login100" style="background-image: url('img/b5.jpeg');">
        <div class=" dash-box" style="width: 85%; margin-left:13rem;">
            <span class="login100-form-title p-b-20">Admin Dashboard</span>

            <!-- Toggle Buttons -->
            
            <!-- Add Lot Modal Trigger -->
           
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
            <!-- this message view delete -->
            <div id="viewMessagesSection" class="section-container">
                <h5 class="mb-3">User Messages</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $msg_qry = mysqli_query($con, "SELECT * FROM contact_messages ORDER BY id DESC");
                    while ($msg = mysqli_fetch_array($msg_qry)) {
                    ?>
                        <tr>
                            <td><?php echo $msg['full_name']; ?></td>
                            <td><?php echo $msg['email']; ?></td>
                            <td><?php echo $msg['phone']; ?></td>
                            <td><?php echo $msg['message']; ?></td>
                            <!-- <td>
                                <a class="btn btn-sm btn-danger" href="delete_message.php?id=<?php echo $msg['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                            </td>  -->
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
