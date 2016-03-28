<?php include_once('header.php') ?>
<form>
	<div class="form-group col-md-4">
		<label for="title">Title</label>
		<input type="text" class="form-control" id="title" placeholder="Product title">
	</div>
	<div class="form-group col-md-4">
		<label for="title">Category</label>
		<select class="form-control">
			<option>Select One</option>
		</select>
	</div>
	<div class="form-group col-md-4">
		<label for="title">Condition</label>
		<select class="form-control">
			<option>Select One</option>
		</select>
	</div>
	<div class="checkbox col-md-12">
	    <label>
	    	<input type="checkbox"> Free
	    </label>
	</div>

	<div class="form-group col-md-4">
		<div class="input-group">
		  <span class="input-group-addon">$</span>
		  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
		</div>
	</div>

	<div class="form-group col-md-12">
	    <label for="exampleInputFile">Product Image</label>
	    <input type="file" id="exampleInputFile">
	</div>
	<div class="form-group">
		<div class="col-xs-6 col-md-3">
			<a href="#" class="thumbnail">
			    <img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="...">
			</a>
		</div>
		<div class="col-xs-6 col-md-3">
			<a href="#" class="thumbnail">
			    <img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="...">
			</a>
		</div>
		<div class="col-xs-6 col-md-3">
			<a href="#" class="thumbnail">
			    <img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="...">
			</a>
		</div>
	 </div>
	<div class="form-group col-md-12">
		<label for="title">Description</label>
		<textarea class="form-control"></textarea>
	</div>
	<div class="form-group col-md-12">
		<button class="btn btn-primary">Register Product</button>
	</div>
	
</form>

<?php include_once('footer.php') ?>