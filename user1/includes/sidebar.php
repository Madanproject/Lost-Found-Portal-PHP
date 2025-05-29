<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


  ?>
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-110px mt-3 mb-3 ml-3">
 <h2 align="center"> LFS | User</h2>
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
$uid=$_SESSION['lfsuid'];
$ret=mysqli_query($con,"select Fullname from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['Fullname'];

?>
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $name; ?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="profile.php" class="list-group-item list-group-item-action ">
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
            </a>
                
            </li>
           

            
             <li class="treeview"><a href="#"><i class="icon icon-documents3 text-blue s-18"></i>Found Item<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="found-item.php"><i class="icon icon-circle-o"></i>Add</a>
                    </li>
                    <li><a href="manage-found-items.php"><i class="icon icon-add"></i>Manage</a>
                    </li>
                    
                </ul>
            </li>
            
            <li class="treeview"><a href="#"><i class="icon icon-documents3 text-blue s-18"></i>Item Claim Request<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="all-claim-item.php"><i class="icon icon-circle-o"></i>All Claim Request</a>
                    </li>
                    <li><a href="new-claim-item.php"><i class="icon icon-add"></i>New Claim Request</a>
                    </li>
                     <li><a href="inprocess-claim-item.php"><i class="icon icon-add"></i>In Process Claim Request</a>
                    </li>
                    <li><a href="claimed-found-item.php"><i class="icon icon-add"></i>Claimed Request</a>
                    </li>
                    <li><a href="rejected-requests.php"><i class="icon icon-add"></i>Rejected Request</a>
                    </li>

                </ul>
            </li>

                 <li class="treeview"><a href="my-claims.php">
                <i class="icon icon-documents3 text-red s-18"></i> <span>My Claims</span> 
            </a>
                
            </li>

            <li class="treeview no-b"><a href="#">
                <i class="icon icon-package light-green-text s-18"></i>
                <span>Reports</span>
                
            </a>
                <ul class="treeview-menu">
                    <li><a href="between-dates-reports.php"><i class="icon icon-circle-o"></i>B/w Dates</a></li>

                </ul>
            </li>
      
      <li class="treeview"><a href="../index.php">
                <i class="icon icon-home purple-text s-18"></i> <span>Back to Home Page</span> 
            </a>
                
            </li>
        </ul>
    </section>
</aside>