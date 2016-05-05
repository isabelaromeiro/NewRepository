<?php 
	session_start();
	require_once("db.php");
	require_once("utils.php");
	require_once("header.php");

	if(isset($_GET["srch-term"])) { 
		$search_term = $_GET["srch-term"];
	} 
	else if (isset($_GET["category"])) {
		$search_term = $_GET["category"];
	}
?>

	<?php include_once('categories-menu.php') ?>

		<h3>Results for: '<?php echo $search_term?>'</h3><br/>
		<div class="col-md-9 row">
		<?php
			$results = search_result($search_term);
			// $row = $result->fetch_array(MYSQLI_ASSOC);

			echo(products($results));
		?>

		</div>


<?php require_once("footer.php"); ?>