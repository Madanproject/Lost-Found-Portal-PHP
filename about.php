<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $msg=$_POST['message'];
    $ret=mysqli_query($con, "select Email from tblcontact where Email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tblcontact(FullName,Email,Message) value('$fullname','$email','$msg')");
    if ($query) {
    $msg="Thank You For Your Valuable Message";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}

}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lost and Found Portal | About Us</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
   <?php include_once('includes/header.php');?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                <div class="col-lg-10">
                    <div class="contact-title">
                        <h4><?php  echo $row['PageTitle'];?></h4>
                        <p><?php  echo $row['PageDescription'];?>.</p>
                    </div>
                   
                </div><?php } ?>
               
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

   
 <?php include_once('includes/footer.php');?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>