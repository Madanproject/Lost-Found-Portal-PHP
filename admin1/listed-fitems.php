<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lfsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <title>Lost and Found System-Lost Item Details</title>
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
<div class="page has-sidebar-left bg-light height-full">

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
              
                <div class="card my-3 no-b">
                    <div class="card-body">
                      <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                All Listed Found Items
                    </h3>
                </div>
            </div>
        </div>
    </header><br />
                        <table class="table table-bordered table-hover data-tables"
                               data-options='{ "paging": false; "searching":false}'>
                            <thead>
                             <tr>
                  <th>S.NO</th>
                  <th>Found Item Type</th>            
                  <th>Found Item Name</th>
                  <th>Image</th>
                    <th>Posting Date</th>
                         
                   <th>Action</th>
                </tr>
                            </thead>
                            <tbody>
                                <?php
$ret=mysqli_query($con,"select tblfounditem.* from  tblfounditem ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                           <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['ItemType'];?></td>
                  <td><?php  echo $row['ItemName'];?></td>
                  <td>
                      <img src="../user/images/<?php echo $row['Image1']; ?>"  width="100">

                  </td>
                  <td><?php  echo $row['PostDate'];?></td>
                  <td><a href="item-details.php?fiid=<?php echo $row['ID'];?>" class="btn btn-primary btn-sm" target="_blank">View</a> </td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
                          
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>
<?php }  ?>