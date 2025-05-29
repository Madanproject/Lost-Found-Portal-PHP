<?php 
session_start();
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
    <title>Lost and Found Portal</title>

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
   <?php include_once('includes/header.php');?>
    <!-- Header End -->

    



   <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Found Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                               
$ret=mysqli_query($con,"select tblfounditem.* from  tblfounditem order by id desc LIMIT 12");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                         <?php if($row['Image1']==''): ?>
                                        <img src="img/No_Image_Available.jpg"  width="100" height="200" style="border:solid 1px #000">
                                    <?php else: ?>
   <img src="user/images/<?php echo $row['Image1']; ?>"  width="100" height="200" style="border:solid 1px #000">
                                    <?php endif;?>
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <strong>Date of Found: 
                                    <?php  echo $row['dateoffound'];?></strong>
                                </div>
                              
                            </div>
                            <a href="found-itemdetails.php?viewid=<?php echo $row['ID'];?>">
                                <h4><?php  echo $row['ItemName'];?></h4>
                            </a>
                            <p><?php  echo $row['ItemDescriptions'];?> </p>
                        </div>
                    </div>
                </div><?php 
$cnt=$cnt+1;
}?>
                
             
            </div>
            
        </div>
    </section>

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