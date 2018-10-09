<?php include 'template/header.php';?>
<?php 

    /*logged in check*/
    if(loggedin() != 1){

        header('Location:wish_login.php');
        die();

    }

    /* add event */
    if(isset($_REQUEST['add_event'])){
        event_insert();
    }

    $user_info=get_user_detail($_SESSION['user_id']);
        if(!empty($user_info)){
            $point= $user_info['POINT'];
        }
    $user_fnf_info=get_user_fnf_detail($_SESSION['user_id']);

?>
    <!-- Contact Us Area -->
    <div class="contact-area contact-area-v1 panel">

        <div class="ptb-30 prl-30">
            <div class="row row-tb-20">
                <div class="col-xs-3 col-md-3"></div>
                <div class="col-xs-6 col-md-6">
                    <?php 
                        if(isset($point) && $point >= 100){
                    ?>
                        <div class="contact-area-col contact-form">
                            <h3 class="t-uppercase h-title mb-20">Create Event</h3>


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
                            

                            <form action="#" method="post">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <select name="event_name"  class="form-control">
                                        <option value="">Select Event</option>
                                        <option value="birthday">Birthday</option>
                                        <option value="anniversary">Anniversary</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Friend Name</label>
                                    <select name="event_fnf_id"  class="form-control">
                                        <option value="">Select Friend</option>
                                        <?php
                                            if (!empty($user_fnf_info)) {
                                                foreach ($user_fnf_info as $key => $value) {
                                        ?>
                                                    <option value="<?php echo $value['FNF_ID']; ?>"><?php echo $value['FNF_NAME'].' ('.$value['FNF_MOBILE'].')'; ?></option>
                                        <?php
                                                }
                                                    
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                         <i class="fa fa-calendar">
                                         </i>
                                        </div>
                                        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
                                   </div>
                                </div>


                                    <input type="hidden" class="form-control" name="gift_id" value="1">

                                <div class="form-group">
                                    <label>Gift Type</label>
                                    <select name="gift_type" class="form-control">
                                        <option value="">Gift Type</option>
                                        <option value="free">Free</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <strong>Image Upload</strong>
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

                                <div class="input-group">
                                    <center>
                                        <button type="submit" class="form-control btn" name="add_event">Submit</button>
                                    </center>
                                </div>
                            </form>

                        </div>
                    <?php
                    }else{
                    ?>
                        <div class="contact-area-col contact-form">
                            <h3></h3>
                            <center>
                                <p>You do not create any event. Because you have to required update your profile.</p>
                                <p><a href="wish_edit_profile.php">Click Here</a> to update profile</p>
                            </center>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="col-xs-3 col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- End Contact Us Area -->

<?php include 'template/footer.php';?>
