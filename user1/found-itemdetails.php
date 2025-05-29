<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['lfsuid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $uid = $_SESSION['lfsuid'];
        $itemtype = $_POST['itemtype'];
        $itemname = $_POST['itemname'];
        $itemdecs = addslashes($_POST['itemdecs']);
        $area = $_POST['area'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $dateoffound = $_POST['dateoffound'];
        $keptaddress = $_POST['keptaddress'];
        $keptcity = $_POST['keptcity'];
        $keptstate = $_POST['keptstate'];
        $cpmobilenumber = $_POST['cpmobilenumber'];
        $eid = intval($_GET['editid']);

        $query = "UPDATE tblfounditem SET ItemType=?, ItemName=?, ItemDescriptions=?, Area=?, City=?, State=?, dateoffound=?, KeptAddress=?, KeptCity=?, KeptState=?, CPMobilenumber=? WHERE ID=?";
        if ($stmt = mysqli_prepare($con, $query)) {
            mysqli_stmt_bind_param($stmt, "sssssssssssi", $itemtype, $itemname, $itemdecs, $area, $city, $state, $dateoffound, $keptaddress, $keptcity, $keptstate, $cpmobilenumber, $eid);
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Lost item detail has been updated.")</script>';
                echo "<script>window.location.href ='manage-found-items.php'</script>";
            } else {
                echo '<script>alert("Something went wrong. Please try again.")</script>';
            }
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>alert("Failed to prepare the statement.")</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>Lost and Found System-Update Found Item</title>
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
                        Update Found Item
                    </h4>
                </div>
            </div>
        </div>
    </header>

                    
                        <div class="card-body b-b">
                            <p>Update Found Item Information</p>
                        </div>
                        <div class="card-body b-b">
                            <form method="post" enctype="multipart/form-data">
                                 <?php 
                                $eid=intval($_GET['editid']);
    

$query=mysqli_query($con,"select tblfounditem.* from  tblfounditem where ID='$eid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4" class="col-form-label">Item Type</label>
                                        <input type="text" class="form-control" id="jobtitle" name="itemtype" required="true" 
                                               value="<?php echo htmlentities($row['ItemType']);?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="col-form-label">Item Name </label>
                                        <input type="text" class="form-control" id="itemname" name="itemname" 
                                               value="<?php echo htmlentities($row['ItemName']);?>" required="true">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Item Descriptions</label>
                                    <textarea type="text" class="form-control" id="itemdecs" name="itemdecs" 
                                           placeholder="Item Descriptions" rows="6" required="true"><?php echo htmlentities($row['ItemDescriptions']);?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Item Image 1</label>
                                    <img src="images/<?php echo $row['Image1']; ?>" width="200" height="100"> <a href="update-founditem-image1.php?id=<?php echo $row['ID'];?>">Change Image</a>
                                </div>
                                 <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Item Image 2</label>
                                    <img src="images/<?php echo $row['Image2']; ?>" width="200" height="100"> <a href="update-founditem-image2.php?id=<?php echo $row['ID'];?>">Change Image</a>
                                </div>
                                <br>
                                <h4 style="color: blue;font-weight: bolder;">Where Found!!</h4>
                               
                                <div class="form-row">
                                    
                            <div class="card-title" style="padding-top: 20px">Area</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="area" required="true"  value="<?php echo htmlentities($row['Area']);?>">
                                
                            </div>
                            <br>
                       <div class="card-title" style="padding-top: 20px">City</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="city" required="true"  value="<?php echo htmlentities($row['City']);?>">
                                
                            </div>
                            <br>
                            <div class="card-title" style="padding-top: 20px">State</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="state" required="true"  value="<?php echo htmlentities($row['State']);?>">
                                
                            </div>
                                   
                                    
                            <div class="card-title" style="padding-top: 20px">Date of Found</div>
                            <div class="input-group">
                                <input type="text" class="date-time-picker form-control"
                                       data-options='{"timepicker":false, "format":"d-m-Y"}' value="<?php echo htmlentities($row['dateoffound']);?>" id="dateoffound" name="dateoffound" required="true">
                                <span class="input-group-append">
                                    <span class="input-group-text add-on white">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </span>
                            </div>


                            <h4 style="color: blue;font-weight: bolder;padding-top: 20px;">Where Item Kept!!</h4>
                               
                                <div class="form-row">
                                    
                            <div class="card-title" style="padding-top: 20px">Address</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="keptaddress" required="true"  value="<?php echo htmlentities($row['KeptAddress']);?>">
                                
                            </div>
                            <br>
                       <div class="card-title" style="padding-top: 20px">City</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="keptcity" required="true"  value="<?php echo htmlentities($row['KeptCity']);?>">
                                
                            </div>
                            <br>
                            <div class="card-title" style="padding-top: 20px">State</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="keptstate" required="true"  value="<?php echo htmlentities($row['KeptState']);?>">
                                
                            </div>
                                   
                         <br>

                            <div class="card-title" style="padding-top: 20px">Contact Person Mobile Number</div>
                            <div class="input-group" style="padding-bottom: 20px;">
                                <input type="text" class="form-control"
                                       name="cpmobilenumber" required="true"  value="<?php echo htmlentities($row['CPMobilenumber']);?>" maxlength="10" pattern="[0-9]+">
                                
                            </div>
                             
                       <br>
                            <?php } ?>       
                                </div>
                               <hr />
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
<?php }  ?>