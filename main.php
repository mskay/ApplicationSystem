<?php
	require_once('adminPass.php');

	if(isset($_POST['submit'])) {
		header('Location: submit.php');
		exit();
	} elseif (isset($_POST['review'])) {
		header("Location: review.php");
		exit();
	} elseif (isset($_POST['update'])) {
		header("Location: update.php");
		exit();
	} elseif (isset($_POST['administrative'])) {
		if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
			password_verify($_SERVER['PHP_AUTH_USER'], $hashedLogin) &&
		    password_verify($_SERVER['PHP_AUTH_PW'], $hashedPass)) {
			header("Location: administrative.php");	
		} else {
			header("WWW-Authenticate: Basic realm=\"Example System\"");
			header("HTTP/1.0 401 Unauthorized");
		}
	}

	function generatePage($title="Main") {
		    $page = <<<EOPAGE
			<!doctype html>
			<html>
			    <head> 
			        <meta charset="utf-8" />
			        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
			        <link rel="stylesheet" type="text/css" href="style.css">
        			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			        <title>$title</title>	
			    </head>
			            
			    <body>
			    	<div class="container">
			    		<div class="page-header">
							<img src="umd_logo.png" width="25%" alt="Maryland Logo">
			    		</div>
			    			<img src="testudo.jpg" alt="Testudo">
			    			<h2>Welcome to UMCP <br> Application System</h2>
						<form action="{$_SERVER["PHP_SELF"]}" method="post">
							<input class="btn btn-default" type="submit" name="submit" value="Submit Application"/>
							<input class="btn btn-default" type="submit" name="review" value="Review Application"/>
							<input class="btn btn-default" type="submit" name="update" value="Update Application"/>
							<input class="btn btn-default" type="submit" name="administrative" value="Administrative"/><br>
						</form>	
						<hr>
						<p>If you have any questions about our system, please contact the system administrator at <a href="mailto:mskay@terpmail.umd.edu">mskay@terpmail.umd.edu</a></p>
			    	</div>
			    </body>
			</html>
EOPAGE;

	    	return $page;
		}
	echo generatePage();
?>