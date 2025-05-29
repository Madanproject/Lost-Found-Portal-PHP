<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lfsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['lfsuid'];
    $fullname=$_POST['fullname'];
    $mobno=$_POST['mobilenumber'];

    
  
     $query=mysqli_query($con, "update tbluser set FullName='$fullname',MobileNumber='$mobno' where ID='$uid'");
    if ($query) {
       echo "<script>alert('Your profile has been updated.');</script>";
  }else{
          echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Lost and Found System-User Profile</title>
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
<?php include_once('includes/sidebar.php');?>
<!--Sidebar End-->
<?php include_once('includes/header.php');?>
    <div class="page has-sidebar-left">


    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                       <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        User Profile
                    </h4>
                </div>
            </div>
        </div>
    </header>
                        <div class="card-body b-b">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
$uid=$_SESSION['lfsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php  echo $row['FullName'];?>" required='true'>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="col-form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" value="<?php  echo $row['Email'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Mobile Number</label>
                                    <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" value="<?php  echo $row['MobileNumber'];?>" required='true'>
                                </div>
                               
                                
                                
            
                                
                                
                                
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Registration Date</label>
                                    <input type="text" id="" name="" class="form-control" value="<?php  echo $row['UserRegdate'];?>"  readonly='true'>
                                </div>
                               <?php } ?>
                               
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                
                    </div>
                </div>
         
            </div>
        </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>
<?php } ?>