<?php include 'template/header.php';?>
	<div class="col-wrap bg-dark"><!-- style col-shadow/ col-gray/ testimonial/-->
	    <!-- style col-shadow/ col-gray/ testimonial/-->
			<div class="container ">

			  <?php 
			  		if(isset($_GET['product_id']) && !empty($_GET['product_id'])) { 
			  		$all_work_areas_details = work_all_work_areas_details($_GET['product_id']);
			  ?>
			    <!-- Three columns of text below the carousel -->
		      	<div class="row-fluid"><!-- box-style row Class .box-style -->
		        	<div class="span6 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
						<div class="slider-man">
							<div id="slider2" class="imgslider8">
								<?php
									if(isset($all_work_areas_details) && count($all_work_areas_details) > 0){
		                      		foreach ($all_work_areas_details as $key => $list) {
		                      	?>
									  	<img class="slide" alt="" src="<?php echo "siteadmin/".$list['product_image_url'];?>"/>
								<?php
									}
									}else{
										echo '<img src="assets/images/services/default.png" class="slide" alt=""/>';	
									}
								?>
							
								<div id="prev2"  class="prev2"><a href="#"><span class="icon-arrow-left-7"></span></a></div>
								<div id="next2" class="next2"><a href="#"><span class="icon-untitled-2"></span></a></div>
								<div class="nav1 navbtn nav-btn"></div>		
							</div>	
						</div>				  
					</div><!-- /.span6 -->
					<?php
			  			$select_work_areas = select_work_areas($_GET['product_id']);
			  			if(isset($select_work_areas) && count($select_work_areas) > 0){
		                foreach ($select_work_areas as $key => $areas) {
		            ?>
				
					<div class="span6">
						<div class="widget">
						  <h2><?php echo $areas['product_name'] ;?></h2>
								<!--   hr-Start-->			  
							<div class="hr hr-left  hr-light  hr-mid"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
								<span class="hr-inner">
									<span class="hr-inner-style"></span>
								</span>
							</div>
								<!--   hr-End-->
							<p>
								<?php echo substr($areas['product_details'],0,200) ;?>
							</p>					
				        </div><!-- /.widget -->										
			        </div><!-- /.span6 -->
		        <?php
			    	}
					}
	            	}
				?>
			</div>
	</div><!-- /.col -->    
<?php include 'template/footer.php';?>