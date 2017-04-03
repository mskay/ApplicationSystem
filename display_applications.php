<?php
	session_start();

	$condition = $_POST['condition']
	
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
						<table>
							<tr>
								<th>Name</th>
								<th>Email</th> 
								<th>GPA</th>
								<th>Year</th>
								<th>Gender</th>
							</tr>
						</table>
						<a class="btn btn-default" href="main.html">Return to main menu</a>
			    	</div>
			    </body>
			</html>
EOPAGE;

	    	return $page;
		}
	echo generatePage();
?>