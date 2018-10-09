<?php include 'template/header.php';?>
<?php 

    /*logged in check*/
    if(loggedin() != 1){

        header('Location:wish_login.php');
        die();

    }

    /* update profile */
    if(isset($_REQUEST['update_profile'])){
        update_profile($_SESSION['user_id']);
    }

    $user_info=get_user_detail($_SESSION['user_id']);
    if(!empty($user_info)){
        $point= $user_info['POINT'];
        $F_NAME= $user_info['F_NAME'];
        $L_NAME= $user_info['L_NAME'];
        $EMAIL= $user_info['EMAIL'];
        $MOBILENO= $user_info['MOBILENO'];
        $DOB= $user_info['DOB'];
        $GENDER= $user_info['GENDER'];
        $RELIGION= $user_info['RELIGION'];
        $ZIP= $user_info['ZIP'];
        $ADDRESS= $user_info['ADDRESS'];
    }
    
?>

    <!-- Contact Us Area -->
    <div class="contact-area contact-area-v1 panel">

        <div class="ptb-30 prl-30">
            <div class="row row-tb-20">

                <div class="col-xs-3 col-md-3"></div>
                
                <div class="col-xs-6 col-md-6">
                    <div class="contact-area-col contact-form">
                        <h3 class="t-uppercase h-title mb-20">Edit Profile-(100 points required to access.)</h3>

                        <div id="alldata">
                            <div class="form-group">
                                <center>
                                    <label>Your Score is</label>
                                </center>
                                <center>
                                    <b style="color: #C3404E">
                                        <input type="text" class="form-control" name="point" value="<?php echo isset($point)?$point:''; ?>" style="border: none;border-color: transparent;font-size: 20px;text-align: center;color: #C3404E" readonly>
                                    </b>
                                </center>
                            </div>
                        </div>


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
                                <label>First Name</label>
                                <input type="text" name="first_name" value="<?php echo isset($F_NAME)? $F_NAME :'' ?>" class="form-control first_name" onChange="changeItem()">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" value="<?php echo isset($L_NAME) ?$L_NAME :'' ?>"  class="form-control last_name" onChange="changeItem()">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" value="<?php echo isset($EMAIL) ?$EMAIL :'' ?>"  onChange="changeItem()" class="form-control email">
                            </div>

                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text"  class="form-control mobile_no" name="mobile_no"  value="<?php echo isset($MOBILENO) ?$MOBILENO :'' ?>" onChange="changeItem()" placeholder="" readonly="">
                            </div>

                            <div class="form-group">
                                <label>Birthday (DD/MM/YYYY)</label>
                                <input type="text"  class="form-control birthday" name="birthday"  value="<?php echo isset($DOB) ?$DOB :'' ?>" onChange="changeItem()" placeholder="30/09/2018">
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender"  class="form-control gender" onChange="changeItem()">
                                    <option value="">Select Gender</option>
                                    <option <?php echo isset($GENDER) && $GENDER == 'Male' ? 'selected' :'' ?> value="Male">Male</option>
                                    <option <?php echo isset($GENDER) && $GENDER == 'Female' ? 'selected' :'' ?> value="Female">Female</option>
                                    <option <?php echo isset($GENDER) && $GENDER == 'Other' ? 'selected' :'' ?> value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Religion</label>
                                <input type="text"  class="form-control religion" name="religion" value="<?php echo isset($RELIGION) ?$RELIGION :'' ?>"  onChange="changeItem()">
                            </div>

                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text"  class="form-control zip_code" name="zip_code" value="<?php echo isset($ZIP) ?$ZIP :'' ?>"  onChange="changeItem()">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control address" rows="5" onChange="changeItem()"><?php echo isset($ADDRESS)? $ADDRESS :'' ?> </textarea>
                            </div>

                            <div class="input-group">
                                <center>
                                    <button type="submit" class="form-control btn" name="update_profile">Submit</button>
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

    <script>
        function changeItem(){

            var fname= $('.first_name').val();
            var lname= $('.last_name').val();
            var email= $('.email').val();
            var mob= $('.mobile_no').val();
            var address= $('.address').val();
            var bday= $('.birthday').val();
            var gender= $('.gender').val();
            var zip= $('.zip_code').val();
            var religion= $('.religion').val();

            //if(mob.length!=0 || value1.length !=0 || value3.length !=0){

                var xmlhttp = new XMLHttpRequest();
                var url = "get_point.php?id1=" + fname + "&id2=" +lname + "&id3=" +email + "&id4=" +mob + "&id5=" +address + "&id6=" +bday + "&id7=" +gender + "&id8=" +zip + "&id10=" +religion;

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var arr = xmlhttp.responseText;
                        $('#alldata').html(arr);
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            //}

        }
    </script>

<?php include 'template/footer.php';?>
