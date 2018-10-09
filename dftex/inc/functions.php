<?php
session_start();
ob_start();
ob_flush();
/*****************************
##  Function File
*******************************/
include('classlogger.php');

date_default_timezone_set('Asia/Dhaka');



 $DBNAME = 'dftex_web';
 $KEY 	 = 'dhfakHueyrer93KJr4042diJri0Nfk';
 $DBHOST = 'localhost';
 $DBUSER = 'root';
 $DBPASS = '1234';

 /*$DBNAME = 'sharif_dftexltd';
 $KEY 	 = 'dhfakHueyrer93KJr4042diJri0Nfk';
 $DBHOST = 'dftexltd.com';
 $DBUSER = 'sharif_dftexltd';
 $DBPASS = 'dftex789#';*/



define('TBL_USER','web_users');
define('TBL_PDTS','web_tbl_products');
define('TBL_PRODUCT_IMAGE','web_tbl_products_image');
define('TBL_POST','web_tbl_post');
define('TBL_META','web_tbl_meta');
define('TBL_SSL','web_tbl_social_link');




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
## Function for get_all_gallery
## Parm: 
## Return:
*************************************************************/

function get_all_gallery(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META." where field_name='gallery'");

	$get_post = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_post [] = $row;
	}


	return $get_post;
	
}


/**********************************************************
## Function for get_all_slider
## Parm: 
## Return:
*************************************************************/

function get_all_slider(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META."  where field_name='about_slider'");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for get_all_home_slider
## Parm: 
## Return:
*************************************************************/

function get_all_home_slider(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META."  where field_name='home_slider'");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for get_all_client
## Parm: 
## Return:
*************************************************************/

function get_all_client(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META."  where field_name='client'");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for get_all_certificate
## Parm: 
## Return:
*************************************************************/

function get_all_certificate(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_META."  where field_name='certificate'");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for work_all_work_areas
## Parm: 
## Return:
*************************************************************/

function work_all_work_areas(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." ");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for all_work_areas
## Parm: 
## Return:
*************************************************************/

function all_work_areas(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." where product_name_slug IN('button','hand_tag','jaquare_elastic','twill_tape','wovel_label','zipper') ");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
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
## Function for all_social_links
## Parm: 
## Return:
*************************************************************/

function all_social_links(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_SSL." ");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for work_all_work_areas_details
## Parm: 
## Return:
*************************************************************/

function work_all_work_areas_details($product_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PRODUCT_IMAGE." INNER JOIN ".TBL_PDTS." ON ".TBL_PRODUCT_IMAGE.".product_id = ".TBL_PDTS.".product_id WHERE ".TBL_PRODUCT_IMAGE.".product_id='$product_id' ");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for get_all_work_areas
## Parm: 
## Return:
*************************************************************/

function get_all_work_areas(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." ");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for get_all_work_area_details
## Parm: 
## Return:
*************************************************************/

function get_all_work_area_details(){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PRODUCT_IMAGE." INNER JOIN ".TBL_PDTS." ON ".TBL_PRODUCT_IMAGE.".product_id = ".TBL_PDTS.".product_id");
	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for select_work_areas
## Parm: 
## Return:
*************************************************************/

function select_work_areas($product_id){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql = mysqli_query($db_connect,"SELECT * FROM ".TBL_PDTS." WHERE product_id='$product_id'");

	$get_all = array();

	if($sql){
		while ($row = mysqli_fetch_array($sql)) 			
			$get_all [] = $row;
	}


	return $get_all;
	
}


/**********************************************************
## Function for get_select_post_type
## Parm: 
## Return:
*************************************************************/

function get_select_post_type($post_type){

	global $KEY,$DBNAME;

	$db_connect = get_database_connection();

	mysqli_select_db($db_connect,$DBNAME) or die("Cannot select DB");
	
	$sql=mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT * FROM ".TBL_POST." WHERE post_name_slug='$post_type'"));

	return $sql;
	
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





?>

