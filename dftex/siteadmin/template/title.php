<?php

$page = basename($_SERVER['PHP_SELF']); 

switch ($page){

	case 'index.php':
	 $title= 'Dashboard';
	 $page_name='Dashboard';
	 $description = 'overview &amp; stats';
	 break;

	case 'login.php':
	 $title= 'Login';
	 $page_name='Login';
	 $description = '';
	 break;

	 case 'contact.php':
	 $title= 'CONTACT US';
	 $description = '';
	 break;

	 case 'home-slider.php':
	 $title= 'HOME SLIDER';
	 $description = '';
	 break;

	 case 'slider.php':
	 $title= 'SLIDER';
	 $description = '';
	 break;

	 case 'client.php':
	 $title= 'CLIENTS';
	 $description = '';
	 break;

	 case 'gallery.php':
	 $title= 'GALLERY';
	 $description = '';
	 break;

	 case 'certificate.php':
	 $title= 'CERTIFICATE';
	 $description = '';
	 break;

	 case 'products.php':
	 $title= 'PRODUCT';
	 $description = '';
	 break;

	 case 'product-details.php':
	 $title= 'Products Details';
	 $description = '';
	 break;

	 case 'social-site-link.php':
	 $title= 'Social Site Link';
	 $description = '';
	 break;

	 case 'profile-file-upload.php':
	 $title= 'Profile File Upload';
	 $description = '';
	 break;


	default:
	 $title= 'LIVE';
	 $description = '';
	 break;
}


?>