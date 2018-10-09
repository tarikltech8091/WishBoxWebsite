<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	/*Product Add*/
	if(isset($_REQUEST['product_add'])){
		product_insert();
	}

	/*Product Delete*/
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='delete') && isset($_REQUEST['pro']) && !empty($_REQUEST['pro'])){

		product_delete($_REQUEST['pro']);
		header('Location:products.php');

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
		<!-- end: PAGE HEADER -->
		<!-- start: PAGE CONTENT -->
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="clip-stats"></i>
						Add Work Area
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

						<form action="" method="POST" >
							<div class="form-group">
								<label>Work Area Name</label>
								<input type="text"  class="form-control" name="product_name" required>
							</div>
							<div class="form-group">
								<label>Work Area Details</label>
								<textarea cols="10" rows="8" class="form-control" name="product_details" required></textarea>
							</div>
							<input class="btn btn-default" type="submit" value="Add" name="product_add">
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
								All Work Area
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
	                               
	                                    $all_product_list = all_product_pagination_list($start_from,$num_rec_per_page);

	                                    $all_product= $all_product_list['all_product'];
	                                    $total_records = $all_product_list['total_records'];

										if(isset($all_product) && count($all_product) > 0){

											foreach ($all_product as $key => $product) {
												echo "<tr>";
												echo '<td>'.($key+1).'</td>';
												echo '<td>'.$product["product_name"].'</td>';
												echo '<td>'.$product["product_details"].'</td>';
												echo '<td class="center">';
												echo '<a href="edit-product.php?action=edit&pro='.$product["product_id"].'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
												echo '<a onclick="ProductconfirmDelete('.$product['product_id'].')"  class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>';
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
    function ProductconfirmDelete(product_id) {
     
        var r = confirm("Are you want to delete??");
        if (r == true) {
           window.location ='products.php?action=delete&pro='+product_id;
        } else {
            return false;
        }  
    }
</script>

<!-- end: PAGE -->
<?php include('template/footer.php'); ?>