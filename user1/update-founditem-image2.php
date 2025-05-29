<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['lfsuid']) == 0) {
    header('location:logout.php');
} else {
    

    if(isset($_POST['submit']))
  {
   $cid=$_GET['id'];

     $img2=$_FILES["image2"]["name"];
     $extension = substr($img2,strlen($img2)-4,strlen($img2));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$pimg2=md5($img2).$extension;
     move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$pimg2);
    $query=mysqli_query($con, "update tblfounditem set Image2='$pimg2' where ID='$cid'");
    if ($query) {
  
      echo "<script>alert('Product image has been Update');</script>";
  }
  else
    {
       echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
    }

  }

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>Lost and Found System-Update Found Item Image</title>
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
                        Update Found Item Image
                    </h4>
                </div>
            </div>
        </div>
    </header>

                    
                        <div class="card-body b-b">
                            <p>Update Found Item Image</p>
                        </div>
                        <div class="card-body b-b">
                            <form method="post" enctype="multipart/form-data">
                                <?php 
                                $eid=intval($_GET['id']);
    

$query=mysqli_query($con,"select tblfounditem.* from  tblfounditem where ID='$eid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>
                                
                                <div class="form-row">
                                        <label for="inputPassword4" class="col-form-label">Item Name </label>
                                        <input type="text" class="form-control" id="itemname" name="itemname" 
                                               value="<?php echo htmlentities($row['ItemName']);?>" required="true">

                                    
                                </div>
                              
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Old Item Image 2</label>
                                     <img src="images/<?php echo $row['Image2']; ?>" width="200" height="100">
                                </div>
                                 <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">New Item Image 2</label>
                                     <input type="file" class="form-control" id="image2" name="image2" 
                                              required="true">
                                </div>
                                <br>
                              
                       <?php } ?>
                                   
                                
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