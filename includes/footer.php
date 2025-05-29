 <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-left">
                        <div class="footer-logo">
                             <h3 style="font-weight: bolder;color: white;">Lost And Found Portal</h3>
                          <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>               </div>


                        <ul>
                            <li>Address:    <?php  echo $row['PageDescription'];?></li>
                            <li>Phone:    <?php  echo $row['MobileNumber'];?></li>
                            <li>Email: <?php  echo $row['Email'];?></li>
                        </ul>
     <?php } ?>
                    </div>
                </div>
      
               <div class="col-lg-3 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="found-item.php">Found Items</a></li>
                            <li><a href="contact.php">Contact</a></li>
    
                        </ul>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Lost and Found Portal 

                        </div>
                        <div class="payment-pic">
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>