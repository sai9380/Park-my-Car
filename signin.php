<?php
session_start();
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $conn = new mysqli('localhost', 'root', '', 'carparkingsystem');
  $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);
//   $result=  mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    $_SESSION['user'] = $email;
    header('Location: dashboard.php');
    exit(); // ✅ Always use exit() after header
  } else {
    echo "<script>
            alert('Invalid credentials');
            window.location.href = 'login.php';
          </script>";
    exit();
  }
}
?>