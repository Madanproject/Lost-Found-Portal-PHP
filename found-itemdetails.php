<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $vid = $_GET['viewid'];
    $uid = $_SESSION['lfsuid'];
    $itemidentification = $_POST['itemidentification'];
    $itemdesc = $_POST['itemdesc']; 
    $status = 'Claim Request'; 
    
    // Check if the user has already claimed this product
    $ret = mysqli_query($con, "SELECT UserID FROM tblclaim WHERE UserID='$uid' AND ProductID='$vid'");
    $result = mysqli_fetch_array($ret);
    
    if ($result) {
        echo "<script>alert('You have already claimed this product');</script>";
    } else {
        // Insert new claim
        $query = mysqli_query($con, "INSERT INTO tblclaim (UserID, ProductID, ItemIdentification, ItemDescription, Status) VALUES ('$uid', '$vid', '$itemidentification', '$itemdesc', '$status')");
        
        if ($query) {
            // Update product status
            $updateQuery = mysqli_query($con, "UPDATE tblfounditem SET Status='$status' WHERE ID='$vid'");
            
            if ($updateQuery) {
                echo "<script>alert('Claim request sent successfully');</script>";
            } else {
                echo "<script>alert('Failed to update product status. Please try again');</script>";
            }
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lost and Foud Portal PHP</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <?php include_once('includes/header.php');?>
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <?php 
                                $vid=intval($_GET['viewid']);
                               
    

$query=mysqli_query($con,"select tblfounditem.ID,tblfounditem.Userid,tblfounditem.ItemType,tblfounditem.ItemName,tblfounditem.ItemDescriptions,tblfounditem.Image1,tblfounditem.Image2,tblfounditem.Area,tblfounditem.City,tblfounditem.State,tblfounditem.dateoffound,tblfounditem.KeptAddress,tblfounditem.KeptCity,tblfounditem.KeptState,tblfounditem.CPMobilenumber,tbluser.ID,tbluser.Fullname,tblfounditem.Status from  tblfounditem join tbluser on tbluser.ID=tblfounditem.Userid where tblfounditem.ID='$vid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  

?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2><?php  echo $row['ItemName'];?></h2>
                            <p><?php  echo $row['ItemType'];?></p>
                        </div>
                       
                       
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-5">
                                         <?php if($row['Image1']==''): ?>
                                        <img src="img/No_Image_Available.jpg"  width="100" height="200" style="border:solid 1px #000">
                                    <?php else: ?>
   <img src="user/images/<?php echo $row['Image1']; ?>"  width="100" height="200" style="border:solid 1px #000">
                                    <?php endif;?>
                                </div>
                                <div class="col-sm-5">
                                            <?php if($row['Image2']==''): ?>
                                        <img src="img/No_Image_Available.jpg"  width="100" height="200" style="border:solid 1px #000">
                                    <?php else: ?>
   <img src="user/images/<?php echo $row['Image2']; ?>"  width="100" height="200" style="border:solid 1px #000">
                                    <?php endif;?>
                                </div>
                               
                            </div>
                        </div>
             <p><strong>Description: </strong><?php echo $row['ItemDescriptions']; ?></p>                      

 <div class="row">
                                <div class="col-sm-5">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th colspan="2">Found Address</td>
      </tr>
      <tr>
        <th>Found Place</th>
        <td><?php echo $row['Area']; ?></td>
      </tr>
      <tr>
        <td>City</td>
        <td><?php echo $row['City']; ?></td>
      </tr>

            <tr>
        <td>State</td>
        <td><?php echo $row['State']; ?></td>
      </tr>
    </tbody>
  </table></div>
                                
                                <div class="col-sm-5">
                                      <table class="table table-bordered">
    <tbody>
      <tr>
        <th colspan="2">Kept Item Address</td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?php echo $row['KeptAddress']; ?></td>
      </tr>
      <tr>
        <td>City</td>
        <td><?php echo $row['KeptCity']; ?></td>
      </tr>

            <tr>
        <td>State</td>
        <td><?php echo $row['KeptState']; ?></td>
      </tr>
    </tbody>
  </table>
                                </div>

                            </div>



 <div class="row">
                                <div class="col-sm-10">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th>Contact Person Mobile Number</th>
        <td><?php echo $row['CPMobilenumber']; ?></td>
      </tr>
      <tr>
        <th>Date of Item Found</th>
        <td><?php echo $row['dateoffound']; ?></td>
      </tr>

            <tr>
        <th>Listed By</th>
        <td><?php echo $row['Fullname']; ?></td>
      </tr>
    </tbody>
</table>
</div>
</div>



                   
<?php if($row['Status']=='Claimed'){ ?>

<p class="btn btn-danger">Already claimed by Someone</p>
                <?php } elseif ($_SESSION['lfsuid'] == "") { ?>
                    <a href="user/login.php" class="btn btn-primary">Claim</a>
                <?php } elseif ($_SESSION['lfsuid'] != $row['Userid']) { ?>
                    <p>
                        <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Claim</button>
                    </p>
                <?php }  else { ?>
                    <p class="btn btn-primary">You cannot claim an item you listed.</p>
                <?php } ?>
                    
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
 </button>
</div>
<div class="modal-body">
<table class="table table-bordered table-hover data-tables">

 <form method="post" name="submit">
                              
<tr>
<th>Item Identification :</th>
<td>
<textarea name="itemidentification" placeholder="Enter Item Identification data" rows="5" cols="118" class="form-control" required="true"></textarea></td>
  </tr>                           

 <tr>
<th>Item Description(if any) :</th>
<td>
<textarea name="itemdesc" placeholder="Enter some information about item" rows="5" cols="8" class="form-control" required="true"></textarea></td>
  </tr>
</table>
</div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>

</div>



                                 
                            
                          </div>
                        </div>
                      </div> 
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- Blog Details Section End -->

    

    <!-- Footer Section Begin -->
    <?php include_once('includes/footer.php');?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html><?php } ?>