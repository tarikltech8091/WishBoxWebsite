<?php
session_start();
ob_start();
ob_flush();
/*****************************
##  Function File
*******************************/
include('classlogger.php');

date_default_timezone_set('Asia/Dhaka');

 $DBNAME = 'wb_data';
 $KEY 	 = 'dhfakHueyrer93KJr4042diJri0Nfk';
 $DBHOST = 'localhost';
 $DBUSER = 'root';
 $DBPASS = '1234';


define('TBL_USER','web_users');
define('TBL_EVENT','event_tbl');
define('TBL_FNF','fnf_tbl');
define('TBL_POST','gift_tbl');
define('TBL_PROFILE','profile_tbl');



/************* LOCAL ************************/



function get_database_connection()
{
	global $DBHOST,$DBUSER,$DBPASS,$DBNAME;


	$link= mysqli_connect($DBHOST,$DBUSER,$DBPASS,$DBNAME);

	if(!$link)
	{
		die('Could not connect:'.mysqli_connect_error());
	}
	return $link;



}

/**********************************************************

## Function for user_login
## Parm: username and PassWord
## Return: name
*************************************************************/

function user_login(){

	global $DBNAME,$KEY;

	$mobile_no = isset($_REQUEST['mobile_no']) ? $_REQUEST['mobile_no'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '0';
	
	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME)or die('Cannot select DB');

	$password=md5($password);

	$sql=mysqli_query($db_connect,"SELECT * FROM ".TBL_PROFILE." WHERE MOBILENO='$mobile_no' AND PASSWORD='$password'");

	if($sql){

		$row=mysqli_fetch_assoc($sql);

		if(!empty($row)){

			$user_id = $row['USER_ID'];
			$now = date('Y-m-d H:i:s');

			$sql = mysqli_query($db_connect,"UPDATE ".TBL_PROFILE." SET STATUS=1 where USER_ID='$user_id'");

				if($sql){
					$date=date('Y_m_d');

						// $log = new Logger("logs/authlog/auth");
						// $log->logWrite("$username|Logged In");

						$encrypt_mobile_no = encrypt($mobile_no, $KEY);
						$encrypt_user_id = encrypt($user_id, $KEY);

						// $_SESSION['mobile_no']=$encrypt_mobile_no;
						// $_SESSION['user_id']=$encrypt_user_id;

						$_SESSION['mobile_no']=$mobile_no;
						$_SESSION['user_id']=$user_id;
						$_SESSION['alert_message']='Successfully Logged In.';
						return 1;

				}else{

					$_SESSION['alert_message']='Email and Password combinations are invalid.';
					return 4;
				}
			
		}else{

			$_SESSION['alert_message']='You are not Registered.';
			return 3;
		} 

	}else{
		$_SESSION['alert_message']='You are not Registered.';
		return 2;
	} 

	

}


