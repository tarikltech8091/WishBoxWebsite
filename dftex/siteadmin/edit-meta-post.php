<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	/*Get All Post*/
	$get_all_post_type = get_all_post_type();


	/*Meta Post Edit*/
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='edit'){
		$meta_post_edit=meta_post_edit($_REQUEST['edt']);
	}


	/*Meta Post Update*/
	if(isset($_REQUEST['meta_post_update'])){
		meta_post_update($_REQUEST['edt']);
		if(($meta_post_edit['field_name'])== 'gallery'){
			header('Location:gallery.php');
		}elseif(($meta_post_edit['field_name'])== 'client'){
			header('Location:client.php');
		}elseif(($meta_post_edit['field_name'])== 'about_slider'){
			header('Location:slider.php');
		}elseif(($meta_post_edit['field_name'])== 'home_slider'){
			header('Location:home-slider.php');
		}elseif(($meta_post_edit['field_name'])== 'certificate'){
			header('Location:certificate.php');
		}

	}


?>

<!-- start: PAGE -->
<div class="main-content">
	<!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				<!-- start: BREADCRUMB -->
					<?php include('template/bradecrumb.php'); ?>
				<!-- end: BREADCRUMB -->
			</div>
		</div>
		<link rel="stylesheet" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-social-buttons/social-buttons-3.css">
		<!-- end: PAGE HEADER -->
		<!-- start: PAGE CONTENT -->
		<div class="row">
			<div class="col-md-12">
			<div class="panel panel-default">
					<div class="panel-heading">
						<i class="clip-stats"></i>
						Acceptable Size
						<div class="panel-tools">
							<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
							</a>
							<a class="btn btn-xs btn-link panel-close" href="#">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="alert">
					    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
						    <table  border="1" class="table table-bordered">
						    	<thead>
							  	<tr>
							  		<th colspan="2">Home Slider</th>
							  		<th colspan="2">Gallery Image</th>
							  		<th colspan="2">Company Client</th>
							  		<th colspan="2">About Slider</th>
							  		<th colspan="2">Certificate</th>
							  	</tr>
						    		
						    	</thead>
						    	<tbody>
						    	<tr><td>Width</td><td>Height</td><td>Width</td><td>Height</td><td>Width</td><td>Height</td><td>Width</td><td>Height</td><td>Width</td><td>Height</td></tr>
							  	<tr>
							  	<td> 1440 </td> <td> 562 </td> <td> 394 </td> <td> 274 </td><td>198</td><td>120</td><td>475</td><td>303</td><td>474</td><td>268</td>
							  	</tr>

							  	<tr><td> 953 </td> <td>562 </td> <td>394 </td> <td>304 </td></tr>
							  	<tr><td> 842 </td> <td> 562 </td> <td> 259 </td> <td> 351 </td></tr>
							  	<tr><td> 797 </td> <td> 562 </td> <td>369 </td> <td> 251 </td></tr>
							  	<tr><td> 1377 </td> <td> 562 </td> <td> 295 </td> <td> 351 </td></tr>
								</tbody>		
							</table>
						</div>
					</div>
			</div>

			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="clip-stats"></i>
						Edit <?php echo ($meta_post_edit['field_name'])?$meta_post_edit['field_name']:''; ?> image
						<div class="panel-tools">
							<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
							</a>
							<a class="btn btn-xs btn-link panel-close" href="#">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<?php 

						if(isset($_SESSION['alert_message'])){
							$show_message=$_SESSION['alert_message'];

							echo "<div class='alert alert-danger'>";
							echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
						    echo $show_message;
							echo "</div>";
							unset($_SESSION['alert_message']);
						}

						?>

						<form action="" method="POST" enctype="multipart/form-data">

							<input type="hidden" class="form-control" name="post_type" value="<?php echo ($meta_post_edit['field_name'])? $meta_post_edit['field_name']:''; ?>">
							<?php 
							if($meta_post_edit['field_name'] == 'certificate'){
								$name_and_description=($meta_post_edit['field_value_description'])?$meta_post_edit['field_value_description'] :'';
								$name_and_description_slug = explode('_', $name_and_description);
								$certificate_name= $name_and_description_slug[0];
								$certificate_name_slug= explode('^',$certificate_name);
								$certificate_name_slug= implode(' ',$certificate_name_slug);
								$description= $name_and_description_slug[1];

							?>

							<div class="form-group">
								<label>Certificate Name</label>
								<input type="text" class="form-control" name="certificate_name" value="<?php echo strtoupper(($certificate_name_slug)? $certificate_name_slug:''); ?>" required="">
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" cols="90" rows="5"><?php echo ($description)?$description :'';?></textarea>
							</div>
							<?php } ?>


							<div class="form-group">
								<label>
									<strong> Image Upload </strong><br><br>
								</label>
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
									<?php
									if(!empty($meta_post_edit['field_value'])){
										echo '<img src='.$meta_post_edit['field_value'].' alt="">';
									}else
									echo '<img src="assets/images/preview.jpg" alt="">';

									?>
									</div>

									<input type="hidden" name="edit_content_preview" value="<?php echo isset($meta_post_edit['field_value']) ? $meta_post_edit['field_value'] :''; ?>">
									
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
							<input class="btn btn-default" type="submit" value="Update" name="meta_post_update">
						</form>
					</div>
				</div>
			</div>

		</div>
		<!-- end: PAGE CONTENT-->
	</div>
</div>
<script>
    function CertificateconfirmDelete(meta_id) {
     
        var r = confirm("Are you want to Delete??");
        if (r == true) {
           window.location ='certificate.php?action=delete&cer='+meta_id;
        } else {
            return false;
        }  
    }
</script>
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>