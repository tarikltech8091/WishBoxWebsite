<?php
$all_home_slider = get_all_home_slider();

?>
    <!-- Revolution Slider
    ================================================== -->
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<ul>
			<?php
                    if(isset($all_home_slider) && count($all_home_slider) > 0){

                      foreach ($all_home_slider as $key => $list) {
                        echo '<li data-transition="3dcurtain-vertical" data-slotamount="5" data-masterspeed="300" data-thumb=""><img src='."siteadmin/".$list["field_value"].' alt=""></li>';
                      }
                    }

            ?>
							
			</ul>

			<div class="tp-bannertimer"></div>
		</div>
	</div>	<!--/fullwidthbanner-container-->
