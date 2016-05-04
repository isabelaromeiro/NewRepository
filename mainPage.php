<?php require_once('constants.php') ?>
<?php require_once('utils.php') ?>
<?php include_once('header.php') ?>

		<div class="col-md-3 list-group">
			<h3>Categories</h3>
			<a href="#" class="list-group-item active">
				Cras justo odio
			</a>
			<a href="#" class="list-group-item">Categories</a>
			<a href="#" class="list-group-item">Books</a>
			<a href="#" class="list-group-item">Electronics</a>
			<a href="#" class="list-group-item">Furniture</a>
			<a href="#" class="list-group-item">Games</a>
			<a href="#" class="list-group-item">Home & Kitchen</a>

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
