<?php  session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lfsaid']==0)) {
  header('location:logout.php');
  } else{


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>Lost and Found System|| Details of Claim Request</title>
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
                        Details of Claim Request
                    </h4>
                </div>
            </div>
        </div>
    </header>
                        <div class="card-body b-b">
                           
 <?php
$vid=$_GET['viewid'];
$ret=mysqli_query($con,"SELECT 
            tblclaim.ID as cid,
            tblclaim.ProductID,
            tblclaim.UserID,
            tblclaim.ItemIdentification,
            tblclaim.ItemDescription,
            tblfounditem.Status  as cstatus,
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
            tbluser.Fullname,
            tbluser.Email,
            tbluser.MobileNumber

        FROM 
            tblclaim 
        JOIN tbluser ON tbluser.ID = tblclaim.UserID 
        JOIN tblfounditem ON tblfounditem.ID = tblclaim.ProductID where  tblclaim.ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<table class="table table-bordered table-hover data-tables">

    <tr>
  <th width="200">Claimed By</th>
  <td><?php  echo $row['Fullname'];?></td>
 
  <th>Claimer Mobile Number</th>
  <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
  <tr>
  <th>Claimer Email</th>
  <td><?php  echo $row['Email'];?></td>
  <th>Item Title</th>
  <td><?php  echo $row['ItemName'];?><a href="item-details.php?fiid=<?php echo $row['fid'];?>" target="_blank"><strong style="padding-left: 10px;" >View Details</strong></a> </td>
  </tr>
   
  <tr>
  <th>Item Identification</th>
  <td><?php  echo $row['ItemIdentification'];?></td>

  <th>Item Descrition</th>
  <td><?php  echo $row['ItemDescription'];?></td>
  </tr>
  <tr>
    <th>Item Posting Date</th>
  <td><?php  echo $row['PostDate'];?></td>
  
  <th>Date of Claim</th>
  <td><?php  echo $row['Dateofclaim'];?></td>
  
  </tr>
  <tr>
    <th>Status</th>
 <td colspan="3"><?php echo $row['cstatus'] ? htmlspecialchars($row['cstatus']) : "Claim Request Not Received"; ?></td>
 
</tr>
 
</table>

<?php $ret=mysqli_query($con,"select * from tblclaimhistory where claimId='$vid'");
$count=mysqli_num_rows($ret);
if($count>0):
?>


<table class="table table-bordered table-hover data-tables">
    <tr>
        <th colspan="3" style="color:blue; font-size:20px;">Claim History</th>
    </tr>
<tr>
    <th>Remark </th>
    <th>Status</th>
    <th>Date</th>
</tr>
<?php while($result=mysqli_fetch_array($ret)){?>
    <tr>
      <td><?php  echo $result['claimRemark'];?></td>
        <td><?php  echo $result['claimStatus'];?></td>
          <td><?php  echo $result['postingDate'];?></td>
</tr>
 <?php } ?>   


</table>
<?php endif; ?>
                    
              


                                 
                            
                          </div>
                        </div>
                      </div>
 


                                 
                            
                          </div>
                       
                  </div>
                </div>
                            
                                </div>
                                
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
<?php } } ?>