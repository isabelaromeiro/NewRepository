<div class="container">
	
	<div class="page-header">
		  <h1><?php echo $formInfo["title"] ?></h1>
		</div>
	<div class="col-lg-8 col-md-8 col-sm-8">
    	<!-- Main Image -->
		<div class="product-main-image-container">
			<span class="thumbnail product-main-image" style="position: relative; overflow: hidden;">
				<img <?php echo "src='" . $formInfo["image"]. "'" ; ?> alt="" style="width: 200px; ">	
			</span>

		</div>
		<!-- End Main Image -->

	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 well">
		<h2 class="text-success">
		<?php 
			print_r($formInfo);
			if($formInfo["is_free"]){
				echo "Free!";
			}else{
				echo "$ ".$formInfo["price"];
			}
		 ?>
		</h2>
		<h4>Item description</h4>
		<div><?php echo $formInfo["description"] ?></div>
		<h4>Seller Information</h4>
		<div>Seller name</div>
		<div><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Seller email</div>
		<div> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Seller phone number</div>
	</div>
</div>