<?php include('template/header.php'); ?>
<?php  

/*Login submit*/
if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])){

   $login_admin = user_login();

   if($login_admin==1)
      header('Location:index.php');
 }
/*Logout submit*/
if(isset($_REQUEST['action'])&& ($_REQUEST['action']=='logout')){

	 $logout = logout();
	  if($logout==1){
	   
		   header('Location:login.php'); 
		}

}

/*logged in check*/

if(loggedin()==1){

	header('Location:index.php');
	die();
}


?>
<!-- start: PAGE -->
	<div class="main-login col-sm-4 col-sm-offset-4">
			<div class="logo">D.F Tex<i class="clip-clip"></i>WEB
			</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login" style="display:block;">
				<h3>Sign in to your account</h3>
				<p>
					Please enter your name and password to log in.
				</p>
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
				<form class="form-login" action="" method="post">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Password" required>
								<i class="fa fa-lock"></i>
							</span>
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-bricky pull-right">
								Login <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						
					</fieldset>
				</form>
			</div>
			<div class="copyright"><?php echo date('Y');?> &copy; Live Technologies.</div>
	</div>
			<!-- end: LOGIN BOX -->
<!-- end: PAGE -->
<?php include('template/footer.php'); ?>
