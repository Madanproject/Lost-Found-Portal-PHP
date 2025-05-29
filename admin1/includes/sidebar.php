<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


  ?>
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-110px mt-3 mb-3 ml-3">
 <h2 align="center"> LFS | ADMIN</h2>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="assets/img/dummy/image.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <?php
$aid=$_SESSION['lfsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$aid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $name; ?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="admin-profile.php" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-user text-blue"></i>Profile
                        </a>
                        <a href="change-password.php" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="logout.php" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
           
            <li class="treeview"><a href="dashboard.php">
                <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span> 
            </a></li>
 
            <li class="treeview"><a href="listed-fitems.php">
                <i class="icon icon-document light-green-text s-18"></i> <span>Listed Found Item</span> 
            </a>
                
            </li>
              <li class="treeview"><a href="total-regusers.php">
                <i class="icon icon-user purple-text s-18"></i> <span>Regd Users</span> 
            </a></li>   


            <li class="treeview"><a href="#"><i class="icon icon-documents3 text-blue s-18"></i>Claims<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="new-claim-request.php"><i class="icon icon-circle-o"></i>New Request</a>
                    </li>
                    <li><a href="inprocess-claim-request.php"><i class="icon icon-add"></i>InProcess Request</a>
                    </li>

                     <li><a href="claimed-request.php"><i class="icon icon-add"></i>Claimed Request</a>
                    </li>

                    <li><a href="rejected-claim-request.php"><i class="icon icon-add"></i>Rejected Request</a>  
                    </li>
                    

                    <li><a href="all-claim-request.php"><i class="icon icon-add"></i>All Claim Request</a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview"><a href="#"><i class="icon icon-documents3 text-blue s-18"></i>Pages<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="about-us.php"><i class="icon icon-circle-o"></i>About Us</a>
                    </li>
                    <li><a href="contact-us.php"><i class="icon icon-add"></i>Contact Us</a>
                    </li>
                    
                </ul>
            </li>
            <li class="treeview no-b"><a href="#">
                <i class="icon icon-package light-green-text s-18"></i>
            Reports<i
                    class="icon icon-angle-left s-18 pull-right"></i>
                
            </a>
                <ul class="treeview-menu">
                    <li><a href="bw-dates-regusers.php"><i class="icon icon-circle-o"></i>B/w Reg Users</a>
                    </li>
                    <li><a href="bw-dates-regusers.php"><i class="icon icon-add"></i>B/w Dates Claim Requests</a>
                    </li>
                </ul>
            </li>
      
 
        </ul>
    </section>
</aside>