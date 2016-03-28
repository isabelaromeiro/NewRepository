<?php include_once('header.php') ?>

<div class="row">
	<div class="page-header">
		  <h1>Old Book</h1>
		  <small>03/15/2016</small>
		</div>
	<div class="col-lg-8 col-md-8 col-sm-8">
    	<!-- Main Image -->
		<div class="product-main-image-container">
			<span class="thumbnail product-main-image" style="position: relative; overflow: hidden;">
				<img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="">
			<img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg.jpg" class="zoomImg" style="position: absolute; top: -3.41117px; left: -0.883249px; opacity: 0; width: 400px; height: 400px; border: none; max-width: none; max-height: none;"></span>
		</div>
		<!-- End Main Image -->

		<!-- Thumbnail Image -->
		<div class="col-xs-3 product-thumb-image">
			<div class="thumbnail">
				<img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="">
			</div>
		</div>
		<div class="col-xs-3 product-thumb-image">
			<div class="thumbnail">
				<img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="">
			</div>
		</div>
		<div class="col-xs-3 product-thumb-image">
			<div class="thumbnail">
				<img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="">
			</div>
		</div>
		<div class="col-xs-3 product-thumb-image">
			<div class="thumbnail">
				<img src="http://i.kinja-img.com/gawker-media/image/upload/s--7WEGP3rN--/18erfmauko2vrjpg.jpg" alt="">
			</div>
		</div>
		<!-- End Thumbnail Image -->
	</div>

	<div class="col-md-4 well">
		<h2 class="text-success">$5.00</h2>
		<h4>Item description</h4>
		<div>This is just an old book.</div>
		<div class="right">
			<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal">I Want It!</button>
		</div>
		<h4>Seller Information</h4>
		<div>Seller name</div>
		<div><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Seller email</div>
		<div> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Seller phone number</div>
		
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm?</h4>
      </div>
      <div class="modal-body">
        Are you sure that you want this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"  data-toggle="modal" data-target="#confirmModal">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thank you!</h4>
      </div>
      <div class="modal-body">
        Please wait for the seller contact.
      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php') ?>