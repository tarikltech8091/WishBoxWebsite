<?php include 'template/header.php';?>
<?php
	$all_gallery = get_all_gallery();
?>
<div class="col-wrap"><!-- style col-shadow/ col-gray/ testimonial/-->
    <!-- style col-shadow/ col-gray/ testimonial/-->
	<div class="container ">
	      <!-- Three columns of text below the carousel -->
	    <div class="span12">
			<!-- This is all the XHTML ImageFlow needs -->
			<div id="myImageFlow" class="imageflow">
			<?php
                    if(isset($all_gallery) && count($all_gallery) > 0){

                      foreach ($all_gallery as $key => $list) {
                        echo '<img src='."siteadmin/".$list["field_value"].' longdesc='."siteadmin/".$list["field_value"].' width="394" height="274" alt="">';
                      }
                    }

            ?>
			</div>		
		</div><!-- /.span4 -->
	</div>
</div><!-- /.col -->    
<?php include 'template/footer.php';?>