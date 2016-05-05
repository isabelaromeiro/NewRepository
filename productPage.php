<?php include_once('header.php') ?>
<?php include_once('constants.php') ?>

<div class="row">
   
    
    <?php

        if(!empty($_GET['id'])){
        	if(isset($_GET['sold'])){
	    		product_sold($_GET['id']);
	    	}
            $product_info = get_all_products($_GET['id']);
            $formInfo = $product_info->fetch_array(MYSQLI_BOTH);
            $userInfo = retrieve_info("user", $formInfo['id_user'])->fetch_array(MYSQLI_BOTH);
            include_once("product_info.php");
        }

     ?>

</div>

<?php include_once('footer.php') ?>