<?php 
	session_start();
	session_destroy(); ?>

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
				<form action='login.php' method='post'>
					<p>See ya! :)</p>
					<input class='button' type='submit' value='Ok'/>
				</form>
			</div>
		</div>
		<footer>
			<p>Radford Yard Sale | 2016</p>
			<p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
		</footer>
	</body>
</html>