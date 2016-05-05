<?php
	
	include_once("header.php");
	require_once("utils.php");

	// define variables and set to empty values
	$hasError = false;
	$errors = array();
	$formInfo = array();
	$productInfos = array();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   $formInfo["id_user"] = trim($_POST["id_user"]);
	   $formInfo["category"] = trim($_POST["category"]);
	   $formInfo["title"] = trim($_POST["title"]);
	   $formInfo["date_created"] = trim($_POST["date_created"]);
	   $formInfo["last_update"] = trim($_POST["last_update"]);
	   $formInfo["sold"] = trim($_POST["sold"]);
	   $formInfo["is_free"] = trim($_POST["is_free"]) == "1" ? 1:0;
	   $formInfo["price"] = trim($_POST["price"]);
	   $formInfo["description"] = trim($_POST["description"]);
	   $formInfo["condition"] = trim($_POST["condition"]);

	   //$userInfo = retrieve_info("user", $formInfo['id_user'])->fetch_array(MYSQLI_BOTH);
	  
	}

	$errors = allErrorMessages($formInfo);

	//If there is any error
	if(count($errors) > 0){
		$hasError = true;
	}

	if(!$hasError){

		$product_id = insert_product($_POST);

		$product_info = get_all_products($product_id);

		while ($row = mysqli_fetch_array($product_info)) {
			$formInfo["image"] = $row["image"];
		}

		include_once("product_registered.php");
		//include_once("product_info.php");

		
	}else{
		echo "<ul class='col-md-12' style='margin-top: 20px;'>";
		foreach ($errors as $error) {
			echo "<div class='alert alert-danger' role='alert'><a href='#' class='alert-link'>$error</a></div>";
		}	
		echo "</ul>";
	}

	include_once("footer.php");
	
?>


