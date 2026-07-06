<?php
session_start();
include('config.php');

$email = $_POST['mail'];
$pwd = $_POST['pass'];
//  die($email .''. $pwd);

            if($email=="admin" && $pwd=="admin")
            {
                $_SESSION['log']=$email;
                $_SESSION['log'] = $user;
                $_SESSION['log1'] = "user";
                $_SESSION['useruid']=$row['useruid'];
                header("location:admin.php");
                                
            }
            else
                {
                    // die("here");
                    // header("location:userlogin.php?ans=failed");
                     echo "<script>alert('Incorrect password. Please try again.'); window.location.href = 'adminindex.html';</script>";
                     exit();
                }
             
        
        

?>
