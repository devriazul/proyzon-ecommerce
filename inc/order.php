<?php 


if (isset($_POST['Place_Order'])) {

	$order_id		=strtoupper($_POST['order_id']);	
	$customer_id	=$_POST['customer_id'];	
	$address_id		=$_POST['address_id'];

	$insert_Order = "INSERT INTO `orders`(

		    `order_id`,
		    `customer_id`,
		    `address_id`,
		    `Order_Date`) 

			VALUES(

			'$order_id',
			'$customer_id',
			'$address_id',
			 NOW()

			)";	


	if (mysqli_query($conn, $insert_Order)) {


		   foreach ($_SESSION['shopping_cart'] as $key => $values) {

			   	//$Order_ID
			   	$product_id=$values['item_id'];		   	
			    $unit_price=$values['item_price'];
			    $quantity = $values['item_qtn'];

				$insert_Orderinfo = "INSERT INTO `order_info`(

				    `order_id`,
				    `product_id`,
				    `unit_price`,
				    `quantity`)

					VALUES(

					'$order_id',
					'$product_id',
					'$unit_price',
					'$quantity'

				)";	

				mysqli_query($conn, $insert_Orderinfo);
                 
            }
            
            unset($_SESSION["shopping_cart"]);
            Reconect('order-success.php');

	}else{

		echo "Error: " . $insert_Order . "<br>" . mysqli_error($conn);
	}

}

?>