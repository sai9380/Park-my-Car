<?php
// Enable error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
include('config.php');
// \end{code}NHH

// Check for email and password input
// if (!isset($_POST['mail']) || !isset($_POST['pass'])) {
//     echo "<script>alert('Email and Password are required!'); window.location.href = 'index.php';</script>";
//     exit();
// }

$email = $_POST['mail'];
$pwd = $_POST['pass'];
// die($email .''. $pwd);
// Check Database Connection
if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Prepare and execute query
// $qry = mysqli_prepare($con, "SELECT email, password FROM user WHERE email=?");
// if (!$qry) {
//     die("SQL Error: " . mysqli_stmt_error($qry));
// }

// mysqli_stmt_bind_param($qry, "s", $email);
// mysqli_stmt_execute($qry);
// $result = mysqli_stmt_get_result($qry);



$sql="select * from user where email='$email' and password='$pwd'";
        $result=  mysqli_query($con,$sql);
        
        if($result>0)
            {
            $row=mysqli_fetch_assoc($result);
            
            if($row['email']==$email && $row['password']==$pwd)
            {
                $_SESSION['id']=$email;
                
                header("location:dashboard.php");
                                
            }
            else
                {
                    die("here");
                    // header("location:userlogin.php?ans=failed");
                    // echo "<script>alert('Incorrect password. Please try again.'); window.location.href = 'index.php';</script>";
                    // exit();
                }
             }
        
        else{

            die("there");
            // header("location:userlogin.php?ans=failed");
            // echo "<script>alert('No user found with this email. Please sign up.'); window.location.href = 'index.php';</script>";
            // exit();
        }

// if (!$result) {
//     die("Error fetching results: " . mysqli_error($con));
// }

// $user = mysqli_fetch_assoc($result);

// // Validate password using password_verify()
// if ($user) {
//     if (password_verify($pwd, $user['password'])) {
//         $_SESSION['log'] = $user;
//         $_SESSION['log1'] = "user";
//         header("location:dashboard.php");
//         exit();
//     } else {
//         echo "<script>alert('Incorrect password. Please try again.'); window.location.href = 'index.php';</script>";
//         exit();
//     }
// } elseif ($email === "admin@mail.com" && $pwd === "123456") {
//     $_SESSION['log'] = "admin";
//     $_SESSION['log1'] = "admin";
//     header("location:admin.php");
//     exit();
// } else {
//     echo "<script>alert('No user found with this email. Please sign up.'); window.location.href = 'index.php';</script>";
//     exit();
// }
?>
