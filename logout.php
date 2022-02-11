<?php
	// Start sessions
	session_start();

	$_SESSION  = array();

	session_unset();



	// Destroy all session related to user
	session_destroy();

	setcookie('PHPSESSID',null,-1,'/');

	// Redirect to login page
	echo "<script>window.location.href='index.php'</script>";
	// header('location: index.php');
	//exit;
?>