/**********************************************************

## Function for encrypt
## Parm: user_id
## Return: result
*************************************************************/
function encrypt($string, $key) {
		$result = '';
		$str_len= strlen($string);
		for($i=0; $i<$str_len; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
		
	}

/**********************************************************

## Function for decrypt
## Parm: user_id
## Return: result
*************************************************************/
function decrypt($string, $key) {
	$result = ' ';
	$string = base64_decode($string);
	$str_len = strlen($string);
	for($i=0; $i<$str_len; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key,($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
		return $result;
}


/***********
### Loginchek
***************/
function loggedin(){

	if(isset($_SESSION['user_id'])){
		$session_value=$_SESSION['user_id'];
	
		if(isset($session_value) && !empty($session_value))
			return 1;
		else return 0;
		
	}else return 0;

}

/***********
### Logout
***************/

function logout(){

	global $DBNAME,$KEY;

	if(isset($_SESSION['user_id'])){

		// $user_id = decrypt($_SESSION['user_id'], $KEY);
		// $mobile_no = decrypt($_SESSION['mobile_no'], $KEY);

		$user_id = $_SESSION['user_id'];
		$mobile_no = $_SESSION['mobile_no'];

	    $now = date('Y-m-d H:i:s');
		$db_connect = get_database_connection();

		mysqli_select_db($db_connect,$DBNAME)or die('Cannot select DB');

		$sql = mysqli_query($db_connect,"UPDATE ".TBL_PROFILE." SET STATUS=0 where USER_ID='$user_id'");

		if($sql){

			 unset($_SESSION['mobile_no']);
			 unset($_SESSION['user_id']);
			 $_SESSION['alert_message']='Successfully Logged Out.';
			 // $log = new Logger("logs/authlog/auth");
	   		 // $log->logWrite("$username|Logged OUT");
	    	return 1;
		}else{

			$_SESSION['alert_message']='Something Wrong. Please Try again !!!.';
			return 0;
		}

	   
	   
	}else return 2;

	
}

/*********************
### get_username
**********************/

function get_username(){

	global $KEY;

	if(isset($_SESSION["username"])){
		$session_value=$_SESSION["username"];

		// $username = decrypt($session_value, $KEY);
		$username = $session_value;
		return $username;

	}else return false;

}


/*********************
### get_userid
**********************/

function get_userid(){

	global $KEY;

	if(isset($_SESSION["user_id"])){
		$session_value=$_SESSION["user_id"];

		$user_id = $session_value;
		return $user_id;

	}else return false;

}



/**********************************************************
## Function for get_call_status
## Parm: $shortcode
## Return: report
*************************************************************/

function get_user_detail($user_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PROFILE." WHERE USER_ID='$user_id'");

	$row=mysqli_fetch_array($sql);


	return $row;


}



/**********************************************************
## Function for get_all_date
## Parm: $from_date,$to_date
## Return: $days
*************************************************************/

function get_all_date($from_date,$to_date){
	$days = array();
	$stop = strtotime($to_date);
	for ($current = strtotime($from_date); $current <= $stop; $current = strtotime('+1 days', $current)) {
		$days[] = date('Y-m-d', $current);
	}
	
	return $days;
}

/***********
### update credit limit
***************/

function update_credit($sent){

	global $DBNAME,$KEY;



	if(isset($_COOKIE["instant_sms_user_id"]))
		$user_id = decrypt($_COOKIE["instant_sms_user_id"], $KEY);
	if(isset($_COOKIE["instant_sms_user_credit_limit"]))
	 $user_credit_limit = decrypt($_COOKIE['instant_sms_user_credit_limit'], $KEY);

  	$remain_limit = ($user_credit_limit-$sent);
	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME)or die('Cannot select DB');

	$sql = mysqli_query($db_connect,"UPDATE ".TBL_USER." SET credit_limit='$remain_limit' where user_id='$user_id'");


	setcookie("instant_sms_user_credit_limit", encrypt($remain_limit, $KEY), time()+3600*4, '/');


    return 1;
}



/**********************************
## Function for getUrlGenerator
## Parm: $_GET
## Return: true/false
***************/

function getUrlGenerator($url){

	$request_url = '';
	$flag=0;
 	foreach ($url as $key => $value) {

 		if(!empty($value) && ($key != 'page')){
 			
	 			$request_url .= '&'.$key.'='.$value;
 		}
 	}
 	return $request_url;
}


/**********************************
## Function for paginationGenerator
## Parm: $_GET
## Return: true/false
***************/
function paginationGenerator($num_rec_per_page,$total_records){

	if($total_records <= $num_rec_per_page)
		return false;

	$pagename = basename($_SERVER['PHP_SELF']);

	if(!empty($_GET))
		$request_url = getUrlGenerator($_GET);
	else $request_url='';

	if(isset($_GET['page'])&&(!empty($_GET['page'])))
		$current = $_GET['page'];
	else
		$current = 1;

	$paginate = '<ul class="pagination">';
	$total_pages = ceil($total_records / $num_rec_per_page);


    if($current>1){
        $arrow_left ="";
        $link = $pagename."?page=".($current-1);
    }else{
        $arrow_left="disabled";
        $link = "#";
    }
    $paginate .= '<li class="'.$arrow_left.'"><a href="'.$link.'" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>';


    for ($i=1;$i<=$total_pages;$i++){

    	
        if($current==$i)
            $paginate .= '<li class="active"><a href="'.$pagename.'?page='.$i.$request_url.'">' .$i.'</a><li>';
         else  $paginate .= '<li ><a href="'.$pagename.'?page='.$i.$request_url.'">' .$i.'</a><li>';
	 }



    if($current!=$total_pages){
        $arrow_right ="";
        $lastlink = $pagename."?page=".($current+1);
    }else{
        $arrow_right="disabled";
        $lastlink = "#";
    } 

    $paginate .= '<li class="'.$arrow_right.'"><a href="'.$lastlink.'" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>';

	$paginate .= '<ul class="pagination">'; 

	return $paginate;
	
}

/**********************************************************
## Function for text_clean
## Parm: 
## Return: report
*************************************************************/

function text_clean($value){
	
	global $DBNAME,$KEY;	
	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$value = trim($value);
	$value=strip_tags($value);
	$value = preg_replace("/&#?[a-z0-9]{2,8};/i","",$value);
	$value=mysqli_real_escape_string($db_connect, $value);

	return $value;

}




/**********************************************************
## Function for fnf_insert
## Parm: 
## Return: report
*************************************************************/

function fnf_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$FNF_NAME = trim($_REQUEST['name']);
	$FNF_EMAIL = trim($_REQUEST['email']);
	$FNF_GENDER = $_REQUEST['gender'];
	$FNF_MOBILE = $_REQUEST['mobile_no'];
	$RELATION = $_REQUEST['relation'];
	$FNF_ADDRESS = $_REQUEST['address'];
	$USER_ID = get_userid();
	$CREATED_FNF='';
	
	$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_FNF."(FNF_NAME,FNF_EMAIL,FNF_ADDRESS,FNF_MOBILE,FNF_GENDER,RELATION,USER_ID) VALUES('$FNF_NAME','$FNF_EMAIL','$FNF_ADDRESS','$FNF_MOBILE','$FNF_GENDER','$RELATION','$USER_ID')");

	if($sql){

		$_SESSION['alert_message'] = 'FNF insert Successfully.';
		// return 1;
		header('Location:wish_fnf.php');
		exit();
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}


}


