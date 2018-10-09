<?php
	session_start();
	session_destroy();
	header('Location: wish_login.php');
	exit;
?>