<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['lfsaid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Lost and Found System-Admin Dashboard</title>
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
                    <h6> Admin Dashboard </h6>
                </div>








              
            </div>
         
<div class="row my-3">

                            
      <!--               <div class="col-md-4">
                        <a href="total-regcompany.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-building text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Listed Companies</div>
                                <h5 class="sc-counter mt-3"><?php echo $comcounts;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
                    </div> -->

<?php $query=mysqli_query($con,"select ID from tbluser");
$regusers=mysqli_num_rows($query);
?>


                    <div class="col-md-4">
                          <a href="total-regusers.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-users s-48"></span>
                                </div>
                                <div class="counter-title ">Regsitered Users </div>
                                <h5 class="sc-counter mt-3"><?php echo $regusers;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
                    </div>

<?php $query1=mysqli_query($con,"select ID from tblfounditem");
$listeditems=mysqli_num_rows($query1);
?>

                    <div class="col-md-4">
                           <a href="listed-fitems.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-file text-blue s-48"></span>
                                </div>
                                <div class="counter-title">Listed Found Items</div>
                                <h5 class="sc-counter mt-3"><?php echo $listeditems;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
                    </div>

<?php 
$query2=mysqli_query($con,"select ID from tblclaim");
$totalclaim=mysqli_num_rows($query2);
 ?> 

                    <div class="col-md-4">
                          <a href="all-claim-request.php" target="_blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-mail-envelope-open s-48"></span>
                                </div>
                                <div class="counter-title ">Total Claim Requests</div>
                                <h5 class="sc-counter mt-3"><?php echo $totalclaim;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
                    </div>


<?php 
$query3=mysqli_query($con,"select ID from tblfounditem where  Status='Claim Request'");
$newrequests=mysqli_num_rows($query3);
 ?> 


                    <div class="col-md-4" style="margin-top:2%">
                           <a href="new-claim-request.php" target="_blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-mail-envelope-open text-blue s-48"></span>
                                </div>
                                <div class="counter-title">New Requests</div>
                                <h5 class="sc-counter mt-3"><?php echo $newrequests;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
                    </div>

<?php  $query4=mysqli_query($con,"select ID from tblfounditem where  Status='Inprocess'");
$inprocessrequest=mysqli_num_rows($query4);
?>

                    <div class="col-md-4" style="margin-top:2%;">
                        <a href="inprocess-claim-request.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-mail-envelope-open text-yellow s-48"></span>
                                </div>
                                <div class="counter-title">In Process Requests</div>
                                <h5 class="sc-counter mt-3"><?php echo $totalselapp;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
                    </div>




<?php  $query5=mysqli_query($con,"select ID from tblfounditem where  Status='Claimed'");
$Claimedrequest=mysqli_num_rows($query5);
?>


                    <div class="col-md-4" style="margin-top:2%;">
                         <a href="claimed-request.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-mail-envelope-open text-green s-48"></span>
                                </div>
                                <div class="counter-title">Claimed Items</div>
                                <h5 class="sc-counter mt-3"><?php echo $Claimedrequest;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div></a>
                    </div>

<?php  $query6=mysqli_query($con,"select ID from tblfounditem where  Status='Rejected'");
$Rejectedrequests=mysqli_num_rows($query6);
?>                    
     <div class="col-md-4" style="margin-top:2%;">
           <a href="rejected-claim-request.php" target="blank">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                            <span class="icon icon-mail-envelope-open text-red s-48"></span>
                                </div>
                                <div class="counter-title">Rejected Requests</div>
                                <h5 class="sc-counter mt-3"><?php echo $Rejectedrequests;?></h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </a>
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