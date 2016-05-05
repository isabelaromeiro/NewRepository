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