<?php include 'template/header.php';?>

<?php
    /*Profile Add*/
    if(isset($_REQUEST['sign_in'])){
        user_login();
    }
?>

    <div class="contact-area contact-area-v1 panel">

        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6">
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Sign In <small>Or <a href="wish_signup.php" class="color-green">Sign Up</a></small></h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-12 col-md-12">
                            <form class="p-40" action="#" method="post">

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
                                    <input type="text" class="form-control input-lg" name="mobile_no" placeholder="01*********">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control input-lg" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <a href="#" class="forgot-pass-link color-green">Forget Youe Password ?</a>
                                </div>
                                <div class="custom-checkbox mb-20">
                                    <input type="checkbox" id="remember_account" checked>
                                    <label class="color-mid" for="remember_account">Keep me signed in on this computer.</label>
                                </div>
                                <button type="submit" class="btn btn-block btn-lg" name="sign_in">Sign In</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-3"></div>

        </div>

    </div>
    
<?php include 'template/footer.php';?>
