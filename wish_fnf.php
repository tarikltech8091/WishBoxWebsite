<?php include 'template/header.php';?>
<?php

    /*logged in check*/
    if(loggedin() != 1){

        header('Location:wish_login.php');
        die();
    }

    /*FNF Add*/
    if(isset($_REQUEST['add_fnf'])){
        fnf_insert();
    }


?>

    <!-- Contact Us Area -->
    <div class="contact-area contact-area-v1 panel">
        <div class="ptb-30 prl-30">
            <div class="row row-tb-20">
                <div class="col-xs-3 col-md-3"></div>
                <div class="col-xs-6 col-md-6">
                    <div class="contact-area-col contact-form">
                        <h3 class="t-uppercase h-title mb-20">Create FNF</h3>

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
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required="required">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender"  class="form-control">
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text"  class="form-control" name="mobile_no" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label>Relation</label>
                                <input type="text"  class="form-control" name="relation">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="5" class="form-control" required="required"></textarea>
                            </div>


                            <div class="input-group">
                                <center>
                                    <button type="submit" class="form-control btn" value="Add" name="add_fnf">Submit</button>
                                </center>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xs-3 col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- End Contact Us Area -->

<?php include 'template/footer.php';?>

