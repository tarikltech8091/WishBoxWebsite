<?php include 'template/header.php';?>
<?php $get_profile_file=get_profile_file(); ?>
<div class="col-wrap portfolio-page bg-dark"><!-- style col-shadow/ col-gray/ testimonial/-->
	<div class="container">
		<iframe src="http://docs.google.com/gview?url=http://dftexltd.com/<?php echo "siteadmin/".$get_profile_file['field_value']."&embedded=true"; ?>" style="width:100%; height:700px;" frameborder="0" scrolling="no"></iframe>
	</div>  
</div>
<?php include 'template/footer.php';?>