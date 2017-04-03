<?php
	require_once('adminPass.php');
	
	if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
		password_verify($_SERVER['PHP_AUTH_USER'], $hashedLogin) &&
	    password_verify($_SERVER['PHP_AUTH_PW'], $hashedPass)) {
		header("Location: administrative.php");	
	} else {
		header("WWW-Authenticate: Basic realm=\"Example System\"");
		header("HTTP/1.0 401 Unauthorized");
	}
?>