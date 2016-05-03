			/* Clears all the text from an …-err node when the field succesfully validates. */
			/* @param pId: a string that contains the p tag id. */
			function clearErrorMessages (pId) {
				document.getElementById(pId).innerHTML = "";
			}

			/* Reports an already-discovered error-message, within the web page. */
			/* @param pId: a string that contains the p tag id. */
			/* @param errorMessage: a string that contains the error message to that id. */
			function reportError (pId, errorMessage) {
				clearErrorMessages(pId);

				var error = document.createTextNode(errorMessage);
				document.getElementById(pId).appendChild(error);
			}

			// validate name
			function validateName () {
				var name = document.forms["registerForm"]["name"].value;
				var valid = true;
				var errorMessage;

				if (!name.match(/[A-Za-z]+/)) {
					valid = false;
					errorMessage = "The name must contain only letters.";
				}
				if (name.length > 50) {
					valid = false;
					errorMessage = "The name is too long. Max: 50 characters.";
				}

				if (valid){
					clearErrorMessages('nameError');
					return valid;
				} else {
					reportError('nameError', errorMessage);
					return valid;
				}
			}

			// validate email
			function validateEmail () {
				var email = document.forms["registerForm"]["email"].value;
				var valid = true;
				var errorMessage;

				if (!email.match(/[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm)) {
					valid = false;
					errorMessage = "The e-mail is invalid.";
				}

				if (valid){
					clearErrorMessages('emailError');
					return valid;
				} else {
					reportError('emailError', errorMessage);
					return valid; 
				}
			}

			// validate phone
			function validatePhone () {
				var phone = document.forms["registerForm"]["phone"].value;
				var valid = true;
				var errorMessage;

				if (!phone.match(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/)) {
					valid = false;
					errorMessage = "The phone number is invalid.";
				}

				if (valid){
					clearErrorMessages('phoneError');
					return valid;
				} else {
					reportError('phoneError', errorMessage);
					return valid; 
				}
			}

			// validate password
			function validatePassword () {
				var password = document.forms["registerForm"]["password"].value;
				var valid = true;
				var errorMessage;

				if (password.length < 6) {
					valid = false;
					errorMessage = "The password is too short. Min: 6 characters.";
				}

				if (password.length > 25) {
					valid = false;
					errorMessage = "The password is too long. Max: 25 characters.";
				}

				if (valid){
					clearErrorMessages('passwordError');
					return valid;
				} else {
					reportError('passwordError', errorMessage);
					return valid; 
				}
			}

			// validate confirm password
			function validateConfirmPassword () {
				var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
				var password = document.forms["registerForm"]["password"].value;
				var valid = true;
				var errorMessage;

				if (confirmPassword.localeCompare(password) != 0) {
					valid = false;
					errorMessage = "The passwords are different.";
				}

				if (valid){
					clearErrorMessages('confirmPasswordError');
					return valid;
				} else {
					reportError('confirmPasswordError', errorMessage);
					return valid; 
				}
			}