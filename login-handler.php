<?php

	//connecting to database
	$conn = mysqli_connect("localhost", "proj6", "brasil2016", "proj6");
	if (!$conn) {
		echo "Error" . mysql_error();
		exit;
	}

	$email = $_POST["email"];
	$password = hash("md5", $_POST["password"]);

	if ($email != "" && $password != "") {
		$query = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		if (!$result) {
			echo "Could not run query: " . mysql_error();
			exit;
		}

		$row = mysqli_fetch_row($result);
		if($row) {
			session_start();
			//storing email in session
			$_SESSION["email"] = $email;
			header("location:mainPage.php");
			exit();
		} else {
			?> 
			<!DOCTYPE html>
			<html lang = 'eng'>
				<head>
					<title>Radford Yard Sale</title>
					<meta charset = 'utf-8' />
					<link rel="stylesheet" href="login-style.css"/>
				</head>
				<body>
					<div id='login'>
						<div id='loginFields'>
							<p id='title'>Radford Yard Sale</p>
							<form action='login-handler.php' method='post'>
								<p class="error-msg">Invalid e-mail or password. Please, try again.</p>
								<input class='field' type='text' name='email' placeholder='Email Address' /><br/>
								<input class='field' type='password' name='password' placeholder='Password' /><br/>
								<input class='button' type='submit' value='Login'/>
							</form>
							<a href='register.php'>Register</a> |
							<a href='forgotPassword.php'>Forgot Password?</a>
						</div>
					</div>
					<footer>
						<p>Radford Yard Sale | 2016</p>
						<p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
					</footer>
				</body>
			</html>
		<?php
		}
	}

?>