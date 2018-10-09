<?php

$page = basename($_SERVER['PHP_SELF']); 

switch ($page){

	case 'index.php':
	 $title= 'Home';
	 $page_name='Home';
	 $description = '';
	 break;

	case 'service.php':
	 $title= 'Service';
	 $page_name='Service';
	 $description = '';
	 break;

	case 'service-details.php':
	 $title= (isset($_GET['title']) && !empty($_GET['title'])) ? strtoupper($_GET['title']):'Service Details';
	 $page_name=(isset($_GET['title']) && !empty($_GET['title'])) ? strtoupper($_GET['title']):'Service Details';
	 $description = '';
	 break;

	 case 'contact.php':
	 $title= 'Contact';
	 $description = 'Contact';
	 break;

	 case 'gallery.php':
	 $title= 'Gallery';
	 $description = '';
	 break;

	 case 'profile.php':
	 $title= 'Profile';
	 $description = '';
	 break;

	default:
	 $title= 'Home';
	 $description = '';
	 break;
}


?>