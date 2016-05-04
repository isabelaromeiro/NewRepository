<?php require_once('constants.php') ?>
<?php require_once('utils.php') ?>
<?php include_once('header.php') ?>

		<div class="col-md-3 list-group">
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
		<!-- <aside>
			<ul>
				<li class='menuTitle'>Categories</li>
				<li><a href='books.php'>Books</a></li>
				<li><a href='electronics.php'>Electronics</a></li>
				<li><a href='furniture.php'>Furniture</a></li>
				<li><a href='games.php'>Games</a></li>
				<li><a href='homeandkitchen.php'>Home & Kitchen</a></li>
			</ul>
		</aside> -->
		<p class='mostRecent'>Most Recents</p>

		<?php
			$results = get_all_products();
			// $row = $result->fetch_array(MYSQLI_ASSOC);
			echo(products($results));
		?>

		<footer>
			<p>Radford Yard Sale | 2016</p>
			<p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
		</footer>
	</body>
</html>