<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	/*Product Add*/
	if(isset($_REQUEST['product_image_add'])){
		product_image_insert();
	}

	$all_product_list = get_all_product();


	/*Product Image Delete*/
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='delete') && isset($_REQUEST['pro_img']) && !empty($_REQUEST['pro_img'])){

		product_image_delete($_REQUEST['pro_img']);
		header('Location:product-details.php');

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
						Add Work Area Image
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
							  <tr><td><strong>Acceptable Size,</strong></td><td><br>
							  	<tr><td> Width :816 </td> <td> Height :612 </td></tr>
							  	<tr><td> Width :296 </td> <td> Height :270 </td></tr>
							  	<tr><td> Width :650 </td> <td> Height :426 </td></tr>
							  	<tr><td> Width :1024 </td> <td> Height :1024 </td></tr>
							  </table>
							</div>

							<div class="form-group">
								<label><strong> Work Area </strong></label>
								<select name="product_id" class="form-control" required>
									<option value="">Select Work Area</option>
									<?php
									 if(count($all_product_list) > 0) {
										foreach ($all_product_list as $key => $list) {
											echo '<option value='.$list['product_id'].'>'.$list["product_name"].'</option>';
										}
									  }
									?>
								</select>
							</div>

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
							<input class="btn btn-default" type="submit" value="Add" name="product_image_add">
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
								All Work Area Image
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
											<th>Work Area</th>
											<th>Work Area Details</th>
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
	                               
	                                    $all_product_image_list = all_product_image_pagination_list($start_from,$num_rec_per_page);

	                                    $all_product_image= $all_product_image_list['all_product'];
	                                    $total_records = $all_product_image_list['total_records'];

										if(isset($all_product_image) && count($all_product_image) > 0){

											foreach ($all_product_image as $key => $product) {
												echo "<tr>";
												echo '<td>'.($key+1).'</td>';
												echo '<td>'.$product["product_name"].'</td>';
												echo '<td><img width="150px" height="100px" src='.$product["product_image_url"].'></td>';
												echo '<td>'.$product["created_by"].'</td>';
												echo '<td class="center">';
												echo '<a href="edit-product-details.php?action=edit&pro_img='.$product["product_image_id"].'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
												echo '<a onclick="ProductImageconfirmDelete('.$product['product_image_id'].')" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>';
												echo '</td>';

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
    function ProductImageconfirmDelete(product_image_id) {
     
        var r = confirm("Are you want to delete??");
        if (r == true) {
           window.location ='product-details.php?action=delete&pro_img='+product_image_id;
        } else {
            return false;
        }  
    }
</script>
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>