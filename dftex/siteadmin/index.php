<?php include('template/header.php'); ?>
<?php

	/*logged in check*/
	if(loggedin() !=1){

		header('Location:login.php');
		die();
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
		
			<div class="col-md-6">
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
			</div>

			<div class="col-md-12 dashboard_btn">
				<div class="col-md-3">
					<a href="products.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-pencil circle-icon circle-bricky"></i>
								<h2>Work Area Basic</h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="product-details.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-folder-open circle-icon circle-green"></i>
								<h2>Work Area Details</h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="home-slider.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-cog-2 circle-icon circle-teal"></i>
								<h2>Home Slide</h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="slider.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-screen  circle-icon circle-green"></i>
								<h2>About Slider</h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="gallery.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-attachment-2 circle-icon circle-green"></i>
								<h2>Gallery</h2>
							</div>
							
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="client.php">
						<div class="core-box">
							<div class="heading">
								<i class="fa fa-users circle-icon circle-teal"></i>
								<h2>Client</h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="certificate.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-file circle-icon circle-green"></i>
								<h2>Certificate</h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="profile-file-upload.php">
						<div class="core-box">
							<div class="heading">
								<i class="clip-attachment-2 circle-icon circle-bricky"></i>
								<h2>Profile File Upload</h2>
							</div>
						</div>
					</a>
				</div>
			</div>


		</div>
		<!-- end: PAGE CONTENT-->
	</div>
</div>
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>