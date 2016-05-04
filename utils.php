<?php 
require_once("db.php");
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
				$imageId = $conn->insert_id;
				echo $sql;
	        }
	    }
	    else
	    {
	        echo "formato nao permitido";
	    }
	}

	// // Check if image file is a actual image or fake image
 //    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
 //    if($check !== false) {
 //        echo "File is an image - " . $check["mime"] . ".";
 //        $uploadOk = 1;
 //    } else {
 //        echo "File is not an image.";
 //        $uploadOk = 0;
 //    }


 //    // Check image size
	// if ($_FILES["productImage"]["size"] > 500000) {
	//     echo "Sorry, your image is too large.";
	//     $uploadOk = 0;
	// }

	return $imageId;
	
}

function insert_product($POST){

	date_default_timezone_set('UTC');

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
		$description 	=	mysqli_real_escape_string($conn, $POST['description']);	
		$condition 		=	mysqli_real_escape_string($conn, $POST['condition']);
		$id_image 		=   upload_product_image($conn);
		// $id_image 		=   1;
		// add resistances/weaknessess
		$sql = "INSERT INTO `product` (`id_user`, `id_category`, `title`, `date_created`, `last_update`, `sold`, `is_free`, `description`, `condition`, `id_image`) VALUES ($id_user, $id_category, '$title', '$date_created' , '$last_update', $sold, $is_free, '$description' , '$condition', $id_image)";

		if (!mysqli_query($conn, $sql)) {
			 echo "Error: " . mysqli_error($conn);
		}

	}
	
	$conn->close();
}

function products($list){


	while ($row = mysqli_fetch_array($list)) {  # Note use of `=` for assignment *and* return value
		echo "<div class='product'>
			<div class='img'>";
		echo "<img class='productImage' src='" . $row['image'] ."' alt='" . $row['name'] . "'/>";
			
		echo "</div><div class='left'><ul>";

		echo "<li class='top'>" . $row['title'] . "</li>";
		echo "<li>" . $row['category'] . "</li>";

		echo "</ul></div>";

		$price = $row['is_free'] == 0? "Free!": "$ ".$row['price'];

		echo "<div class='right'><ul>";
		echo "<li class='top'>" . $price . "</li>";
		echo "<li>" . $row['date_created'] . "</li></ul></div></div>";


		// We could also use $row[0], $row[1], $row[2] but it's preferred to use column-name when possible.
	}
}

function get_all_products(){
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	
	if ($conn->connect_error) {
	    echo "Sorry, this website is experiencing problems.";
	    exit;
	}

	$query = "SELECT * FROM `product`, `category`, `image` WHERE `product`.`id_category` = `category`.`id_category` AND `product`.`id_image` = `image`.`id_image`;";

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

function header_dropdown () {

	session_start();

	if ( $_SESSION["logged_in"] === true) {
		$username = get_username();
		$html = "<div class='dropdown pull-right'>
				    <button class='btn btn-default dropdown-toggle' type='button' data-toggle='dropdown'>$username
				    <span class='caret'></span></button>
				    <ul class='dropdown-menu'>
				      <li><a href='mainPage.php'>Home</a></li>
				      <li><a href='announce.php'>Announce</a></li>
				      <li><a href='myProducts.php'>My Products</a></li>
				      <li class='divider'></li>
				      <li><a href='logout.php'>Logout</a></li>
				    </ul>
				  </div>";

	} else {
		$html = "<div class='dropdown pull-right'>
				    <button class='btn btn-default dropdown-toggle' type='button' data-toggle='dropdown'>Hello, Guest! 
				    <span class='caret'></span></button>
				    <ul class='dropdown-menu'>
				      <li><a href='mainPage.php'>Home</a></li>
				      <li><a href='login.php'>Sign in</a></li>
				      <li><a href='register.php'>Sign up</a></li>
				    </ul>
				  </div>";
	}

	return $html;

}


?>