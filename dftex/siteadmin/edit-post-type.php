<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	/*Product Add*/
	if(isset($_REQUEST['post_type_add'])){
		post_type_insert();
	}


	/*Post Type Edit*/
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='edit'){
		$post_type_edit=post_type_edit($_REQUEST['p_type']);
	}

	/*Post Type Update*/
	if(isset($_REQUEST['post_type_update'])){
		post_type_update($_REQUEST['p_type']);
		header('Location:post_type.php');
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
						Edit Post Type
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
								<label>Post Type Name</label>
								<input type="text"  class="form-control" name="post_type_name" value="<?php echo isset($post_type_edit['post_type_name']) ? $post_type_edit['post_type_name'] :''; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="description" cols="60" rows="8"><?php echo isset($post_type_edit['description']) ? $post_type_edit['description'] :''; ?></textarea>
							</div>
							<input class="btn btn-default" type="submit" value="Update" name="post_type_update">
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
								All Post Type
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
											<th>Post type Name</th>
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
	                               
	                                    $all_post_list = get_all_post_type_pagination_list($start_from,$num_rec_per_page);

	                                    $all_post= $all_post_list['all_post_type'];
	                                    $total_records = $all_post_list['total_records'];

										if(isset($all_post) && count($all_post) > 0){

											foreach ($all_post as $key => $list) {
												echo "<tr>";
												echo '<td>'.($key+1).'</td>';
												echo '<td>'.$list["post_type_name"].'</td>';
												echo '<td>'.$list["created_by"].'</td>';
												echo '<td class="center">';
												echo '<a href="edit-post-type.php?action=edit&p_type='.$list["post_id"].'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
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
    function PostconfirmDelete(post_id,post_name_slug) {
     
        var r = confirm("Are you want to delete??");
        if (r == true) {
           window.location ='post_type.php?action=delete&p_type='+post_id+'pn_type='+post_name_slug;
        } else {
            return false;
        }  
    }
</script>
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>