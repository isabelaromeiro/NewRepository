<?php 

require_once("constants.php");

function dropdown($list, $name, $topOption){

	$currSelect = "<select name=\"$name\" id=\"$name\" class=\"form-control\">\n";

	if(is_string($topOption)){
		$currSelect .= "  <option value=''>$topOption</option>";
	}else if(is_bool($topOption) && $topOption == true){
		$currSelect .= "  <option value=''>Select One</option>";
	}

	// $list = $list->fetch_array(MYSQLI_ASSOC);

	while ($row = mysqli_fetch_array($list)) {  # Note use of `=` for assignment *and* return value
		$currSelect .= "  <option value=\"" . $row['id_category']. "\" >" . $row['category'] . "</option>\n";
		// We could also use $row[0], $row[1], $row[2] but it's preferred to use column-name when possible.
	}


	// foreach ($list as $item) {
	// 	$currSelect .= "  <option value=\"$item\" >$item</option>\n";
	// }

	return $currSelect . "</select>";

}

function retrieve_info($tablename, $id = NULL){	
	
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	
	if ($conn->connect_errno) {
	    echo "Sorry, this website is experiencing problems.";
	    exit;
	} else if(!empty($id)) {
		$query = "SELECT * FROM " . $tablename . " WHERE id=$id;";
		$allRows = mysqli_query($conn, $query);
		
		$numRows = mysqli_num_rows($allRows);
		if ($numRows == 0) {
			$info = array();
		} else {
			$info = $allRows;
		}
		
		$conn->close();

		
		return $info;

	} else {
		$query = "SELECT * FROM `". $tablename . "`;";
		$allRows = mysqli_query($conn, $query);
		
		$numRows = mysqli_num_rows($allRows);
		if ($numRows == 0) {
			$infos = array();
		} else {
			$infos = $allRows;
		}
		
		$conn->close();
	
		return $infos;
	}

}

function upload_product_image($conn){
	// $uploadOk = 1;
	// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$imageId = 0;

	$allow = array("jpg", "jpeg", "gif", "png");

	$todir = 'uploads/products/';

	$temp = explode(".", $_FILES["productImage"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	// move_uploaded_file($_FILES["productImage"]["tmp_name"], "../img/imageDirectory/" . $newfilename);

	$target_file = $todir . $newfilename;

	if ( !!$_FILES['productImage']['tmp_name'] ) // is the file uploaded yet?
	{
	    $info = explode('.', strtolower( $_FILES['productImage']['name']) ); // whats the extension of the file

	    if ( in_array( end($info), $allow) ) // is this file allowed
	    {
	        if ( move_uploaded_file( $_FILES['productImage']['tmp_name'], $target_file ) )
	        {
	            $sql = "INSERT INTO `image` (`name`, `image`) VALUES ('image_name', '$target_file')";
				mysqli_query($conn, $sql);
				$imageId = mysqli_insert_id($conn);
	        }
	    }
	    else
	    {
	        echo "formato nao permitido";
	    }
	}


	return $imageId;
	
}

function insert_product($POST){

	date_default_timezone_set('UTC');

	$id_product = "";

	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	
	if ($conn->connect_error) {
	    echo "Sorry, this website is experiencing problems.";
	    exit;
	} else {
			
		$id_user 	=	mysqli_real_escape_string($conn, $POST['id_user']);	
		$id_user 		=	1;	
		$id_category 	=	mysqli_real_escape_string($conn, $POST['category']);	
		$title 			=	mysqli_real_escape_string($conn, $POST['title']);	
		$date_created 	=	date("Y-m-d");
		$last_update 	=	$date_created;
		$sold 			=	0;
		$is_free 		=	mysqli_real_escape_string($conn, $POST['is_free'])? 0:1;
		$title 			=	mysqli_real_escape_string($conn, $POST['price']);
		$description 	=	mysqli_real_escape_string($conn, $POST['description']);	
		$condition 		=	mysqli_real_escape_string($conn, $POST['condition']);
		$id_image 		=   upload_product_image($conn);
		// $id_image 		=   1;
		// add resistances/weaknessess
		$sql = "INSERT INTO `product` (`id_user`, `id_category`, `title`, `date_created`, `last_update`, `sold`, `is_free`, `description`, `condition`, `id_image`) VALUES ($id_user, $id_category, '$title', '$date_created' , '$last_update', $sold, $is_free, '$description' , '$condition', $id_image)";
		

		if ($result = mysqli_query($conn, $sql)) {
		    $id_product = $conn->insert_id;
		}else{
			echo "Error: " . mysqli_error($conn);
		}

	}
	
	$conn->close();

	return $id_product;
}

function products($list){


	while ($row = mysqli_fetch_array($list)) {  # Note use of `=` for assignment *and* return value
		echo "<a href='/productPage.php?id=" . $row["id_product"] ."'> <div class='product'>
			<div class='img'>";
		echo "<img class='productImage' src='" . $row['image'] ."' alt='" . $row['name'] . "'/>";
			
		echo "</div><div class='left'><ul>";

		echo "<li class='top'>" . $row['title'] . "</li>";
		echo "<li>" . $row['category'] . "</li>";

		echo "</ul></div>";

		$price = $row['is_free'] == 0? "Free!": "$ ".$row['price'];

		echo "<div class='right'><ul>";
		echo "<li class='top'>" . $price . "</li>";
		echo "<li>" . $row['date_created'] . "</li></ul></div></div></a>";


		// We could also use $row[0], $row[1], $row[2] but it's preferred to use column-name when possible.
	}
}

function get_all_products($id_product=NULL){
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	
	if ($conn->connect_error) {
	    echo "Sorry, this website is experiencing problems.";
	    exit;
	}

	if(!empty($id_product)) {
		$query = "SELECT * FROM `product`, `category`, `image` WHERE `product`.`id_product` = $id_product AND `product`.`id_category` = `category`.`id_category` AND `product`.`id_image` = `image`.`id_image`;";
	}else{
		$query = "SELECT * FROM `product`, `category`, `image` WHERE `product`.`id_category` = `category`.`id_category` AND `product`.`id_image` = `image`.`id_image`;";
	}

	$allRows = mysqli_query($conn, $query);
	
	$numRows = mysqli_num_rows($allRows);
	$conn->close();
	if ($numRows == 0) {
		return array();
	} else {
		return $allRows;
	}
		
}

function stringErrorMessage($string,$required){
	$stringLen = strlen($string);
	$errorMessage = false;
	
	if($required && $stringLen == 0){
		$errorMessage = "is required";
	}

	return $errorMessage;

}

function allErrorMessages($formInfo){

		$errors = array();

		$titleError = stringErrorMessage($formInfo["title"], true);
		if($titleError){
			$errors["title"] = "The title " . $titleError;
		}

		$categoryError = stringErrorMessage($formInfo["category"], true);
		if($categoryError){
			$errors["category"] = "The category " . $categoryError;
		}

		$conditionError = stringErrorMessage($formInfo["condition"], true);
		if($conditionError){
			$errors["condition"] = "The condition " . $conditionError;
		}

		if(!$formInfo["is_free"] && !$formInfo['price']){
			$errors["price"] = "If it's not free, please give a price.";
		}

		$descriptionError = stringErrorMessage($formInfo["description"], true);
		if($descriptionError){
			$errors["description"] = "The description " . $descriptionError;
		}


		return $errors;

	}


?>