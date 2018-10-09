<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	$get_profile_file = get_profile_file();

	/*Product Add*/
	if(isset($_REQUEST['pdf_file_upload'])){
		profile_file_insert();
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
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="clip-stats"></i>
						Profile File Upload
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
						
							<input type="hidden"  class="form-control" name="post_type" value="profile_file">
							<input type="hidden"  class="form-control" name="width" value="10000">

							<div class="form-group">
								<label>
									Content File
								</label>
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
									<?php
										if(!empty($get_profile_file['field_value'])){
											echo $get_profile_file['field_value'];
										}
									?>
									<img src="assets/images/fileicon.jpg" alt="">
									
									</div>

									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
									<div class="user-edit-image-buttons">
										<span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select file</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
										<input type="file" name="content_filepath" required>
									</span>
									<a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
										<i class="fa fa-times"></i> Remove
									</a>
								</div>
							</div>
							<input class="btn btn-default" type="submit" value="Add" name="pdf_file_upload">
						</form>
					</div>
				</div>
			</div>

		</div>
		<!-- end: PAGE CONTENT-->
	</div>
</div>
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>