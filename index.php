<?php
	session_start();
	$_SESSION['projectName'] = "/Nlink_Project";
	require_once "./mvc/Bridge.php";
	$myApp = new App();
?>