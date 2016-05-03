<!DOCTYPE html>
<html lang = 'eng'>
	<head>
		<title>Register - Radford Yard Sale</title>
		<meta charset = 'utf-8' />
		<link rel="stylesheet" href="login-style.css"/>
		<script src="register-script.js"></script>
	</head>
	<body>
		<div id='login'>
			<div id='loginFields'>
				<p id='title'>Radford Yard Sale</p>
				<form name="registerForm" action='register-handler.php' method='post'>
					<p class="error-msg" id="nameError"></p>
					<input class='field' type='text' name='name' placeholder='Name *' onchange="validateName();"/><br/>
					
					<p class="error-msg" id="emailError"></p>
					<input class='field' type='text' name='email' placeholder='Email Address *' onchange="validateEmail();"/><br/>
					
					<p class="error-msg" id="phoneError"></p>
					<input class='field' type='text' name='phone' placeholder='Phone Number *' onchange="validatePhone();"/><br/>
					
					<p class="error-msg" id="passwordError"></p>
					<input class='field' type='password' name='password' placeholder='Password *' onchange="validatePassword();"/><br/>
					
					<p class="error-msg" id="confirmPasswordError"></p>
					<input class='field' type='password' name='confirmPassword' placeholder='Confirm Password *' onchange="validateConfirmPassword();"/><br/>

					<input class='button' type='submit' value='Register'/>
				</form>
				<a href='login.php'>Back</a>
			</div>
		</div>
		<footer>
			<p>Radford Yard Sale | 2016</p>
			<p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
		</footer>
	</body>
</html>