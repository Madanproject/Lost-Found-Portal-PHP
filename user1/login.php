<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,FullName from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['lfsuid']=$ret['ID'];
       $_SESSION['fname']=$ret['FullName'];
     header('location:../index.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <title>Lost and Found System-Login Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">

        

     

        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/icon/icon-plane.png" alt="avatar" style="padding:10%">
                </div>
                <div class="col-lg-6 p-t-100">
                    <div class="text-white">
                        <h1> User | Welcome Back</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Hey Buddies Welcome back to Lost and Found System!</p>
                    </div>
                   <form method="post" action="">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
                                          <input class="form-control form-control-lg no-b" type="text" id="email" name="emailcont" required="true" placeholder="Registered Email or Contact Number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" name="password" required="true" class="form-control form-control-lg no-b"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-success btn-lg btn-block" name="login" value="Let me enter">
                                <p class="forget-pass text-white"><a href="forgot-password.php"> Have you forgot your password ?</a><a href="signup.php" style="padding-left: 250px"> Sign Up!!</a></p>
                                <p class="forget-pass text-white"><a href="../index.php"> Back to Home!!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>