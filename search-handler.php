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

	<div class="col-md-3 list-group">
			<h3>Categories</h3>
			<a href="#" class="list-group-item active">
				Cras justo odio
			</a>
			<?php 
				$categories = retrieve_info("category");

				while ($row = mysqli_fetch_array($categories)) {
					echo "<a href='search-handler.php?category=" . $row['category'] ."' class='list-group-item'>" . $row['category'] ." </a>";

				}
		?>
	</div>

		<h3>Results for: '<?php echo $search_term?>'</h3><br/>
		<div class="col-md-9 row">
		<?php
			$results = search_result($search_term);
			// $row = $result->fetch_array(MYSQLI_ASSOC);

			echo(products($results));
		?>

		</div>


<?php require_once("footer.php"); ?>