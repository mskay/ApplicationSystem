<?php

	if (isset($_POST['return'])) {
		header("Location: main.html");
		exit();
	}

	function generatePage($title="Submit") {
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
						<form action="data_submitted.php" method="post">
							<strong>Name: </strong><input type="text" name="name" value=""><br><br>
							<strong>Email:&nbsp</strong><input type="text" name="email" value=""><br><br>
							<strong>GPA:  &nbsp;&nbsp;</strong><input type="text" name="gpa" value=""><br><br>
							<strong>Year: </strong><input type="radio" name="year" value="10">10
							<input type="radio" name="year" value="11">11
							<input type="radio" name="year" value="12">12<br><br>
							<strong>Gender: </strong><input type="radio" name="gender" value="M"> M
							<input type="radio" name="gender" value="F"> F<br><br>
							<strong>Password: </strong><input type="password" name="password"><br><br>
							<strong>Verify Password: </strong><input type="password" name="verifyPassword"><br><br>
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