<?php

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
			    		<h2>Applications</h2>
			    		<p>Select fields to display</p>
						<form action="display_applications.php" method="post">
							<select multiple>
							  <option value="name">name</option>
							  <option value="email">email</option>
							  <option value="gpa">gpa</option>
							  <option value="year">year</option>
							  <option value="gender">gender</option>
							</select>
							<br><br>
							<strong>Select field to sort applications </strong><select>
								<option value="nameSort">name</option>
								<option value="emailSort">email</option>
								<option value="gpaSort">gpa</option>
								<option value="yearSort">year</option>
								<option value="genderSort">gender</option>
							</select>
							<br><br>
							<strong>Filter condition </strong><input type="text" name="condition" value=""><br><br>
							<input class="btn btn-default" type="submit" name="submit" value="Display Applications"/><br><br>
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