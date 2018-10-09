<?php 
    include 'template/header.php';
?>
<?php

$all_about_slider = get_all_slider();
$all_client = get_all_client();
$all_certificate = get_all_certificate();
$all_work_areas= all_work_areas();
$get_select_post_type= get_select_post_type('about_slider');

?>
<!--******************About section**********************-->
    <link rel="stylesheet" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-social-buttons/social-buttons-3.css">
<div class="col-wrap bg-dark">
   <div class="container ">
      <div class="row-fluid">
        <div class="span6 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top themeapt_start_animation">       
          <div class="slider-man">
            <div id="slider2" class="imgslider6" style="overflow: hidden;">

            <?php
              if(isset($all_about_slider) && count($all_about_slider) > 0){
                foreach ($all_about_slider as $key => $list) {
                  echo '<img src='."siteadmin/".$list["field_value"].' class="slide" alt="">';
                }
              }
            ?>
              <div id="prev2" class="prev2"><a href="#"><span class="icon-arrow-left-7"></span></a></div>
              <div id="next2" class="next2"><a href="#"><span class="icon-untitled-2"></span></a></div>
              <div class="nav1 navbtn nav-btn">
                <a href="#" class=""></a>
                <a href="#" class="activeSlide"></a>
                <a href="#" class=""></a>
              </div>       
            </div>      
          </div>  
        </div>
        <div class="span6 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left themeapt_start_animation">
            <h1>About</h1>
            
              <div class="hr hr-left  hr-short">
                  <span class="hr-inner">
                      <span class="hr-inner-style"></span>
                  </span>
              </div>
            <p><?php
            if($get_select_post_type){
              echo substr($get_select_post_type['description'],0,500) ;
            }
            ?>
           
            </p>
        </div>

              <div class="form-group">
                <label>
                  <strong>Image Upload </strong>
                </label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="assets/images/avatar-1-xl.jpg" alt="">
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                  <div class="user-edit-image-buttons">
                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                      <input type="file" name="content_preview">
                    </span>
                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                      <i class="fa fa-times"></i> Remove
                    </a>
                  </div>
                </div>
              </div>

      </div>       
    </div>
</div>  
<!--******************end ofAbout section**********************-->




<!--****************** test  Section**********************-->
<div class="col-wrap col-shadow bg bg-ser"><!-- style col-shadow/ col-gray/ testimonial/-->
      <h1>Work Areas</h1> 
        <!--   hr-Start-->  
      <div class="hr hr-left hr-short"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
        <span class="hr-inner">
          <span class="hr-inner-style"></span>
        </span>
      </div>
        <!--   hr-Close-->

      <div class="row-fluid">
        <?php
          if(isset($all_work_areas) && count($all_work_areas) > 0){
            foreach ($all_work_areas as $key => $areas) {  
        ?>
          <!-- Two columns of text below the Box -->
            <div class="span4 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left" style="margin:3px;">    

              <!-- <div style="background-image: url('assets/images/clients/clients_1.jpg'); background-repeat: no-repeat; background-position: center; z-index: 9999;"> -->

                <div class="service2"> <!-- box-style row Class .box-style -->
                  <h2><span class="icon-docs"></span><?php echo $areas['product_name'] ?></h2>
                  <p><?php echo substr($areas['product_details'],0, 100) . '...' ;?></p>
                  <p><a class="button btn-white" href="service-details.php?product_id=<?php echo $areas['product_id'] ?>">Read More</a></p>
                </div><!-- /.spanin -->

              <!-- </div> -->

            </div><!-- /.span4 2 -->
        <?php
         }
         } 
        ?>
      </div>
 
</div><!-- /.col -->  

<!--******************End of Service section**********************-->










<!--******************Section**********************-->
<div class="col-wrap col-shadow bg bg-ser"><!-- style col-shadow/ col-gray/ testimonial/-->
  <div class="container ">
      <h1>Work Areas</h1> 
        <!--   hr-Start-->  
      <div class="hr hr-left hr-short"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
        <span class="hr-inner">
          <span class="hr-inner-style"></span>
        </span>
      </div>
        <!--   hr-Close-->

      <div class="row-fluid">
        <?php
          if(isset($all_work_areas) && count($all_work_areas) > 0){
            foreach ($all_work_areas as $key => $areas) {  
        ?>
          <!-- Two columns of text below the Box -->
            <div class="span4 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left" style="margin:15px;">
              <div class="service2"> <!-- box-style row Class .box-style -->
                <h2><span class="icon-docs"></span><?php echo $areas['product_name'] ?></h2>
                <p><?php echo substr($areas['product_details'],0, 100) . '...' ;?></p>
                <p><a class="button btn-white" href="service-details.php?product_id=<?php echo $areas['product_id'] ?>">Read More</a></p>
              </div><!-- /.spanin -->
            </div><!-- /.span4 2 -->
        <?php
         }
         } 
        ?>
      </div>
 
  </div><!-- /.container -->