/**********************************************************
## Function for get_user_fnf_detail
## Return: report
*************************************************************/

function get_user_fnf_detail($user_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_FNF." WHERE USER_ID='$user_id'");


	$all_fnf = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_fnf [] = $row;

		return $all_fnf;
	}

	return $all_fnf;

}



/**********************************************************
## Function for event_insert
## Parm: 
## Return: report
*************************************************************/

function event_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$EVENT_NAME = text_clean($_REQUEST['event_name']);
	$FNF_ID = $_REQUEST['event_fnf_id'];
	$GIFT_TYPE = $_REQUEST['gift_type'];
	$GIFT_ID = $_REQUEST['gift_id'];
	$DELIVERY_DATE = $_REQUEST['event_date'];
	$USER_ID=get_userid();
	
	$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_EVENT."(EVENT_NAME,FNF_ID,GIFT_ID,DELIVERY_DATE,USER_ID) VALUES('$EVENT_NAME','$FNF_ID','$GIFT_ID','$DELIVERY_DATE','$USER_ID')");

	if($sql){

		$_SESSION['alert_message'] = 'Event insert Successfully.';
		// return 1;
		header('Location:wish_event.php');
		exit();
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}


/**********************************************************
## Function for profile_insert
## Parm: 
## Return: report
*************************************************************/

function profile_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$MOBILENO = trim($_REQUEST['mobile']);
	$EMAIL = trim($_REQUEST['email']);
	$PASSWORD = $_REQUEST['password'];
	$PASSWORD2 = $_REQUEST['password_confirm'];
	$PASSWORD_ORG = $_REQUEST['password'];
	$point=0;

    if (empty($MOBILENO)) { 
    	$_SESSION['alert_message'] = 'Mobile No is required.';
		// return 1;				
		header('Location:wish_signup.php');
		exit();
    }
    if (empty($PASSWORD)) { 
    	$_SESSION['alert_message'] = 'Password is required.';
		// return 1;				
		header('Location:wish_signup.php');
		exit();
    }
    if (empty($PASSWORD2)) { 
    	$_SESSION['alert_message'] = 'Confirm password is required.';
		// return 1;				
		header('Location:wish_signup.php');
		exit();
    }
    if ($PASSWORD != $PASSWORD2) {
        $_SESSION['alert_message'] = 'The two passwords do not match';
		// return 1;
		header('Location:wish_signup.php');
		exit();
    }

    $user_check_query = "SELECT * FROM PROFILE_TBL WHERE MOBILENO='$MOBILENO' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['MOBILENO'] === $MOBILENO) {
            $_SESSION['alert_message'] = 'Mobile No already exists';
			// return 1;
			header('Location:wish_signup.php');
			exit();
        }
    }
    $point=30;
    if(!empty($EMAIL)){
    	$point=$point+10;
    }	

	$MAIN_PASSWORD = md5($PASSWORD);
	$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_PROFILE."(MOBILENO,EMAIL,PASSWORD,PASSWORD_ORG,POINT	) VALUES('$MOBILENO','$EMAIL','$MAIN_PASSWORD','$PASSWORD_ORG','$point')");

	if($sql){

		$_SESSION['alert_message'] = 'Profile insert Successfully.';
		// return 1;	
		header('Location:wish_signup.php');
		exit();
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}


}



/**********************************************************
## Function for profile_update
## Parm: 
## Return: 
*************************************************************/   
function update_profile($user_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$F_NAME	 = mysqli_real_escape_string($db_connect, $_REQUEST['first_name']);
	$L_NAME	 = mysqli_real_escape_string($db_connect, $_REQUEST['last_name']);
	$EMAIL = mysqli_real_escape_string($db_connect, $_REQUEST['email']);
	// $MOBILENO = mysqli_real_escape_string($db_connect, $_REQUEST['mobile_no']);
	$DOB = mysqli_real_escape_string($db_connect, $_REQUEST['birthday']);
	$GENDER = mysqli_real_escape_string($db_connect, $_REQUEST['gender']);
	$RELIGION = mysqli_real_escape_string($db_connect, $_REQUEST['religion']);
	$ZIP = mysqli_real_escape_string($db_connect, $_REQUEST['zip_code']);
	$ADDRESS = mysqli_real_escape_string($db_connect, $_REQUEST['address']);

	$point=30;
    if(!empty($F_NAME)){
    	$point=$point+5;
    }
    if(!empty($L_NAME)){
    	$point=$point+5;
    }
    if(!empty($EMAIL)){
    	$point=$point+10;
    }
    if(!empty($DOB)){
    	$point=$point+20;
    }
    if(!empty($GENDER)){
    	$point=$point+5;
    }
    if(!empty($RELIGION)){
    	$point=$point+10;
    }
    if(!empty($ZIP)){
    	$point=$point+20;
    }
    if(!empty($ADDRESS)){
    	$point=$point+30;
    }	

	$sql=mysqli_query($db_connect,"UPDATE ".TBL_PROFILE." SET F_NAME='$F_NAME',L_NAME='$L_NAME',EMAIL='$EMAIL', DOB='$DOB', GENDER='$GENDER', RELIGION='$RELIGION', ZIP='$ZIP', POINT='$point', ADDRESS='$ADDRESS' where USER_ID='$user_id'");

    if($sql){
		$_SESSION['alert_message'] = 'Profile Updated Successfully.';
		// return 1;				
		header('Location:wish_edit_profile.php');
		exit();
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}






/**********************************************************
## Function for product_delete 
## Parm: 
## Return:
*************************************************************/

function product_delete($product_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"DELETE FROM ".TBL_PDTS." WHERE product_id='$product_id'");

	if($sql){
		$_SESSION['alert_message'] = 'Product Deleted Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}


/**********************************************************
## Function for product_edit
## Parm: 
## Return: 
*************************************************************/
    
function product_edit($product_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

    $sql=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." WHERE product_id='$product_id'"));

    return $sql;

}
 

