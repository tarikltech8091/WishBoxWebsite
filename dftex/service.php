<?php include 'template/header.php';?>
<?php
$get_all_work_areas= get_all_work_areas();
?>
<div class="col-wrap portfolio-page bg-dark"><!-- style col-shadow/ col-gray/ testimonial/-->
    <!-- style col-shadow/ col-gray/ testimonial/-->
    <div class="b-pad">
		<div class="container ">
			<h1>Services</h1> 			
			<!--   hr-Start-->  
			<div class="hr hr-left hr-short"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
			    <span class="hr-inner">
			      <span class="hr-inner-style"></span>
			    </span>
			</div>		
			<div class="pagenavi p-nav">
				<ul>
					<li><a href="service.php">All</a></li>
					<?php
						if(isset($get_all_work_areas) && count($get_all_work_areas) > 0){
	              		foreach ($get_all_work_areas as $key => $list) {
			        ?>
						<li><a href="service.php?product_id=<?php echo $list['product_id'];?>"><?php echo $list['product_name'];?></a></li>

					<?php }} ?>				
				</ul>
			</div> <!-- /.page-root -->
		</div> <!-- /.container -->
	</div><!-- /.title-bar -->	
	<div class="container ">
	     <div class="row-fluid no-mar  portfolio_page"><!-- box-style row Class .box-style -->
			<div id="portfolio_hover">
				<ul class="nolist pro gallery">

				<?php
			  		if(isset($_GET['product_id']) && !empty($_GET['product_id'])) { 
			  		$get_select_work_area_details = work_all_work_areas_details($_GET['product_id']);
					// $get_select_work_area_details= work_all_work_areas_details(3);
					if(isset($get_select_work_area_details) && count($get_select_work_area_details) > 0){
              		foreach ($get_select_work_area_details as $key => $areas) {
		        ?>

					<li class="span4 p_items portfolio jacquard">
						<a rel="prettyPhoto[gallery1]" href="<?php echo 'siteadmin/'.$areas["product_image_url"];?>" >
							<div class="hover"><div class="iconhover"></div></div>
							<img class='themeapt_animated_image themeapt_image themeapt_animate_when_almost_visible left-to-right' src="<?php echo 'siteadmin/'.$areas["product_image_url"];?>" alt="" />
							<div class="title"><h4><?php echo $areas["product_name"];?></h4></div>
							<div class="alignright"><i class="icon-heart"></i> 77	</div>
						</a>
					
					</li>


				<?php
				}
				}
				}else{ 
					$get_all_work_area_details= get_all_work_area_details();
					if(isset($get_all_work_area_details) && count($get_all_work_area_details) > 0){
              		foreach ($get_all_work_area_details as $key => $all_areas) {
				?>


					<li class="span4 p_items portfolio jacquard">
						<a rel="prettyPhoto[gallery1]" href="<?php echo 'siteadmin/'.$all_areas["product_image_url"];?>" >
							<div class="hover"><div class="iconhover"></div></div>
							<img class='themeapt_animated_image themeapt_image themeapt_animate_when_almost_visible left-to-right' src="<?php echo 'siteadmin/'.$all_areas["product_image_url"];?>" alt="" />
							<div class="title"><h4><?php echo $all_areas["product_name"];?></h4></div>
							<div class="alignright"><i class="icon-heart"></i> 77	</div>
						</a>
					
					</li>


				<?php }}} ?>	
					
				
			</ul>
		</div>            		
		<!-- /portfolio -->
			
      </div><!-- /.row --> 
	        
	</div>
</div><!-- /.col -->    
<?php include 'template/footer.php';?>