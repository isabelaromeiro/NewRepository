<!DOCTYPE html>
<html lang = 'eng'>
	<head>
		<title>Radford Yard Sale</title>
		<meta charset = 'utf-8' />
		<link rel="stylesheet" href="login-style.css"/>

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<script type="text/javascript">
			function validateLogin(){
				$("#emailAlert, #passAlert").hide();
				var isValid = true;
				if($("input[name=email]").val() == ""){
					isValid = false;
					$("#emailAlert").show();
				}

				if($("input[name=password]").val() == ""){
					isValid = false;
					$("#passAlert").show();
				}

				return isValid;
				
			}
		</script>
	</head>
	<body>
		<div id='login'>
			<div id='loginFields'>
				<p id='title'>Radford Yard Sale</p>
				<form action='login-handler.php' method='post' onsubmit="return validateLogin();">
					<span id="emailAlert" style="display:none;color:red;">Please, give an email.</span>
					<input class='field' type='text' name='email' placeholder='Email Address' onchange="return validateLogin();"/><br/>
					<span id="passAlert" style="display:none;color:red;">Please, give a password.</span>
					<input class='field' type='password' name='password' placeholder='Password' onchange="return validateLogin();"/><br/>
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