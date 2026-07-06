<?php
session_start();
include('config.php');
include('sessioncheck.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $query = "INSERT INTO contact_messages (full_name, email, phone, message)
              VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($con, $query)) {
        $successMessage = "Your message has been saved. We'll get back to you soon!";
    } else {
        $errorMessage = "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        body {
            display: flex;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background: linear-gradient(to right, #1ab394, #006f97);
            position: fixed;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar li {
            padding: 10px 0;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
        }

        .sidebar li:hover {
            background-color: #006f97;
            padding-left: 5px;
        }

        .page {
            margin-left: 220px;
            padding: 40px;
            width: 100%;
        }

        .content {
            background: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 2px 9px 15px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: auto;
        }

        h2 {
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1ab394;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #148f77;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <a href="dashboard.php"><h2>Easy ParkSync</h2></a>
        <hr>
        <ul>
            <li><a href="about.php">About Us</a></li>
            <li><a href="view.php">View Free Slot</a></li>
            <li><a href="book.php">Book Free Slot</a></li>
            <li><a href="verify.php">Check Out of Parking Lot</a></li>
            <li><a href="fee.php">Parking Fees</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Page Content -->
    <div class="page">
        <div class="content">
            <h2>Contact Us</h2>

            <?php if (isset($successMessage)): ?>
                <div class="message success"><?php echo $successMessage; ?></div>
            <?php elseif (isset($errorMessage)): ?>
                <div class="message error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>

            <form method="POST" action="contact.php">
                <label for="name">Full Name *</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email Address *</label>
                <input type="email" name="email" id="email" required>

                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone">

                <label for="message">Your Message *</label>
                <textarea name="message" id="message" rows="5" required></textarea>

                <button type="submit" name="submit">Send Message</button>
            </form>
        </div>
    </div>
</body>
</html>