/**********************************************************
## Function for product_update
## Parm: 
## Return: 
*************************************************************/   
function product_update($product_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$update_username = get_username();
	$product_name = trim($_REQUEST['product_name']);
	$product_name=text_clean($product_name);
	$product_name_slug = explode(' ', strtolower($product_name));
	$product_name_slug = implode('_', $product_name_slug);
	$product_details = $_REQUEST['product_details'];

	    $sql=mysqli_query($db_connect,"UPDATE ".TBL_PDTS." SET product_name='$product_name',product_name_slug='$product_name_slug',product_details='$product_details', created_by='$update_username' where product_id='$product_id'");

    if($sql){

		$_SESSION['alert_message'] = 'Product Updated Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}



/**********************************************************
## Function for get_all_product
## Parm: 
## Return: report
*************************************************************/

function get_all_product(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS."  ");
	$all_product = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_product [] = $row;

		return $all_product;
	}

	return $all_product;

}


/**********************************************************
## Function for get_select_product
## Parm: 
## Return: report
*************************************************************/

function get_select_product($product_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." where product_id='product_id' ");
	$all_product = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_product [] = $row;

		return $all_product;
	}

	return $all_product;

}


/**********************************************************
## Function for all_product_pagination_list
## Parm: $start_from,$num_rec_per_page
## Return:
*************************************************************/

function all_product_pagination_list($start_from,$num_rec_per_page){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$last = $start_from+$num_rec_per_page;

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." Order by product_id desc limit $start_from,$num_rec_per_page");

	$all_product = array();

	$sql2 = mysqli_query($db_connect,"SELECT count(*) as total FROM ".TBL_PDTS." ");
	$total_records = mysqli_fetch_assoc($sql2);

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_product [] = $row;
	}

	$result = array(
					'total_records' => $total_records['total'],
					'all_product'  => $all_product
				);


	return $result;
	
}


/**********************************************************
## Function for social_link_insert
## Parm: 
## Return: report
*************************************************************/

function social_link_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$social_site_name = trim($_REQUEST['social_site_name']);
	$social_site_name=text_clean($social_site_name);
	$social_site_url = $_REQUEST['social_site_url'];
	$social_site_url=text_clean($social_site_url);
	$social_site_icon_class = $_REQUEST['social_site_icon_class'];
	$social_site_icon_class=text_clean($social_site_icon_class);
	$username = get_username();

	
	$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_SSL."(social_site_name,social_site_url,social_site_icon_class,created_by) VALUES('$social_site_name','$social_site_url','$social_site_icon_class','$username')");

	if($sql){

		$_SESSION['alert_message'] = 'Social Link insert Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}


}



/**********************************************************
## Function for social_link_delete 
## Parm: 
## Return:
*************************************************************/

function social_link_delete($social_link_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"DELETE FROM ".TBL_SSL." WHERE social_link_id='$social_link_id' ");

	if($sql){
		$_SESSION['alert_message'] = 'Social Link Deleted Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}


/**********************************************************
## Function for social_link_edit
## Parm: 
## Return: 
*************************************************************/
    
function social_link_edit($social_link_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

    $sql=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_SSL." WHERE social_link_id='$social_link_id'"));

    return $sql;

}
 

