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
    
    <title>Lost and Found System-Item Details</title>
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
                     Item Details
                    </h3>
                </div>
            </div>
        </div>
    </header><br />
                  
<?php
$itemid=$_GET['fiid'];
$ret=mysqli_query($con,"select *from   tblfounditem where ID='$itemid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

      <table class="table table-bordered">

                            <tbody>
<tr>
    <th>Item Name</th>
    <td><?php  echo $row['ItemName'];?></td>
    <th>Item Type</th>
    <td><?php  echo $row['ItemType'];?></td>
</tr>

<tr>
    <th>Item Description</th>
    <td colspan="3"><?php  echo $row['ItemDescriptions'];?></td>
</tr>

<tr>
    <th>Item Image 1</th>
    <td> <img src="../user/images/<?php echo $row['Image1']; ?>" width="200" height="100"> </td>
    <th>Item Image 2</th>
    <td>  <img src="../user/images/<?php echo $row['Image2']; ?>" width="200" height="100"> </td>
</tr>


<tr>
<th colspan="4">Address Where Found</th>
</tr>

<tr>
    <th>Area</th>
    <td><?php  echo $row['Area'];?></td>
    <th>City</th>
    <td><?php  echo $row['State'];?></td>
</tr>

<tr>
<th colspan="4">Where item Kept</th>
</tr>


<tr>
    <th>Address</th>
    <td><?php  echo $row['KeptCity'];?></td>
    <th>Item Type</th>
    <td><?php  echo $row['KeptState'];?></td>
</tr>


<tr>
    <th>Date of Found</th>
    <td><?php  echo $row['dateoffound'];?></td>
    <th>Contact Person Mobile No</th>
    <td><?php  echo $row['CPMobilenumber'];?></td>
</tr>

<?php } ?>
                          
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