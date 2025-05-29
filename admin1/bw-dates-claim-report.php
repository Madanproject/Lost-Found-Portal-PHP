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
                      B/w Dates  Requests Report
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
<h3 align="center" style="color:blue">B/w Dates Claim Report from <?php echo $fdate;?> To <?php echo $tdate;?></h3>
<hr />

<table class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Claimed By</th>
            <th>Found Item Type</th>
            <th>Found Item Name</th>
            <th>Image</th>
            <th>Posting Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "
        SELECT 
            tblclaim.ID as cid,
            tblclaim.ProductID,
            tblclaim.UserID,
            tblclaim.ItemIdentification,
            tblclaim.ItemDescription,
            tblclaim.Status as cstatus,
            tblclaim.Dateofclaim,
            tblfounditem.ID as fid,
            tblfounditem.Userid,
            tblfounditem.ItemType,
            tblfounditem.ItemName,
            tblfounditem.ItemDescriptions,
            tblfounditem.Image1,
            tblfounditem.Image2,
            tblfounditem.Area,
            tblfounditem.City,
            tblfounditem.State,
            tblfounditem.dateoffound,
            tblfounditem.KeptAddress,
            tblfounditem.KeptCity,
            tblfounditem.KeptState,
            tblfounditem.CPMobilenumber,
            tblfounditem.PostDate,
            tbluser.ID as uid,
            tbluser.Fullname
        FROM 
            tblclaim 
        JOIN tbluser ON tbluser.ID = tblclaim.UserID 
        JOIN tblfounditem ON tblfounditem.ID = tblclaim.ProductID 
        WHERE  date(Dateofclaim) between '$fdate' and '$tdate';
        ";

        $ret = mysqli_query($con, $query);
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
        ?>
        <tr>
     

            <td><?php echo $cnt; ?></td>
            <td><?php echo htmlspecialchars($row['Fullname']); ?></td>
            <td><?php echo htmlspecialchars($row['ItemType']); ?></td>
            <td><?php echo htmlspecialchars($row['ItemName']); ?></td>
            <td>
                <img src="images/<?php echo htmlspecialchars($row['Image1']); ?>" width="100">
            </td>
            <td><?php echo htmlspecialchars($row['PostDate']); ?></td>
<td><?php if($row['cstatus']=='Claim Request'):?>
    <button class="btn btn-warning btn-xs">Claim Request Received</button>
<?php elseif($row['cstatus']=='Inprocess'):?>
<button class="btn btn-primary btn-xs">In Process</button>
<?php elseif($row['cstatus']=='Claimed'):?>
<button class="btn btn-success btn-xs"> Claimed</button>
<?php elseif($row['cstatus']=='Rejected'):?>
<button class="btn btn-danger btn-xs">Rejected</button>
<?php endif;?>

</td>


            <td><a href="item-claim-details.php?viewid=<?php echo htmlspecialchars($row['cid']); ?>&&fid=<?php echo htmlspecialchars($row['fid']);?>" class="btn btn-primary">View Details</a></td>
        </tr>
        <?php 
            $cnt++;
        }
        ?>
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