/**********************************************************
## Function for social_link_update
## Parm: 
## Return: 
*************************************************************/   
function social_link_update($social_link_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$update_username = get_username();
	$social_site_name = trim($_REQUEST['social_site_name']);
	$social_site_name=text_clean($social_site_name);
	$social_site_url = $_REQUEST['social_site_url'];
	$social_site_url=text_clean($social_site_url);
	$social_site_icon_class = $_REQUEST['social_site_icon_class'];
	$social_site_icon_class=text_clean($social_site_icon_class);

	    $sql=mysqli_query($db_connect,"UPDATE ".TBL_SSL." SET social_site_name='$social_site_name',social_site_url='$social_site_url',social_site_icon_class='$social_site_icon_class', created_by='$update_username' where social_link_id='$social_link_id'");

    if($sql){

		$_SESSION['alert_message'] = 'Social Link Updated Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}



/**********************************************************
## Function for social_link_pagination_list
## Parm: $start_from,$num_rec_per_page
## Return:
*************************************************************/

function social_link_pagination_list($start_from,$num_rec_per_page){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$last = $start_from+$num_rec_per_page;

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_SSL." Order by social_link_id desc limit $start_from,$num_rec_per_page");

	$all_social_site = array();

	$sql2 = mysqli_query($db_connect,"SELECT count(*) as total FROM ".TBL_SSL." ");
	$total_records = mysqli_fetch_assoc($sql2);

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_social_site [] = $row;
	}

	$result = array(
					'total_records' => $total_records['total'],
					'all_social_site'  => $all_social_site
				);


	return $result;
	
}






/***********************************************************************
## Function for preview_image_upload
## Parm: $_File
## Return: $destinatin
***********************************************************************/

function preview_image_upload($post_type,$images,$select_height,$select_width){

	$username = get_username();

	$maindirectory = 'repository/';
	$file = $_FILES["content_preview"]['tmp_name'];
	list($width, $height) = getimagesize($file);
    $file_ext   = array('jpg','png','gif','bmp','JPG','jpeg');
    $post_ext   = end(explode('.',$_FILES['content_preview']['name']));
    $photo_name = explode(' ', trim(strtolower($_FILES['content_preview']['name'])));
    $photo_name = implode('_', $photo_name);
    $photo_type = $_FILES['content_preview']['type'];
    $photo_size = $_FILES['content_preview']['size'];
    $photo_tmp  = $_FILES['content_preview']['tmp_name'];
    $photo_error= $_FILES['content_preview']['error'];
    
    if( ($width <= $select_width && $height <= $select_height ) && in_array($post_ext,$file_ext) && ($photo_error == 0 )){
           
    		$fullpath = $maindirectory.$post_type."/".$images."/";

    		/*directory create*/
			if (!file_exists($fullpath))
			 mkdir($fullpath, 0777, true);
            
            $destination = $fullpath.time().'_'.$photo_name;
            if(move_uploaded_file($photo_tmp,$destination)){

	   		 	$_SESSION['alert_message']='Image Uploaded Successfully !!!.';
                return $destination;

            }else{

            	$_SESSION['alert_message']='Directory Missing !!!.';
				return 0;
            }
    
    }else{

    	$_SESSION['alert_message']='Something Wrong in image. Please Try again !!!.'.$width.'/'.$height;
			return 0;
    }

}



/***********************************************************************
## Function for content_file_upload
## Parm: $_File
## Return: $destinatin
***********************************************************************/

function content_file_upload($post_type){

	$username = get_username();

	$maindirectory = 'repository/';
	
    $file_ext  = array('pdf');
    $post_ext  = end(explode('.',$_FILES['content_filepath']['name']));
    $file_name = explode(' ', trim(strtolower($_FILES['content_filepath']['name'])));
    $file_name = implode('_', $file_name);
    $file_type = $_FILES['content_filepath']['type'];
    $file_size = $_FILES['content_filepath']['size'];
    $file_tmp  = $_FILES['content_filepath']['tmp_name'];
    $file_error= $_FILES['content_filepath']['error'];

    if( in_array($post_ext, $file_ext) && ($file_error == 0 )){
           
    		$fullpath = $maindirectory.$post_type."/";

    		/*directory create*/
			if (!file_exists($fullpath))
			 mkdir($fullpath, 0777, true);
            
            $destination = $fullpath.time().'_'.$file_name;
            if(move_uploaded_file($file_tmp,$destination)){

	   		 	$_SESSION['alert_message']='File Uploaded Successfully !!!.';
                return $destination;

            }else{

            	$_SESSION['alert_message']='Directory Missing !!!.';
				return 0;
            }

    }else{

    	$_SESSION['alert_message']='Something Wrong in File. Please Try again !!!.';
			return 0;
    }

}


/**********************************************************
## Function for get_profile_file
## Parm: 
## Return: 
*************************************************************/
    
function get_profile_file(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

    $sql=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_META." WHERE field_name='profile_file'"));

    return $sql;

}

/**********************************************************
## Function for profile_file_insert
## Parm: 
## Return: 
*************************************************************/

function profile_file_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$post_type = trim($_REQUEST['post_type']);
	$username = get_username();
	
	$file = $_FILES["content_filepath"]['tmp_name'];
    $file_type = $_FILES['content_filepath']['type'];
    $file_size = $_FILES['content_filepath']['size'];

	if(($file_size <='5000000') && ($file_type=='application/pdf')){

		$content_filepath = content_file_upload($post_type);
		$get_profile_file=get_profile_file();

		if(empty($get_profile_file)){
			$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_META."(field_name,field_value,created_by) VALUES('$post_type','$content_filepath','$username')");

		}else
			$sql=mysqli_query($db_connect,"UPDATE ".TBL_META." SET field_name='$post_type',field_value='$content_filepath', created_by='$username' where field_name='profile_file'");

		if($sql){

			$_SESSION['alert_message'] = 'File Uploaded Successfully.';
			return 1;
		}else{
			$_SESSION['alert_message'] = 'Please Try again later !!.';
			return 0;
		}
	}else{
		$_SESSION['alert_message'] = 'Invalid  size or type, Please Try again !!.';
		return 0;
	}


}


