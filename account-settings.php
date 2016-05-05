<?php require_once('constants.php') ?>
<?php require_once('utils.php') ?>
<?php include_once('header.php') ?>

<?php 
	
	$userInfo = retrieve_info("user", get_id())->fetch_array(MYSQLI_BOTH);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userInfo['user_name'] = htmlspecialchars($_POST['user_name']);
		$userInfo['email'] = htmlspecialchars($_POST['email']);
		$userInfo['phone_number'] = htmlspecialchars($_POST['phone_number']);

		$errors = validate_update_user($userInfo);

		if(count($errors) == 0){
			update_user($userInfo);
			$userInfo = retrieve_info("user", get_id())->fetch_array(MYSQLI_BOTH);
			?>
			<div class="col-md-offset-4 col-md-4">
				<div class="alert alert-success" style="margin-top: 50px" role="alert">
				  <a href="#" class="alert-link">User modified!</a>
				</div>
			</div>
		<?php
		}else{
			echo "<ul class='col-md-offset-4 col-md-4' style='margin-top: 20px;'>";
			foreach ($errors as $error) {
				echo "<div class='alert alert-danger' role='alert'><a href='#' class='alert-link'>$error</a></div>";
			}	
			echo "</ul>";
		}

		
	   //$userInfo = retrieve_info("user", $formInfo['id_user'])->fetch_array(MYSQLI_BOTH);
	  
	}	

 ?>

 <div class="col-md-offset-4 col-md-4">
	<form id="product_form" action="account-settings.php" method="post" enctype="multipart/form-data" onsubmit="return validateAll();">
		<div class="form-group col-md-12">
			<label for="title">Name</label>
			<?php echo "<input type='text' value='" . $userInfo['name'] . "' class='form-control' id='user_name' name='user_name' placeholder='User name'>" ?>
			
		</div>
		<div class="form-group col-md-12">
			<label for="title">Email</label>
			<?php echo "<input type='text' value='" . $userInfo['email'] . "' class='form-control' id='email' name='email' placeholder='User email'>" ?>
		</div>
		<div class="form-group col-md-12">
			<label for="title">Phone number (only numbers)</label>
			<?php echo "<input type='text' value='" . $userInfo['phone_number'] . "' class='form-control' id='phone_number' name='phone_number' placeholder='User phone number' maxlength='9'>" ?>
		</div>
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="mainPage.php">Cancel</a>
		</div>
		 
	</form>
</div>	


<?php include_once('footer.php') ?>