<?php
session_start();
include('config.php');

$email = $_POST['mail'];
$pwd = $_POST['pass'];
//  die($email .''. $pwd);

$qry = mysqli_prepare($con, "SELECT email, password FROM user WHERE email=?");
mysqli_stmt_bind_param($qry, "s", $email);
mysqli_stmt_execute($qry);
$res = mysqli_stmt_get_result($qry);
$user = mysqli_fetch_assoc($res);

$sql="select * from user where email='$email' and password='$pwd'";
        $result=  mysqli_query($con,$sql);
        
        if($result>0)
            {
            $row=mysqli_fetch_assoc($result);
            
            if($row['email']==$email && $row['password']==$pwd)
            {
                $_SESSION['log']=$email;
                $_SESSION['log'] = $user;
                $_SESSION['log1'] = "user";
                $_SESSION['useruid']=$row['useruid'];
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

?>
