<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lfsaid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Lost and Found Portal B/w Dates reports</title>
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
                      B/w Dates  Registered Users 
                    </h4>
                </div>
            </div>
        </div>
    </header>
                        <div class="card-body b-b">
                            <form method="post" name="bwdatesreport" >
                                   <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">From Date</label>
                                        <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">To Date</label>
                                        <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>
                                    </div>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>


<?php if(isset($_POST['submit'])){ 
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];?>

<hr />
<h3 align="center" style="color:blue">B/w Dates Registered Users Report from <?php echo $fdate;?> To <?php echo $tdate;?></h3>
<hr />

                     <table class="table table-bordered table-hover data-tables"
                               data-options='{ "paging": false; "searching":false}'>
                            <thead>
                             <tr>
                  <th>S.NO</th>
            
                  <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>User Registered Date</th>       
                   <th>Action</th>
                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
$ret=mysqli_query($con,"select *from   tbluser where date(UserRegdate) between '$fdate' and '$tdate' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                           <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['UserRegdate'];?></td>
                  <td>
            <a href="view-users-details.php?viewid=<?php echo $row['ID'];?>" class="btn btn-primary btn-sm" target="blank">View Details</a>
<a href="user-fitems.php?uid=<?php echo $row['ID'];?>&&uname=<?php  echo $row['FullName'];?>" class="btn btn-warning btn-sm" target="blank">Found Items</a>
<a href="claims.php?uid=<?php echo $row['ID'];?>&&uname=<?php  echo $row['FullName'];?>" class="btn btn-info btn-sm" target="blank">Claims</a>
                  </td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
                          
                            </tbody>
                           
                        </table>

<?php } ?>




                
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