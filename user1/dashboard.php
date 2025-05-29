<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['lfsuid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Lost and Found System-User Dashboard</title>
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

<div class="page has-sidebar-left">
   
    <?php include_once('includes/header.php');?>

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="card-header white">
                    <h6> User Dashboard </h6>
                </div>








              
            </div>

<div class="row my-3">



<?php $uid=$_SESSION['lfsuid'];
//Total applied Jobs
 $query3=mysqli_query($con,"select ID from tblfounditem where Userid='$uid'");
$listeditem=mysqli_num_rows($query3);
 ?>

                    <div class="col-md-4">
                          <a href="manage-found-items.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-documents s-48"></span>
                                </div>
                                <div class="counter-title ">Total Found Items by me </div>
                                <h5 class="sc-counter mt-3"><?php echo $listeditem;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
                    </div>

<?php 
//new claim
$query=mysqli_query($con,"select ID from tblfounditem where Userid='$uid' and Status='Claim Request'");
$newrequest=mysqli_num_rows($query);
 ?> 



                    <div class="col-md-4">
                           <a href="new-claim-item.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-documents text-black s-48"></span>
                                </div>
                                <div class="counter-title">New Request</div>
                                <h5 class="sc-counter mt-3"><?php echo $newrequest;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
                    </div>
<hr />
<?php  $query2=mysqli_query($con,"select ID from tblfounditem where Userid='$uid' and Status='Inprocess'");
$inprocessrequest=mysqli_num_rows($query2);
?>

                    <div class="col-md-4" >
                        <a href="inprocess-claim-item.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-documents text-yellow s-48"></span>
                                </div>
                                <div class="counter-title">In Process Request</div>
                                <h5 class="sc-counter mt-3"><?php echo $inprocessrequest;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
                    </div>






<?php  $query2=mysqli_query($con,"select ID from tblfounditem where Userid='$uid' and Status='Claimed'");
$Claimedrequest=mysqli_num_rows($query2);
?>

                    <div class="col-md-4" style="margin-top:2%;">
                         <a href="claimed-found-item.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-documents text-green s-48"></span>
                                </div>
                                <div class="counter-title">Claimed Request (Completed)</div>
                                <h5 class="sc-counter mt-3"><?php echo $Claimedrequest;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
                    </div>


<?php  $query2=mysqli_query($con,"select ID from tblfounditem where Userid='$uid' and Status='Rejected'");
$Rejectedrequests=mysqli_num_rows($query2);
?>

                    <div class="col-md-4" style="margin-top:2%;">
                         <a href="rejected-requests.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-documents text-red s-48"></span>
                                </div>
                                <div class="counter-title">Rejected Request</div>
                                <h5 class="sc-counter mt-3"><?php echo $Rejectedrequests;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
                    </div>




<?php  $query2=mysqli_query($con,"select ID from tblclaim where UserID='$uid' ");
$myclaims=mysqli_num_rows($query2);
?>

                    <div class="col-md-4" style="margin-top:2%;">
                         <a href="my-claims.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-documents text-pink s-48"></span>
                                </div>
                                <div class="counter-title">My Claim Requests</div>
                                <h5 class="sc-counter mt-3"><?php echo $myclaims;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
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