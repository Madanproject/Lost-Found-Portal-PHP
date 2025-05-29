<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['lfsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $uid=$_SESSION['lfsuid'];
    $itemtype=$_POST['itemtype'];
    $itemname=$_POST['itemname'];
    $itemdecs=addslashes($_POST['itemdecs']);
    $area=$_POST['area'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $dateoffound=$_POST['dateoffound'];
    $keptaddress=$_POST['keptaddress'];
    $keptcity=$_POST['keptcity'];
    $keptstate=$_POST['keptstate'];
    $cpmobilenumber=$_POST['cpmobilenumber'];
    $image1=$_FILES["image1"]["name"];
    $image2=$_FILES["image2"]["name"];
    $extension1 = substr($image1,strlen($image1)-4,strlen($image1));
    $extension2 = substr($image2,strlen($image2)-4,strlen($image2));
  
 
//rename images
$itemimage1=md5($image1).time().$extension1;
$itemimage2=md5($image2).time().$extension2;
 move_uploaded_file($_FILES["image1"]["tmp_name"],"images/".$itemimage1);
  move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$itemimage2);
    $query=mysqli_query($con, "insert into  tblfounditem(Userid,ItemType,ItemName,ItemDescriptions,Image1,Image2,Area,City,State,dateoffound,KeptAddress,KeptCity,KeptState,CPMobilenumber) value('$uid','$itemtype','$itemname','$itemdecs','$itemimage1','$itemimage2','$area','$city','$state','$dateoffound','$keptaddress','$keptcity','$keptstate','$cpmobilenumber')");
    if ($query) {
    echo '<script>alert("Found item detail has been added.")</script>';
    echo "<script>window.location.href ='found-item.php'</script>";
  }
  else
    {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>Lost and Found System-Add Found Item</title>
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
                        Add Found Item
                    </h4>
                </div>
            </div>
        </div>
    </header>

                    
                        <div class="card-body b-b">
                            <p>Found Item Information</p>
                        </div>
                        <div class="card-body b-b">
                            <form method="post" enctype="multipart/form-data">
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4" class="col-form-label">Item Type</label>
                                        <input type="text" class="form-control" id="jobtitle" name="itemtype" required="true" 
                                               placeholder="Item Type">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="col-form-label">Item Name </label>
                                        <input type="text" class="form-control" id="itemname" name="itemname" 
                                               placeholder="Item Name" required="true">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Item Descriptions</label>
                                    <textarea type="text" class="form-control" id="itemdecs" name="itemdecs" 
                                           placeholder="Item Descriptions" rows="6" required="true"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Item Image 1</label>
                                    <input type="file" class="form-control" id="image1" name="image1" 
                                           required="true">
                                </div>
                                 <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Item Image 2</label>
                                    <input type="file" class="form-control" id="image2" name="image2" 
                                           required="true">
                                </div>
                                <br>
                                <h4 style="color: blue;font-weight: bolder;">Where Found!!</h4>
                               
                                <div class="form-row">
                                    
                            <div class="card-title" style="padding-top: 20px">Area</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="area" required="true"  placeholder="Area">
                                
                            </div>
                            <br>
                       <div class="card-title" style="padding-top: 20px">City</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="city" required="true"  placeholder="City">
                                
                            </div>
                            <br>
                            <div class="card-title" style="padding-top: 20px">State</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="state" required="true"  placeholder="State">
                                
                            </div>
                                   
                                    
                            <div class="card-title" style="padding-top: 20px">Date of Found</div>
                            <div class="input-group">
                                <input type="text" class="date-time-picker form-control"
                                       data-options='{"timepicker":false, "format":"d-m-Y"}' value="" id="dateoffound" name="dateoffound" required="true">
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
                                        name="keptaddress" required="true"  placeholder="Kept Address">
                                
                            </div>
                            <br>
                       <div class="card-title" style="padding-top: 20px">City</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="keptcity" required="true"  placeholder="Kept City">
                                
                            </div>
                            <br>
                            <div class="card-title" style="padding-top: 20px">State</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="keptstate" required="true"  placeholder="Kept State">
                                
                            </div>
                                   
                         <br>

                            <div class="card-title" style="padding-top: 20px">Contact Person Mobile Number</div>
                            <div class="input-group" style="padding-bottom: 20px;">
                                <input type="text" class="form-control"
                                       name="cpmobilenumber" required="true"  placeholder="Contact Person Mobile Number" maxlength="10" pattern="[0-9]+">
                                
                            </div>
                             
                       <br>
                                   
                                </div>
                               <hr />
                                <button type="submit" class="btn btn-primary" name="submit">ADD</button>
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