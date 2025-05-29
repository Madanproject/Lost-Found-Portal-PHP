 <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                 <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        <?php  echo $row['Email'];?>
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                      <?php  echo $row['MobileNumber'];?>
                    </div>
                </div><?php } ?>
                <div class="ht-right">
                   
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-8 col-md-2">
                        <div class="logo">
                            <a href="index.php">
                                <h3 style="font-weight: bolder;color: blue;">Lost And Found Portal</h3>
                            </a>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 text-right col-lg-3">
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
               
                <nav class="nav-menu mobile-menu">
                    <ul>
                         <?php

 if($_SESSION['lfsuid']==0){?>
                        <li><a href="index.php">Home</a></li>
                     
                        
                        <li><a href="about.php">About</a></li>
                            <li><a href="found-item.php">Found Items</a></li>
                        <li><a href="contact.php">Contact</a></li>
                      <li><a href="admin/login.php">Admin</a></li>
                       <li><a href="user/login.php">User</a></li>
                      <?php } else {?>
                        <li><a href="index.php">Home</a></li>
        
                        
                        
                        <li><a href="about.php">About</a></li>
                         <li><a href="found-item.php">Found Items</a></li>
                        <li><a href="contact.php">Contact</a></li>
                       <li><a href="user/dashboard.php">Dashboard</a></li>
                       <li><a href="logout.php">Logout</a></li> <?php } ?>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>