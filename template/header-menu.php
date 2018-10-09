<?php
    $all_work_areas= work_all_work_areas();
    $all_social_links= all_social_links();
?>
<!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
       <div class="container">
            <div class="logo">
                <a class="brand" href="#"><img src="assets/images/mainlofgo3.png" alt="Hello"/></a>
            </div>                      

<!--             <div class="follower">
                <ul>
                    <li><a class="fr" href="#"><span class="icon-plus-3 add"></span>Follow</a>
                        <div class="follow-list"> 
                            <ul>
                                <?php
                                    if(isset($all_social_links) && count($all_social_links) > 0){
                                    foreach ($all_social_links as $key => $link) {
                                ?>
                                <li><a href="<?php echo ($link['social_site_url'])? $link['social_site_url']:'#';?>"><span class="<?php echo ($link['social_site_icon_class'])? $link['social_site_icon_class']:'#';?>"></span><?php echo ($link['social_site_name'])? $link['social_site_name']:'#';?></a></li>
                                <?php }} ?>
                            </ul>
                        </div>                      
                    </li>
                
                    
                </ul>
            </div>      --> 

            
            <div id="main-menu">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                <ul class="sf-menu color-m">       <!-- Menu color Class  "color-m"-->
                    <li><a href="index.php"><span class="icon-house"></span>Home</a></li>
                    <li><a href="service.php"><span class="icon-feather"></span>Services</a></li>
                    <li><a href="gallery.php"><span class="icon-docs"></span>Gallery</a></li>
                    <li><a href="profile.php"><span class="icon-suitcase"></span>Profile</a></li>
                    <li><a href="contact.php"><span class="icon-rocket"></span>Contact</a></li>
                </ul>  
            </div><!-- /main-menu -->
        </div> <!-- /.container -->
      
        <div class="search-bar">
            <div class="container">
                <p><b> <span class="search icon-search"></span></b>
                <input type="text" value="Type to Search" name="searchinput" id="searchinput" onblur="if (this.value == ''){this.value = 'Type to Search';}" onfocus="if (this.value == 'Type to Search'){this.value = '';}"   />
                <a href="#" class="close"> <span class="search icon-cross"></span></a></p>
            </div> <!-- /.container -->
        </div><!-- /.search-bar -->