<!DOCTYPE html>
<html lang = 'eng'>
	<head>
		<title>Forgot Password - Radford Yard Sale</title>
		<meta charset = 'utf-8' />
		<style type="text/css">
			html {
				text-align: center;
				font-family: ‘Lucida Sans Unicode’, ‘Lucida Grande’, sans-serif;
				font-size: 12px;
			}

			body {
				background: url('http://imagizer.imageshack.us/a/img923/8540/iKnaiD.jpg');
				background-size: 100%;
				background-repeat: no-repeat;
			}

			#title {
				font-size: 28px;
				font-style: normal;
			}

			#helpText {
				text-align: left;
			}

			#login {
				width: 500px;
				height: 500px;
				position: absolute;
				left: 50%;
				top: 50%;
				margin: -250px 0 0 -250px;
			}

			#loginFields {
				background-color: rgb(255,255,255);
				border: thin solid;
				width: 300px;
				margin: auto;
				padding: 30px;
				padding-top: 0;
				box-shadow: 3px 3px 8px;
				margin-bottom: 10px;
				position: relative;
			}

			.field {
				width: 300px;
				height: 30px;
				margin-bottom: 10px;
			}

			#loginButton {
				width: 306px;
				height: 30px;
				margin-bottom: 10px;
				border-radius: 2px;
				border: thin solid rgb(231,231,231);
				background-color: rgb(231,231,231);
			}

			footer {
				display: block;
				position: absolute;
				color: white;
				bottom: 0;
				left: 0;
				width: 100%;
				height: 100px;
			}
		</style>
	</head>
	<body>
		<div id='login'>
			<div id='loginFields'>
				<p id='title'>Radford Yard Sale</p>
				<form action='loginPageHandler.php' method='post'>
					<p id='helpText'>Enter your e-mail to recover your password.</p>
					<input class='field' type='text' name='email' placeholder='Email Address' /><br/>
					<input id='loginButton' type='submit' value='Recover Password'/>
				</form>
				<a href='loginPage.php'>Back</a>
			</div>
		</div>
		<footer>
			<p>Radford Yard Sale | 2016</p>
			<p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
		</footer>
	</body>
</html>