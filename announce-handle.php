<?php
	include("header.php");
	require_once("utils.php");
	// define variables and set to empty values
	$hasError = false;
	$errors = array();
	$formInfo = array();

	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//    $formInfo["id_user"] = trim($_POST["id_user"]);
	//    $formInfo["id_category"] = trim($_POST["id_category"]);
	//    $formInfo["title"] = trim($_POST["title"]);
	//    $formInfo["date_created"] = trim($_POST["date_created"]);
	//    $formInfo["last_update"] = trim($_POST["last_update"]);
	//    $formInfo["sold"] = trim($_POST["sold"]);
	//    $formInfo["is_free"] = trim($_POST["is_free"]);
	//    $formInfo["description"] = trim($_POST["description"]);
	//    $formInfo["condition"] = trim($_POST["condition"]);
	//    $formInfo["id_image"] = trim($_POST["id_image"]);
	// }

	// $errors = allErrorMessages($formInfo);

	// //If there is any error
	// if(count($errors) > 0){
	// 	$hasError = true;
	// }

	if(!$hasError){
		// echo "<strong>Trainer: </strong>: ". htmlspecialchars($_POST['trainer']) . "<br />";
		// echo "<strong>Species: </strong>: ". htmlspecialchars($_POST['species']) . "<br />";
		// echo "<strong>Energy: </strong>: ". htmlspecialchars($_POST['energy']) . "<br />";
		// echo "<strong>Weight: </strong>: ". htmlspecialchars($_POST['weight']) . "<br />";
		// echo "<strong>Weight Unit: </strong>: " . htmlspecialchars($_POST['weight-units']) . "<br />";
		// echo "<strong>Flavor Text: </strong>: ". nl2br(htmlspecialchars($_POST['flavor-text'])) . "<br />";

		// echo "<strong>Bias: </strong>: <br />";
		// echo "<ul>";
		// foreach ($energies as $energy) {
		// 	echo "<li>$energy: " . htmlspecialchars($_POST[$energy]) ."</li>";
		// }
		// echo "</ul>";

		echo "Product registered!";


		insert_product($_POST);
		
	}else{
		echo "<ul>";
		foreach ($errors as $error) {
			echo "<li>$error</li>";
		}	
		echo "</ul>";
	}

	include("footer.php");
	
?>
