<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
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

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Found Item</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 order-1 order-lg-2">
                    
                    <div class="product-list">
                        <div class="row">
                         
                             <?php
                               
$ret=mysqli_query($con,"select tblfounditem.* from  tblfounditem order by id desc");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">

                                        <?php if($row['Image1']==''): ?>
                                        <img src="img/No_Image_Available.jpg"  width="100" height="200" style="border:solid 1px #000">
                                    <?php else: ?>
   <img src="user/images/<?php echo $row['Image1']; ?>"  width="100" height="200" style="border:solid 1px #000">
                                    <?php endif;?>
                                        
                                        <ul>
                                           
                                            <li class="quick-view"><a href="found-itemdetails.php?viewid=<?php echo $row['ID'];?>">+ Quick View</a></li>
                                           
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php  echo $row['ItemType'];?></div>
                                        <a href="found-itemdetails.php?viewid=<?php echo $row['ID'];?>">
                                            <h5><?php  echo $row['ItemName'];?></h5>
                                        </a>
                                       
                                    </div>
                                </div>
                            </div><?php 
$cnt=$cnt+1;
}?>
                            
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    
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

</html>