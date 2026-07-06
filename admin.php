<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    
    if ($email == "admin" && $pwd == "admin") {
        $_SESSION['email'] = $email; 
        header("Location: admin-dashboard.php"); 
        exit();
    } else {
        echo "<script>alert('Incorrect password. Please try again.'); window.location.href = 'adminindex.html';</script>";
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Easy ParkSync Login</title>
  <link href="img/favicon.png" rel="shortcut icon" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #e3e8ef;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-container {
      display: flex;
      width: 900px;
      height: 500px;
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .login-left {
      width: 45%;
      padding: 60px 40px;
    }

    .logo {
      font-size: 24px;
      font-weight: 600;
      color: #002244;
      margin-bottom: 40px;
    }

    h2 {
      font-size: 28px;
      margin-bottom: 30px;
      color: #002244;
    }

    h2 span {
      color: #1ab394;
    }

    .form-group {
      margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .form-bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
      margin-bottom: 20px;
    }
    .form-bottom b{
      display: flex;
      justify-content:space-around;
      align-items: center;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .form-bottom label {
      display: flex;
      align-items: center;
    }

    .form-bottom input[type="checkbox"] {
      margin-right: 8px;
    }

    .form-bottom a {
      text-decoration: none;
      color: #1ab394;
    }

    

    button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(to right, #1ab394, #006f97);
      border: none;
      color: white;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .login-right {
      width: 50%;
      background: #f5f5f5;
    }

    .login-right img {
      width: 100%;
      height: 100%;
      
      object-fit:cover;
    }

  </style>
</head>
<body>

<div class="login-container">
  <div class="login-left">
    <div class="logo">🅿 Easy ParkSync</div>
    <h2>Administrators <span>Email &<br>Password</span></h2>
<form method="POST">
    <div class="form-group">
      <input type="text" placeholder="Name" name="email">
    </div>

    <div class="form-group">
      <input type="password" placeholder="password" name="password">
    </div>

    <!-- <div class="form-bottom">
      <label><input type="checkbox" checked> Keep me logged in</label>
      <a href="#">Forgot Password?</a>
    </div> -->

    <button name="submit">Login</button>

  </div>
</form>
  <div class="login-right">
    <img src="login_img.png" alt="login_img">
  </div>
</div>

</body>
</html>