</div><!-- /.col -->  

<!--******************End of Service section**********************-->

  <?php
    if(isset($all_certificate) && count($all_certificate) > 0){

      foreach ($all_certificate as $key => $list) {
        if((($key+1)%2)==1){
          echo'<div class="col-wrap col-shadow bg-dark">';
        }else{
          echo'<div class="col-wrap col-shadow bg-light-dark">';
        }
          $name_and_description=($list['field_value_description'])?$list['field_value_description'] :'';
          $name_and_description_slug = explode('_',$name_and_description);
          $certificate_name= $name_and_description_slug[0];
          $certificate_name_slug= explode('^', $certificate_name);
          $certificate_name_slug= implode(' ',$certificate_name_slug);
          $description= $name_and_description_slug[1]
             
  ?>
    <div class="container ">
        <!-- Three columns of text below the carousel -->
      <div class="row-fluid"><!-- box-style row Class .box-style -->
        <div class="span6">   
          <div class="port-box left-al services animationBegin">
            <!-- Close Hover -->
             <a href="#"><img class='themeapt_animated_image themeapt_image themeapt_animate_when_almost_visible left-to-right'  src="<?php echo "siteadmin/".$list["field_value"];?>" alt=""></a>
          </div><!-- /portfolio-item -->            
        </div><!-- /.span4 -->
        <div class="span6 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left">    
          <div class="port-box left-al">
            <!-- Close Hover -->
            <h2><?php echo strtoupper(($certificate_name_slug)?$certificate_name_slug:'');?></h2>      
            <!--   hr-Start-->        
            <div class="hr hr-left  hr-short"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
              <span class="hr-inner">
                <span class="hr-inner-style"></span>
              </span>
            </div>
            <!--   hr-End-->
            <p>
            <?php echo substr((($description)?$description:''),0,400);?>
            </p>
                     
          </div><!-- /portfolio-item -->             
        </div><!-- /.span4 -->
      </div><!-- /.row -->      
    </div>
    <?php    
        }
        }
        echo '</div>';
    ?>
  <!-- /.col --> 



<!--******************Client section**********************-->
<div class="col-wrap col-shadow bg-dark">
  <div class="container ">
      <div class="row-fluid">
          <h1>Our clients</h1>  
      <div class="hr hr-left hr-light">
        <span class="hr-inner">
          <span class="hr-inner-style"></span>
        </span>
      </div>  
      <ul class="pagenavi cl_nav">
        <li><a class="prev" href="#">
        <span class="icon-arrow-left-5"></span>
        </a></li>

        <li><a class="next" href="#">
        <span class="icon-arrow-right-5"></span>
        </a></li>
      </ul>   
      <div class="span12 themeapt-gallery  themeapt_animate_when_visible">
    
        <div class="client themeapt-gallery-thumb">
          <ul>
            <?php
              if(isset($all_client) && count($all_client) > 0){

                foreach ($all_client as $key => $list) {
                  echo '<li><a href="#" class="bwWrapper featured animationBegin"><img src='."siteadmin/".$list["field_value"].' longdesc='."siteadmin/".$list["field_value"].' alt=""></a></li>';
                }
              }else{
            ?>
              <li><a href="#" class="bwWrapper featured animationBegin"><img src="assets/images/clients/clients_1.jpg" alt=""></a></li>
              <li><a href="#" class="bwWrapper featured animationBegin"><img src="assets/images/clients/clients_2.jpg" alt=""></a></li>
              <li><a href="#" class="bwWrapper featured animationBegin"><img src="assets/images/clients/clients_3.jpg" alt=""></a></li>
              <li><a href="#" class="bwWrapper featured animationBegin"><img src="assets/images/clients/clients_4.jpg" alt=""></a></li>
              <li><a href="#" class="bwWrapper featured animationBegin"><img src="assets/images/clients/clients_5.jpg" alt=""></a></li>
              <li><a href="#" class="bwWrapper featured animationBegin"><img src="assets/images/clients/clients_6.jpg" alt=""></a></li> 
            <?php } ?>      
          </ul>
        </div>   
        </div>
      </div>    
  </div>
</div>
<!--******************end of Client section**********************-->
<?php include 'template/footer.php';?>