/**********************************************************
## Function for product_insert
## Parm: 
## Return: report
*************************************************************/

function product_image_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$product_id = trim($_REQUEST['product_id']);

    $get_select_product=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." WHERE product_id='$product_id'"));

	$product_name=$get_select_product['product_name_slug'];
	$username = get_username();

	$select_product_file_size = array('816*612', '296*270', '650*426', '1024*1024');
	
	$file = $_FILES["content_preview"]['tmp_name'];
	list($width, $height) = getimagesize($file);
	$current_size=$width.'*'.$height;

	if(in_array($current_size, $select_product_file_size)){

		$content_preview = preview_image_upload('product_image',$product_name,$height,$width);

		$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_PRODUCT_IMAGE."(product_id,product_image_url,created_by) VALUES('$product_id','$content_preview','$username')");

		if($sql){

			$_SESSION['alert_message'] = 'Product insert Successfully.';
			return 1;
		}else{
			$_SESSION['alert_message'] = 'Please Try again later !!.';
			return 0;
		}
	}else{
		$_SESSION['alert_message'] = 'Invalid image size, Please Try again !!.';
		return 0;
	}


}


/**********************************************************
## Function for product_details_edit
## Parm: 
## Return: 
*************************************************************/
    
function product_details_edit($product_image_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

    $sql=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_PRODUCT_IMAGE." WHERE product_image_id='$product_image_id'"));

    return $sql;

}
 

/**********************************************************
## Function for product_details_update
## Parm: 
## Return: 
*************************************************************/   
function product_details_update($product_image_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$update_username = get_username();
	$product_id = $_REQUEST['product_id'];
	$get_select_product=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." WHERE product_id='$product_id'"));

	$product_name=$get_select_product['product_name_slug'];
	$update_content_preview = $_REQUEST['edit_content_preview'];

	$image_file = $_FILES["content_preview"]['tmp_name'];
	$file=$_FILES['content_filepath']['name'];

		if($image_file != Null){

			$select_product_file_size = array('816*612', '296*270', '650*426', '1024*1024');
	
			list($width, $height) = getimagesize($image_file);
			$current_size=$width.'*'.$height;

			if(in_array($current_size, $select_product_file_size)){

				$content_preview = preview_image_upload('product_image',$product_name,'8000','10000');
			}else{
				$_SESSION['alert_message'] = 'Invalid image size, Please Try again !!.';
				return 0;
			}

		}else{ 
			$content_preview = $update_content_preview;
		}

	    $sql=mysqli_query($db_connect,"UPDATE ".TBL_PRODUCT_IMAGE." SET product_id='$product_id',product_image_url='$content_preview', created_by='$update_username' where product_image_id='$product_image_id'");

    if($sql){

		$_SESSION['alert_message'] = 'Post Updated Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}


/**********************************************************
## Function for product_image_delete
## Parm: 
## Return:
*************************************************************/

function product_image_delete($product_image_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"DELETE FROM ".TBL_PRODUCT_IMAGE." WHERE product_image_id='$product_image_id'");

	if($sql){
		$_SESSION['alert_message'] = 'Product Image Deleted Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}


/**********************************************************
## Function for get_all_product_image
## Parm: 
## Return: report
*************************************************************/

function get_all_product_image(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PRODUCT_IMAGE."  ");
	$all_product_image = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_product_image [] = $row;

		return $all_product_image;
	}

	return $all_product_image;

}


/**********************************************************
## Function for all_product_image_pagination_list
## Parm: $start_from,$num_rec_per_page
## Return:
*************************************************************/

function all_product_image_pagination_list($start_from,$num_rec_per_page){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$last = $start_from+$num_rec_per_page;

	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PRODUCT_IMAGE." INNER JOIN ".TBL_PDTS." ON ".TBL_PRODUCT_IMAGE.".product_id = ".TBL_PDTS.".product_id Order by product_image_id desc limit $start_from,$num_rec_per_page");

	$all_product = array();

	$sql2 = mysqli_query($db_connect,"SELECT count(*) as total FROM ".TBL_PRODUCT_IMAGE." ");
	$total_records = mysqli_fetch_assoc($sql2);

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_product [] = $row;
	}

	$result = array(
					'total_records' => $total_records['total'],
					'all_product'  => $all_product
				);


	return $result;
	
}


/**********************************************************
## Function for post_type_insert
## Parm: 
## Return: report
*************************************************************/

