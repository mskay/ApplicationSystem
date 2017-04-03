<?php
	session_start();

	if (isset($_POST['submit'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
	
		$user = 'dbuser';
		$pass = 'goodbyeWorld';
		$table = "applicants";
		$db = 'applicationdb';

		// Establish connection
		$db_connection = new mysqli('localhost', $user, $pass, $db);
		if ($db_connection->connect_error) {
			die($db_connection->connect_error);
		}
		
		$query = "select name, email, gpa, year, gender, password from {$table} where email='{$email}'";
		$result = $db_connection->query($query);

		if (!$result) {
			unset($_SESSION['name']);
			die("Retrieval failed: ". $db_connection->error);
		} else {
			/* Number of rows found */
			$num_rows = $result->num_rows;
			if ($num_rows === 0) {
				unset($_SESSION['name']);
				echo "<h2>No entry exists in the database for the specified email and password</h2>";
			} else {
				for ($row_index = 0; $row_index < $num_rows; $row_index++) {
					$result->data_seek($row_index);
					$recordArray = $result->fetch_array(MYSQLI_ASSOC);

					$_SESSION['name'] = $recordArray['name'];
					$_SESSION['email'] = $recordArray['email'];
					$_SESSION['gpa'] = $recordArray['gpa'];
					$_SESSION['year'] = $recordArray['year'];
					$_SESSION['gender'] = $recordArray['gender'];
				}
			}
			/* Freeing memory */
			$result->close();
		}

		
		/* Closing connection */
		$db_connection->close();


		if (isset($_SESSION['name'])) {
			header("Location: update_submitted.php");
		}
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
				    	<br>
						<form action="{$_SERVER["PHP_SELF"]}" method="post">
							<strong>Email associated with application:&nbsp</strong><input type="text" name="email" value=""><br><br>
							<strong>Password associated with application: </strong><input type="password" name="password"><br><br>

							<input class="btn btn-default" type="submit" name="submit" value="Submit Data"/><br><br>
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