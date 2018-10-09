<?php include 'template/header.php';?>
<?php
    /*Profile Add*/
    if(isset($_REQUEST['add_profile'])){
        profile_insert();
    }
?>

    <div class="contact-area contact-area-v1 panel">

        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Sign Up <small>Or <a href="wish_login.php" class="color-green">Sign Up</a></small></h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-12 col-md-12">
                        
                        	<form class="p-40" action="wish_signup.php" method="post">
                        		
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
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control input-lg" name="mobile"  placeholder="01********" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control input-lg" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control input-lg" name="password_confirm" placeholder="Confirm Password" required="">
                                </div>
                                <div class="custom-checkbox mb-20">
                                    <input type="checkbox" id="agree_terms" required="">
                                    <label class="color-mid" for="agree_terms">I agree to the <a href="terms_conditions.html" class="color-green">Terms of Use</a> and <a href="terms_conditions.html" class="color-green">Privacy Statement</a>.</label>
                                </div>

                                <button type="submit" class="btn btn-block btn-lg" name="add_profile">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3"></div>

        </div>

    </div>
    
<?php include 'template/footer.php';?>