function post_type_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$post_type_name = trim($_REQUEST['post_type_name']);
	$post_type_name=text_clean($post_type_name);
	$post_name_slug = explode(' ', strtolower($post_type_name));
	$post_name_slug = implode('_', $post_name_slug);
	$description = $_REQUEST['description'];

	$username = get_username();
	
	$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_POST."(post_type_name,post_name_slug,description,created_by) VALUES('$post_type_name','$post_name_slug','$description','$username')");

	if($sql){

		$_SESSION['alert_message'] = 'Post Type insert Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}


}


/**********************************************************
## Function for post_type_delete
## Parm: 
## Return:
*************************************************************/

function post_type_delete($post_id,$post_name_slug){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$meta_post = mysqli_query($db_connect,"SELECT * FROM ".TBL_META."  WHERE field_name='$post_name_slug'");

	if(empty($meta_post)){
		$sql = mysqli_query($db_connect,"DELETE FROM ".TBL_POST." WHERE post_id='$post_id'");

		if($sql){
			$_SESSION['alert_message'] = 'Post Type Deleted Successfully.';
			return 1;
		}else{
			$_SESSION['alert_message'] = 'Please Try again later !!.';
			return 0;
		}
	}else{
		$_SESSION['alert_message'] = 'Cant not delete,This type has entry !!.';
		return 0;
	}

}


/**********************************************************
## Function for post_type_edit
## Parm: 
## Return: 
*************************************************************/
    
function post_type_edit($post_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

    $sql=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_POST." WHERE post_id='$post_id'"));

    return $sql;

}
 

/**********************************************************
## Function for post_type_update
## Parm: 
## Return: 
*************************************************************/   
function post_type_update($post_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$update_username = get_username();
	// $post_type_name = trim($_REQUEST['post_type_name']);
	// $post_type_name=text_clean($post_type_name);
	// $post_name_slug = explode(' ', strtolower($post_type_name));
	// $post_name_slug = implode('_', $post_name_slug);
	$description = $_REQUEST['description'];


	$sql=mysqli_query($db_connect,"UPDATE ".TBL_POST." SET description='$description', created_by='$update_username' where post_id='$post_id'");

    if($sql){

		$_SESSION['alert_message'] = 'Post Type Updated Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}



/**********************************************************
## Function for get_all_post_type
## Parm: 
## Return: report
*************************************************************/

function get_all_post_type(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_POST."  ");
	$all_post_type = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_post_type [] = $row;

		return $all_post_type;
	}

	return $all_post_type;

}


/**********************************************************
## Function for get_all_post_type_pagination_list
## Parm: $start_from,$num_rec_per_page
## Return:
*************************************************************/

function get_all_post_type_pagination_list($start_from,$num_rec_per_page){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$last = $start_from+$num_rec_per_page;

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_POST." Order by post_id desc limit $start_from,$num_rec_per_page");

	$all_post_type = array();

	$sql2 = mysqli_query($db_connect,"SELECT count(*) as total FROM ".TBL_POST." ");
	$total_records = mysqli_fetch_assoc($sql2);

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_post_type [] = $row;
	}

	$result = array(
					'total_records' => $total_records['total'],
					'all_post_type'  => $all_post_type
				);


	return $result;
	
}


/**********************************************************
## Function for all_product_pagination_list
## Parm: $start_from,$num_rec_per_page
## Return:
*************************************************************/

function get_post_type($post_value){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_POST."  where post_type_name='$post_value'");

	$get_post = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_post [] = $row;
	}


	return $get_post;
	
}


/**********************************************************
## Function for gallery_image_insert
## Parm: 
## Return: report
*************************************************************/

function post_type_image_insert(){

	global $DBNAME,$KEY;	

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$post_type = $_REQUEST['post_type'];


	if(!empty($_REQUEST['description']) && !empty($_REQUEST['certificate_name'])){

		$certificate_name = $_REQUEST['certificate_name'];
		$certificate_name=text_clean($certificate_name);
		$certificate_name_slug = explode(' ',$certificate_name);
		$certificate_name_slug = implode('^', $certificate_name_slug);
		$description = $_REQUEST['description'];
		$description=text_clean($description);
		$field_value_description =$certificate_name_slug.'_'.$description;
	}else $field_value_description='NULL';

	if(!empty($post_type) && ($post_type=='gallery')){
		$select_file_size = array('394*274','394*304','259*351','369*251','295*351');
	}elseif(!empty($post_type) && ($post_type=='home_slider')){
		$select_file_size = array('1440*562','953*562','842*562','797*562','1377*562');
	}elseif(!empty($post_type) && ($post_type=='about_slider')){
		$select_file_size = array('475*303');
	}elseif(!empty($post_type) && ($post_type=='client')){
		$select_file_size = array('198*120');
	}elseif(!empty($post_type) && ($post_type=='certificate')){
		$select_file_size = array('474*268');
	}

	$file = $_FILES["content_preview"]['tmp_name'];
	list($width, $height) = getimagesize($file);
	$current_size=$width.'*'.$height;

	if(in_array($current_size, $select_file_size)){

		$username = get_username();

		$content_preview = preview_image_upload($post_type,'images',$height,$width);

		if($content_preview){
			$sql = mysqli_query($db_connect,"INSERT INTO ".TBL_META."(field_name,field_value,field_value_description,created_by) VALUES('$post_type','$content_preview','$field_value_description','$username')");

			if($sql){

				$_SESSION['alert_message'] = 'Image insert Successfully.';
				return 1;
			}else{
				$_SESSION['alert_message'] = 'Please Try again later !!.';
				return 0;
			}

		}else{
			$_SESSION['alert_message'] = 'Invalid image size, please try again !!.';
			return 0;
		}
	}else{
		$_SESSION['alert_message'] = 'Invalid image size, please try again !!.';
		return 0;
	}



}




