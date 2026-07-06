

<?php
// include('config.php');

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $aadhar = $_POST['aadhar'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $repasswrd = $_POST['repass'];
  $conn = new mysqli('localhost', 'root', '', 'carparkingsystem');
  $sql = "INSERT INTO user (name, email, address, aadhar,contact,password) VALUES ('$name', '$email', '$address','$aadhar','$contact','$password')";
  if ($conn->query($sql)) {
    echo "<script>alert('Signup successful'); window.location='login.php';</script>";
  }else{
        echo "<script>alert('Error signing up');</script>";
    }
} 
    ?>