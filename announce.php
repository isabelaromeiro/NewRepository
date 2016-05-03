<?php include_once('header.php') ?>
<form action="announce-handle.php" method="post" enctype="multipart/form-data">

	<div class="form-group col-md-4">
		<label for="title">Title</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Product title">
	</div>
	<div class="form-group col-md-4">
		<label for="title">Category</label>
		<?php
			$results = retrieve_info('category');
			// $row = $result->fetch_array(MYSQLI_ASSOC);
			echo(dropdown($results,"category", true));
		?>
		<!-- <select class="form-control">
			<option>Select One</option>
		</select> -->
	</div>
	<div class="form-group col-md-4">
		<label for="title">Condition</label>
		<select name="condition" class="form-control">
			<option>Select One</option>
			<option value="used">Used</option>
			<option value="new">New</option>
		</select>
	</div>
	<div class="checkbox col-md-12">
	    <label>
	    	<input name="is_free" type="checkbox"> Free
	    </label>
	</div>

	<div class="form-group col-md-4">
		<div class="input-group">
		  <span class="input-group-addon">$</span>
		  <input name="" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
		</div>
	</div>

	<div class="form-group col-md-12">
	    <label for="exampleInputFile">Product Image</label>
	    <input type="file" id="productImage" name="productImage">
	</div>
	
	<div class="form-group col-md-12">
		<label for="title">Description</label>
		<textarea name="description" class="form-control"></textarea>
	</div>

	<div class="form-group col-md-12">
		<button class="btn btn-primary">Register Product</button>
	</div>
	
</form>

<?php include_once('footer.php') ?>