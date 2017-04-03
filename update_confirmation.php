<?php
	session_start();
	
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$gpa = trim($_POST['gpa']);
	$year = trim($_POST['year']);
	$gender = trim($_POST['gender']);
	$password = trim($_POST['password']);
	$originalEmail = $_SESSION['email'];

	$user = 'dbuser';
	$pass = 'goodbyeWorld';
	$table = "applicants";
	$db = 'applicationdb';

	/* Connecting to the database */		
	$db_connection = new mysqli('localhost', $user, $pass, $db);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	}
	/* Query */
	$query = "update $table set name='{$name}', email='{$email}', gpa={$gpa}, year={$year}, gender='{$gender}', password='{$password}' where email='{$originalEmail}'";
			
	/* Executing query */
	$result = $db_connection->query($query);
	if (!$result) {
		die("Insertion failed: " . $db_connection->error);
	}
	
	/* Closing connection */
	$db_connection->close();

	function generatePage($name, $email, $gpa, $year, $gender, $title="Main") {
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
						<form action="main.html" method="post">
							<h3>The entry has been updated in the database and the new values are:</h3>
							<strong>Name: </strong>$name<br>
							<strong>Email:&nbsp</strong>$email<br>
							<strong>GPA:  &nbsp;&nbsp;</strong>$gpa<br>
							<strong>Year: </strong>$year<br>
							<strong>Gender: </strong>$gender<br>
							<input class="btn btn-default" type="submit" name="return" value="Return to main menu"/><br>
						</form>	
			    	</div>
			    </body>
			</html>
EOPAGE;

	    	return $page;
		}
	echo generatePage($name, $email, $gpa, $year, $gender);
?>