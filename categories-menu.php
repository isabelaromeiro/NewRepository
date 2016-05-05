<div class="col-md-3 list-group">

	<h3>Categories</h3>
	<a href='mainPage.php' class='list-group-item'>All</a>
	<?php 
		$categories = retrieve_info("category");

		while ($row = mysqli_fetch_array($categories)) {
			echo "<a href='search-handler.php?category=" . $row['category'] ."' class='list-group-item'>" . $row['category'] ." </a>";

		}
	 ?>
	<br />
	<a href="announce.php">
		<button type="button" class="col-xs-12 col-lg-12 col-md-12 col-sm-12 btn btn-success btn-lg">Announce product</button>
	</a>

</div>