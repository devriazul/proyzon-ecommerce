<?php 

    include_once 'db.php';
    include_once '../function/function.php';

    $orders=SelectData('orders',"WHERE order_id='".$_GET['order_id']."'");  
    $ordersinfo = mysqli_fetch_array($orders);

    $Address=SelectData('address',"WHERE Address_ID='".$ordersinfo['address_id']."'");  
    $Addressinfo = mysqli_fetch_array($Address); 

    $total_Items='0';
    $total_Bill='0';
    $Items=SelectData('order_info',"WHERE order_id='".$ordersinfo['order_id']."'");
    foreach ($Items as $Item) {
        $total_Items+=$Item['quantity'];
        $total_Bill+=$Item['unit_price']*$Item['quantity'];
    }                       
?>


	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div> 


        <div class="modal-body">
                 <div class="row ">
                    <div class="col-12 QA_section" >
                        <div class="card QA_table ">
                            <div class="card-header">
                                Invoice
                                <strong><?php echo $ordersinfo['order_id']; ?></strong>
                                <span class="float-right "><strong>Status:</strong><?php echo Delivery_Status($ordersinfo['status']); ?></span>

                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h6 class="mb-3">Billing Address</h6>
                                        <div>Name: <?php echo $ordersinfo['customer_id']; ?></div>
                                        <!-- <div>Address: <?php echo $ordersinfo['address_id']; ?></div> -->
                                    </div>

                                    <div class="col-sm-6">
                                        <h6 class="mb-3">Shipping Address</h6>
                                        <div>Name: <?php echo $Addressinfo['Name']; ?></div>
                                        <div>Address: <?php echo $Addressinfo['Address_1']; ?>,<?php echo $Addressinfo['city']; ?>, <?php echo $Addressinfo['Country']; ?></div>
                                        <div>Phone:  <?php echo $Addressinfo['Phone_No']; ?></div>
                                    </div>
                                </div>

                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th class="center"  style="color: white;">#</th>
                                                <th  style="color: white;">Product ID</th>
                                                <th  style="color: white;">Description</th>
                                                <th class="right"  style="color: white;">Product Name</th>
                                                <th class="center"  style="color: white;">Qty</th>
                                                <th class="right"  style="color: white;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                            $total = 0;
                                            $Items=SelectData('order_info',"WHERE order_id='".$ordersinfo['order_id']."'");
                                            $i=1;
                                            foreach ($Items as $Item) {
                                                $products=SelectData('products',"WHERE product_id='".$Item['product_id']."'");
                                                $product=mysqli_fetch_array($products);?>

                                                <tr>
                                                    <td class="center"><?php echo $i++; ?> </td>
                                                    <td class="left strong"><?php echo $product['Product_Code']; ?> </td>
                                                    <td class="left"><?php echo $product['product_name']; ?> </td>
                                                    <td class="right"><img src="products/<?php echo $product['product_image']; ?>" style="width: 50px;"></td>
                                                    <td class="center"><?php echo $Item['quantity']; ?> </td>                        
                                                    <td class="center"><?php echo $Item['unit_price']*$Item['quantity']; ?> </td>
                                                </tr>                     
                                        <?php } ?>
                                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          
    <div class="modal-footer">        
        <form action="" method="post">
            <select class="btn btn-success" name="status">
                <option value="0">Pending</option>
                <option value="1">Processing</option>
                <option value="2">Pickup</option>
                <option value="3">On The Way</option>
                <option value="4">Success</option>
            </select>
            <input type="hidden" name="order_id" value="<?php echo $ordersinfo['order_id']; ?>">
            <input type="hidden" name="customer_id" value="<?php echo $ordersinfo['customer_id']; ?>">
            <button type="submit" name="order_stutas_update" class="btn btn-success" >Submit</button>
            <a href="invoice.php?order_id=<?php echo $ordersinfo['order_id']; ?>"  class="btn btn-warning px-3"><i class="fas fa-print"></i> Print</a>
        </form>  
    </div>