<?php
	session_start();

	function generatePage($title="Review") {
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
			    		<h2>Application found in the database with the following values:</h2>
						<strong>Name: </strong>{$_SESSION['name']} <br>
						<strong>Email: </strong>{$_SESSION['email']} <br>
						<strong>GPA: </strong>{$_SESSION['gpa']} <br>
						<strong>Year: </strong>{$_SESSION['year']} <br>
						<strong>Gender: </strong>{$_SESSION['gender']} <br><br>
						<a class="btn btn-default" href="main.html">Return to main menu</a>
						</form>	
			    	</div>
			    </body>
			</html>
EOPAGE;

	    	return $page;
		}
	echo generatePage();
?>