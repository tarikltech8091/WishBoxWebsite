<?php include 'template/header.php';?>

<?php
if(isset($_REQUEST['contact_email'])&& !empty($_REQUEST['contact_email'])){

	$contact_email= $_REQUEST['contact_email'];

	if (filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {

	     
		 $to = "naim.islam8091@gmail.com";
		 $subject = $_REQUEST['contact_subject'];
		 
		 $message = "<h4>".$_REQUEST['contact_name']."</h4><p>".$_REQUEST['contact_message']."</p>";

		 
		 $header = "From:".$contact_email."  \r\n";
		 $header .= "MIME-Version: 1.0\r\n";
		 $header .= "Content-type: text/html\r\n";
		 
		 $retval = mail($to,$subject,$message,$header);
		 
		 if( $retval == true ) {
		    echo "Message sent successfully...";
		 }else {
		    echo "Message could not be sent...";
		 }

    }else echo "Invalid email address";

}

?> 

<div class="col-wrap bg-light-dark"><!-- style col-shadow/ col-gray/ testimonial/-->
    <!-- style col-shadow/ col-gray/ testimonial/-->
	<div class="container ">
	      <!-- Three columns of text below the carousel -->
	      <div class="row-fluid">
	        <div class="span12 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
				<h1>Get in touch.</h1>
				<!--   hr-Start-->	
				<div class="hr hr-left hr-short"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
					<span class="hr-inner">
						<span class="hr-inner-style"></span>
					</span>
				</div>
				<!--   hr-Close-->		
				<div class="contactform qform">
					<form>
								
						<p class="half">Your Name <span>*</span>
							<input type="text" value="Your Name" name="contact_name" id="subscrib" onblur="if (this.value == ''){this.value = 'Your Name';}" onfocus="if (this.value == 'Your Name'){this.value = '';}"   />						
						</p>
						<p class="half">Your Email <span>*</span>
							<input type="text" value="Your Email" name="contact_email" id="subscrib" onblur="if (this.value == ''){this.value = 'Your Email';}" onfocus="if (this.value == 'Your Email'){this.value = '';}"   />						
						</p>
									
						<!-- <p class="half">Company
							<input type="text" value="Company" name="subscrib" id="subscrib" onblur="if (this.value == ''){this.value = 'Company';}" onfocus="if (this.value == 'Company'){this.value = '';}"   />						
						</p> -->					
						<p>Subject <span>*</span>
							<input type="text" value="Subject" name="contact_subject" id="subscrib" onblur="if (this.value == ''){this.value = 'Subject';}" onfocus="if (this.value == 'Subject'){this.value = '';}"   />						
						</p>
							
						<p>Message <span>*</span>
							<textarea onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" name="contact_message">Type Message</textarea>						
						</p>						
						<p><input type="submit" name="mail_send" value="Send Now" class="submit button purchase btn-sent " /></p>					
					</form>				
				</div><!-- contact-Close -->	
	        </div><!-- /.span8 -->
      </div><!-- /.row -->
	</div>
</div><!-- /.col -->
<div class="col-wrap bg-dark"><!-- style col-shadow/ col-gray/ testimonial/-->
    <!-- style col-shadow/ col-gray/ testimonial/-->
	<div class="container ">
		 <div class="row-fluid">
			<div class="span12">
				<h1>Find us</h1>
				<!--   hr-Start-->	
				<div class="hr hr-left hr-short"> <!--   hr-center/ hr-left/ hr-right/  hr-short/ hr-light/-->
					<span class="hr-inner">
						<span class="hr-inner-style"></span>
					</span>
				</div>
				<!--   hr-Close-->	
				<div id="LocationMap">
					<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/?ie=UTF8&amp;ll=23.724062,90.422239&amp;spn=23.724062,90.422239&amp;t=m&amp;z=14&amp;output=embed"></iframe>
				</div>				
			</div><!-- /.span4 -->
		</div>
	</div>
</div>

<?php include 'template/footer.php';?>