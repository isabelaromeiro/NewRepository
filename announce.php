<?php
	include_once('header.php');
?>

<form id="product_form" action="announce-handler.php" method="post" enctype="multipart/form-data" onsubmit="return validateAll();">

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
		<select id="condition" name="condition" class="form-control">
			<option value="">Select One</option>
			<option value="used">Used</option>
			<option value="new">New</option>
		</select>
	</div>
	<div class="checkbox col-md-12">
	    
	</div>

	<div class="form-group col-md-4">
		<div class="input-group">
		  <label for="price">Price ($)</label>
		  <input name="price" id="price" type="number" step="0.01" class="form-control" aria-label="Amount (to the nearest dollar)">
		</div>
		<label>
	    	<input name="is_free" id="is_free" type="checkbox" onclick="checkFree();"> Free
	    </label>
	</div>

	<div class="form-group col-md-12">
	    <label for="exampleInputFile">Product Image</label>
	    <input type="file" id="productImage" name="productImage">
	</div>
	
	<div class="form-group col-md-12">
		<label for="title">Description</label>
		<textarea id="description" name="description" class="form-control"></textarea>
	</div>

	<div class="form-group col-md-12">
		<button name="formBtn" id="formBtn" class="btn btn-primary">Register Product</button>
	</div>
	
</form>

<?php include_once('footer.php') ?>