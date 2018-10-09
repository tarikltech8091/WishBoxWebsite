<?php
    $all_work_areas= work_all_work_areas();
    $all_social_links= all_social_links();
?>
            <div class="col-wrap shear-icon-box col-shadow bg-light-dark"><!-- style col-shadow/ col-gray/ testimonial/-->
                <div class="container ">        
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="list-icon">
                                <ul>
                                <?php
                                    if(isset($all_social_links) && count($all_social_links) > 0){
                                    foreach ($all_social_links as $key => $link) {
                                ?>
                                    <li><a href="<?php echo ($link['social_site_url'])? $link['social_site_url']:'#';?>"><span class="<?php echo ($link['social_site_icon_class'])? $link['social_site_icon_class']:'#';?>"></a></li>

                                <?php }} ?>

                                </ul>
                            </div>      
                        </div><!-- /.span12 -->
                    </div><!-- /.row-fluid --> 
                </div>
            </div><!-- /.col -->

    <!--Footer _ Start-->
            <div class="footerbox col-shadow">
                <div class="container">
                    <div class="fbox">   
                        <h2>Get in Touch</h2>
                        <!--   hr-Start-->  
                        <div class="hr hr-left hr-light"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
                            <span class="hr-inner">
                                <span class="hr-inner-style"></span>
                            </span>
                        </div>
                        <!--   hr-Close-->
                        <p> <a class="brand" href="#"><img src="assets/images/fofdfoter2.png" alt="Hello"/></a></p>
                        <address>
                            <p><span class="icon-house"></span>154 Motijheel C/A (Motijheel Moshjid Wakfa Estate), 1st Floor, Room #103, Motijheel, Dhaka #1000, Bangladesh. </p>
                            <p><span class="icon-phone"></span>+02 57165391</p>
                            <p><span class="icon-mail"></span>info@dftexltd.com</p>
                        </address>  <!--fpost_close-->
                            
                    </div>  <!--fpost_close-->  

                    <div class="fbox">  
                            
                        <h2>Work Areas</h2>
                        <!--   hr-Start-->  
                        <div class="hr hr-left hr-light"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
                            <span class="hr-inner">
                                <span class="hr-inner-style"></span>
                            </span>
                        </div>
                            <!--   hr-Close-->                  
                        <ul>
                            <?php
                              if(isset($all_work_areas) && count($all_work_areas) > 0){
                                foreach ($all_work_areas as $key => $list) {
                            ?>

                                <li><a href="service-details.php?product_id=<?php echo $list["product_id"];?>"><?php echo $list["product_name"];?></a>
                                </li>
                            <?php
                                }
                                }else{
                            ?>
                                <li><a href="#">Woven Label</a></li>
                                <li><a href="#">Jacquard Elastic</a></li>
                                <li><a href="#">Twill Tape</a></li>
                                <li><a href="#">Hang Tag</a></li>
                                <li><a href="#">Zipper</a></li>
                                <li><a href="#">Button</a></li>
                            <?php } ?>
                        </ul>
                    </div>  <!--fpost_close-->  

                    <div class="fbox">  
                            
                        <h2>Social Link</h2>
                        <!--   hr-Start-->  
                        <div class="hr hr-left hr-light"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
                            <span class="hr-inner">
                                <span class="hr-inner-style"></span>
                            </span>
                        </div>
                        <!--   hr-Close-->                  
                        <div class="widget list2">                                      
                                 
                          <ul>
                           <?php
                                if(isset($all_social_links) && count($all_social_links) > 0){
                                foreach ($all_social_links as $key => $link) {
                            ?>
                            <li><a href="<?php echo ($link['social_site_url'])? $link['social_site_url']:'#';?>"><?php echo ($link['social_site_name'])? $link['social_site_name']:'#';?></a></li>
                            <?php }} ?>

                          </ul> 

                        </div><!-- /.widget --> 
                            
                    </div>  <!--fpost_close-->  

                    <div class="fbox last"> 
                            
                        <h2>Links</h2>
                        <!--   hr-Start-->  
                        <div class="hr hr-left hr-light"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
                            <span class="hr-inner">
                                <span class="hr-inner-style"></span>
                            </span>
                        </div>
                         <!--   hr-Close-->                  
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="service.php">Services</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul> 
                    </div>  <!--fpost_close-->                      
                    <div class="clear"></div>
                </div><!--Wrap_close--> 
            </div>          
    
            <div class="footer">
                <div class="container">
                    <p>
                        &copy; <?php echo date('Y');?> Designed and Developed by <span><a href="http://live-technologies.net" target="_blank">Live Technologies LTD.</a></span>
                    </p>
                </div>  
            </div>  
        </section><!--End Main Content Section-->
    </div><!--End Main Content Div--> 
</body>
</html>