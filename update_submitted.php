<?php
	session_start();

	$checked10 = "";
	$checked11 = "";
	$checked12 = "";
	$checkedM = "";
	$checkedF = "";

	if ($_SESSION['year'] == 10) {
		$checked10 = "checked";
	} elseif ($_SESSION['year'] == 11) {
		$checked11 = "checked";
	} elseif ($_SESSION['year'] == 12) {
		$checked12 = "checked";
	}

	if ($_SESSION['gender'] == 'M') {
		$checkedM = "checked";
	} elseif ($_SESSION['gender'] == 'F') {
		$checkedF = "checked";
	}

	function generatePage($checked10, $checked11, $checked12, $checkedM, $checkedF, $title="Submit") {
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
						<form action="update_confirmation.php" method="post">
							<strong>Name: </strong><input type="text" name="name" value="{$_SESSION['name']}"><br><br>
							<strong>Email:&nbsp</strong><input type="text" name="email" value="{$_SESSION['email']}"><br><br>
							<strong>GPA:  &nbsp;&nbsp;</strong><input type="text" name="gpa" value="{$_SESSION['gpa']}"><br><br>
							<strong>Year: </strong><input type="radio" name="year" value="10" $checked10>10
							<input type="radio" name="year" value="11" $checked11>11
							<input type="radio" name="year" value="12" $checked12>12<br><br>
							<strong>Gender: </strong><input type="radio" name="gender" value="M" $checkedM> M
							<input type="radio" name="gender" value="F" $checkedF> F<br><br>
							<strong>Password: </strong><input type="password" name="password" value="{$_SESSION['password']}"><br><br>
							<strong>Verify Password: </strong><input type="password" name="verifyPassword" value="{$_SESSION['password']}"><br><br>
							
							<input class="btn btn-default" type="submit" name="submit" value="Submit Data"/><br><br>
							<a class="btn btn-default" href="main.html">Return to main menu</a>
						</form>	
			    	</div>
			    </body>
			</html>
EOPAGE;

	    	return $page;
		}
	echo generatePage($checked10, $checked11, $checked12, $checkedM, $checkedF);
?>