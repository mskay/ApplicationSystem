<?php
	session_start();

	$condition = $_POST['condition']
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	$user = 'dbuser';
	$pass = 'goodbyeWorld';
	$table = "applicants";
	$db = 'applicationdb';

	
	$db = connectToDB('localhost', $user, $pass, $db) or die("Unable to connect");
	$sqlQuery = sprintf("select name, email, gpa, year, gender, password from %s where email='%s'", $table, $email);
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$numberOfRows = mysqli_num_rows($result);
	 	if ($numberOfRows == 0) {
	 	 	unset($_SESSION['name']);
			echo "<h2>No entry exists in the database for the specified email and password</h2>";
		} else {
			while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$_SESSION['name'] = $recordArray['name'];
				$_SESSION['email'] = $recordArray['email'];
				$_SESSION['gpa'] = $recordArray['gpa'];
				$_SESSION['year'] = $recordArray['year'];
				$_SESSION['gender'] = $recordArray['gender'];
				$_SESSION['password'] = $recordArray['password'];
	     		}
			}
			mysqli_free_result($result);
		}  else {
			unset($_SESSION['name']);
			echo "Retrieving records failed.".mysqli_error($db);
		}

		mysqli_close($db);
	}

	function connectToDB($host, $user, $password, $database) {
		$db = mysqli_connect($host, $user, $password, $database);
		if (mysqli_connect_errno()) {
			echo "Connect failed.\n".mysqli_connect_error();
			exit();
		}
		return $db;
	}

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