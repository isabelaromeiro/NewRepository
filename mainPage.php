<?php require_once('constants.php') ?>
<?php require_once('utils.php') ?>
<?php include_once('header.php') ?>
<?php include_once('categories-menu.php') ?>


		<h3>Most Recents</h3>

		<div class="col-md-9 row">
		<?php
			$results = get_all_products();
			// $row = $result->fetch_array(MYSQLI_ASSOC);

			echo(products($results));
		?>

		</div>
		
		
		  

<?php include_once('footer.php') ?>