/**********************************************************
## Function for meta_post_delete
## Parm: 
## Return:
*************************************************************/

function meta_post_delete($meta_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	
	$sql = mysqli_query($db_connect,"DELETE FROM ".TBL_META." WHERE meta_id='$meta_id'");

	if($sql){
		$_SESSION['alert_message'] = 'Meta Deleted Successfully.';
		return 1;
	}else{
		$_SESSION['alert_message'] = 'Please Try again later !!.';
		return 0;
	}

}


/**********************************************************
## Function for meta_post_edit
## Parm: 
## Return: 
*************************************************************/
    
function meta_post_edit($meta_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

    $sqlll=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_META." WHERE meta_id='$meta_id'"));

    return $sqlll;

}
    
function meta_post_update($meta_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$update_username = get_username();
	$post_type = $_REQUEST['post_type'];

	if(!empty($_REQUEST['description']) && !empty($_REQUEST['certificate_name'])){

		$certificate_name = $_REQUEST['certificate_name'];
		$certificate_name=text_clean($certificate_name);
		$certificate_name_slug = explode(' ',$certificate_name);
		$certificate_name_slug = implode('^', $certificate_name_slug);
		$description = $_REQUEST['description'];
		$description=text_clean($description);
		$field_value_description =$certificate_name_slug.'_'.$description;
	}else $field_value_description='NULL';



	$update_content_preview = $_REQUEST['edit_content_preview'];

	$image_file = $_FILES["content_preview"]['tmp_name'];

		if($image_file != Null){

			if(!empty($post_type) && ($post_type=='gallery')){
				$select_file_size = array('394*274','394*304','259*351','369*251','295*351');
			}elseif(!empty($post_type) && ($post_type=='home_slider')){
				$select_file_size = array('1440*562','842*562','953*562','797*562','1377*562');
			}elseif(!empty($post_type) && ($post_type=='about_slider')){
				$select_file_size = array('475*303');
			}elseif(!empty($post_type) && ($post_type=='client')){
				$select_file_size = array('198*120');
			}elseif(!empty($post_type) && ($post_type=='certificate')){
				$select_file_size = array('474*268');
			}
			
			list($width, $height) = getimagesize($image_file);
			$current_size=$width.'*'.$height;

			if(in_array($current_size, $select_file_size)){
				$content_preview = preview_image_upload($post_type,'images',$height,$width);

			}else{
				$content_preview='';
			}

		}else{ 
			$content_preview = $update_content_preview;
		}

		if($content_preview != Null){
		if($content_preview){

			$sql=mysqli_query($db_connect,"UPDATE ".TBL_META." SET field_name='$post_type',field_value='$content_preview',field_value_description='$field_value_description', created_by='$update_username' where meta_id='$meta_id'");

		    if($sql){

				$_SESSION['alert_message'] = 'Updated Successfully.';
				return 1;
			}else{
				$_SESSION['alert_message'] = 'Please Try again later !!.';
				return 0;
			}
		}else{
			$_SESSION['alert_message'] = 'Invalid image size, please try again !!.';
		return 0;
		
	}
	}else{
			$_SESSION['alert_message'] = 'Invalid image size, please try again !!.';
		return 0;
	}

}


/**********************************************************
## Function for get_all_gallery
## Parm: 
## Return:
*************************************************************/

function get_all_gallery(){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META."  where field_name='gallery'");

	$get_post = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_post [] = $row;
	}


	return $get_post;
	
}


/**********************************************************
## Function for get_post_image_pagination
## Parm: $start_from,$num_rec_per_page
## Return:
*************************************************************/

function get_post_image_pagination($post_type,$start_from,$num_rec_per_page){

	global $KEY,$DBNAME;

	$username = get_username();

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");

	$last = $start_from+$num_rec_per_page;

	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META." INNER JOIN ".TBL_POST." ON ".TBL_META.".field_name = ".TBL_POST.".post_name_slug  where field_name='$post_type' Order by meta_id desc limit $start_from,$num_rec_per_page");

	$all_post_type = array();

	$sql2 = mysqli_query($db_connect,"SELECT count(*) as total FROM ".TBL_META."  where field_name='$post_type' ");
	$total_records = mysqli_fetch_assoc($sql2);

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$all_post_type [] = $row;
	}

	$result = array(
					'total_records' => $total_records['total'],
					'all_post_type'  => $all_post_type
				);


	return $result;
	
}






?>

