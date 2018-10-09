<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	/*Product Add*/
	if(isset($_REQUEST['certificate_image_add'])){
		post_type_image_insert();
	}

	$get_post_type = get_post_type('certificate');
	// $get_all_post_type = get_all_gallery('gallery');


	/*Certificate Delete*/
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='delete') && isset($_REQUEST['cer']) && !empty($_REQUEST['cer'])){

		meta_post_delete($_REQUEST['cer']);
		header('Location:certificate.php');

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
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="clip-stats"></i>
						Add Certificate Image
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
							<div class="alert">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
							  <table>
							  	<tr><td><strong>Acceptable Size:</strong><tr><td>
							  	<tr><td> Width :474 </td> <td> Height :268 </td></tr>
							  </table>
							</div>

							<div class="form-group">
								<label><strong>Certificate Name</strong></label>
								<input type="text" class="form-control" name="certificate_name" required="">
							</div>
							<div class="form-group">
								<label><strong>Description</strong></label>
								<textarea name="description" cols="60" rows="5"></textarea>
							</div>

								<input type="hidden"  class="form-control" name="post_type" value="certificate">
								<input type="hidden"  class="form-control" name="height" value="8000">
								<input type="hidden"  class="form-control" name="width" value="10000">

							<div class="form-group">
								<label>
									<strong> Image Upload </strong>
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
							<input class="btn btn-default" type="submit" value="Add" name="certificate_image_add">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="clip-pie"></i>
								All Certificate Image
								<div class="panel-tools">
									<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
									</a>
									<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
										<i class="fa fa-wrench"></i>
									</a>
									<a class="btn btn-xs btn-link panel-refresh" href="#">
										<i class="fa fa-refresh"></i>
									</a>
									<a class="btn btn-xs btn-link panel-close" href="#">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
							<div class="panel-body">

								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Image Type</th>
											<th>Image</th>
											<th>Created By</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
	                                    $num_rec_per_page=5;
	                                    if(!empty($_GET)){

	                                        $request_url = getUrlGenerator($_GET);

	                                        $get_url =$request_url;

	                                    }else $get_url='';

	                                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	                                    $start_from = ($page-1)*$num_rec_per_page;
	                               
	                                    $all_slider_image_list = get_post_image_pagination('certificate',$start_from,$num_rec_per_page);

	                                    $all_slider_image= $all_slider_image_list['all_post_type'];
	                                    $total_records = $all_slider_image_list['total_records'];

										if(isset($all_slider_image) && count($all_slider_image) > 0){

											foreach ($all_slider_image as $key => $list) {
												echo "<tr>";
												echo '<td>'.($key+1).'</td>';
												echo '<td>'.$list["post_type_name"].'</td>';
												echo '<td><img width="150px" height="100px" src='.$list["field_value"].'></td>';
												echo '<td>'.$list["created_by"].'</td>';
												echo '<td class="center">';
												echo '<a href="edit-meta-post.php?action=edit&edt='.$list["meta_id"].'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
												echo '<a onclick="CertificateconfirmDelete('.$list['meta_id'].')" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>';
												echo '</td>';
												echo '</tr>';

											}
										}else{
											echo "<tr>";
											echo '<td colspan="4"> No data available</td>';
											echo '</tr>';
										}

										?>
									</tbody>
								</table>

								<?php
									$paginatoion = paginationGenerator($num_rec_per_page,$total_records);
									if(!empty($paginatoion))
								 		echo $paginatoion;
								 ?>

							</div>
						</div>
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