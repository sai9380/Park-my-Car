<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link href="img/favicon.png" rel="shortcut icon" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body, html {
      height: 100%;
      width: 100%;
    }

    .container {
      display: flex;
      height: 100vh;
      width: 100vw;
    }

    .sidebar {
      width: 200px;
      background: linear-gradient(to right, #1ab394, #006f97);
      color: white;
      padding: 20px;
    }

    .sidebar a {
      margin-bottom: 20px;
      text-decoration: none;
      color: white;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: white;
    }

    .sidebar li {
      padding: 10px;
      cursor: pointer;
      transition: background 0.2s;
    }

    .sidebar li:hover {
      background: #006f97;
    }

    .main-content {
      flex: 1;
      padding: 20px;
      background: url(./img/b5.jpeg) no-repeat center center;
      background-size: cover;
      height: 100vh;
      overflow: hidden;
    }

    .main-content h1 {
      margin: 30px 0 0 80px;
    }

    .page {
      display: none;
      font: 1em sans-serif;
      font-size: 20px;
    }

    .page.active {
      display: block;
    }

    /* ✅ Responsive Styling */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        height: auto;
      }

      .sidebar {
        width: 100%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .sidebar ul {
        padding: 0;
        width: 100%;
        text-align: center;
      }

      .sidebar li {
        padding: 10px;
      }

      .main-content {
        width: 100%;
        height: auto;
        padding: 20px;
        background-size: cover;
        background-position: center;
      }

      .main-content h1 {
        margin: 80px 0 0 0;
        font-size: 24px;
        text-align: center;
      }
    }

    @media (max-width: 480px) {
      .main-content h1 {
        font-size: 20px;
        margin-top: 60px;
      }
    }
  </style>
</head>

<body>  
<div class="container">
  <nav class="sidebar">
    <a href="dashboard.php"><h2>Easy ParkSync</h2></a>
    ------------------------------
    <ul>
      <li><a href="about.php">ABOUT US</a></li>
      <li><a href="view.php">VIEW FREE SLOT</a></li>
      <li><a href="book.php">BOOK FREE SLOT</a></li>
      <li><a href="verify.php">CHECK OUT OF PARKING LOT</a></li>
      <li><a href="fee.php">PARKING FEES</a></li>
      <li><a href="contact.php">CONTACT US</a></li>
      <li><a href="logout.php">LOGOUT</a></li>
    </ul>
  </nav>

  <main class="main-content">
    <div id="dashboard" class="page active">
      <h1>Dashboard</h1>
    </div>
    <div id="pages" class="page">
      <h1>Pages</h1>
    </div>
  </main>
</div>

<script src="script.js"></script>
</body>
</html>
