<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
	}

	/*Social Link Add*/
	if(isset($_REQUEST['social_site_link_add'])){
		social_link_insert();
	}


	/*Social Link Delete*/
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='delete') && isset($_REQUEST['ssl']) && !empty($_REQUEST['ssl'])){

		social_link_delete($_REQUEST['ssl']);
		header('Location:social-site-link.php');

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
						Add Social Site Link
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
							<div class="form-group">
								<label>Social Site Name</label>
								<input type="text" class="form-control" name="social_site_name" required="">
							</div>
							<div class="form-group">
								<label>Social Site Url</label>
								<input type="text" class="form-control" name="social_site_url" required="">
							</div>
							<div class="form-group">
								<label>Social Site Icon Class (if any)</label>
								<input type="text" class="form-control" name="social_site_icon_class">
							</div>

								<input type="hidden"  class="form-control" name="post_type" value="social_link">

							<input class="btn btn-default" type="submit" value="Add" name="social_site_link_add">
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
								Company Social Site Link List
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
											<th>Social Site Name</th>
											<th>Social Site Url</th>
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
	                               
	                                    $all_social_site_list = social_link_pagination_list($start_from,$num_rec_per_page);

	                                    $all_social_site= $all_social_site_list['all_social_site'];
	                                    $total_records = $all_social_site_list['total_records'];

										if(isset($all_social_site) && count($all_social_site) > 0){

											foreach ($all_social_site as $key => $list) {
												echo "<tr>";
												echo '<td>'.($key+1).'</td>';
												echo '<td>'.$list["social_site_name"].'</td>';
												echo '<td>'.$list["social_site_url"].'</td>';
												echo '<td>'.$list["created_by"].'</td>';
												echo '<td class="center">';
												echo '<a href="edit-social-site-link.php?action=edit&ssl='.$list["social_link_id"].'" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>';
												echo '<a onclick="SocialSiteDelete('.$list['social_link_id'].')" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>';
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
    function SocialSiteDelete(social_link_id) {
     
        var r = confirm("Are you want to Delete??");
        if (r == true) {
           window.location ='social-site-link.php?action=delete&ssl='+social_link_id;
        } else {
            return false;
        }  
    }
</script>
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>