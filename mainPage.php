<?php require_once('constants.php') ?>
<?php require_once('utils.php') ?>
<?php include_once('header.php') ?>

		<div class="col-md-3 list-group">
			<h3>Categories</h3>
			<?php 
				$categories = retrieve_info("category");

				while ($row = mysqli_fetch_array($categories)) {
					echo "<a href='search-handler.php?category=" . $row['category'] ."' class='list-group-item'>" . $row['category'] ." </a>";

				}
			 ?>

		</div>


		<h3>Most Recents</h3>

		<div class="col-md-9 row">
		<?php
			$results = get_all_products();
			// $row = $result->fetch_array(MYSQLI_ASSOC);

			echo(products($results));
		?>

		</div>
		
		
		  

<?php include_once('footer.php') ?>
