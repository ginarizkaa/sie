<?php
	session_start();
	$_SESSION['status'] = "logout";
	session_destroy();
	header("location:login_page.php");

?>