<?php
	session_start();
	// if(!isset($_COOKIE['cart_nlink']))
	// {
	// 	setcookie('cart_nlink',json_encode(array()),time()+(86400 * 30),COOKIEPATH,COOKIE_DOMAIN);
	
	// }
	$_SESSION['projectName'] = "/Nlink_Project";
	require_once "./mvc/Bridge.php";
	$myApp = new App();
?>