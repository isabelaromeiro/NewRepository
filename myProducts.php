<?php 
	session_start();
	include_once("db.php");
	include_once("header.php"); 
	
	$id_user = get_id();

?>
		<h3>My Products</h3><br/>
		<div class="col-md-9 row">
		<?php
			$results = get_my_products($id_user);
			// $row = $result->fetch_array(MYSQLI_ASSOC);

			echo(products($results));
		?>

		</div>


<?php include_once("footer.php"); ?> 