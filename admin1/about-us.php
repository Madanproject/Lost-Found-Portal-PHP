<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lfsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['lfsaid'];
 $pagetitle=$_POST['pagetitle'];

$pagedes=$_POST['pagedes'];

 $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");

    if ($query) {
    $msg="About Us has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Lost and Found System-About Us</title>
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
     <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
                        About Us
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
 
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">Page Title</label>
                                        <input type="text" name="pagetitle" id="pagetitle" value="<?php  echo $row['PageTitle'];?>" class="form-control" required='true'>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="col-form-label">Page Description</label>
                                       <textarea name="pagedes" id="pagedes" rows="10" class="form-control">
        <?php  echo $row['PageDescription'];?></textarea>
                                    </div>
                                    
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