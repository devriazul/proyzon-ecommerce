<?php 
	include_once("inc/header.php");
 ?>

 <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">

              <table class="table mb-0">
                <tbody>

                <tr>
                	<th>S#</th>
        					<th>Order ID</th>
        					<th>Customer ID</th>
        					<th>Order Date</th>
        					<th>Total Amount</th>
        					<th>Items</th>
        					<th>Status</th>
                </tr>

           <?php
              $i=1;
              $orders=SelectData('orders',"WHERE customer_id='".$_SESSION['username']."'");
              foreach ($orders as $order) {?>

                <tr>
                    <th scope="row"><a><?php echo $i++ ?></a></th>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['customer_id']; ?></td>
                    <td><?php echo $order['order_date']; ?></td>

                  <?php 
                      $total_Items='0';
                      $total_Bill='0';
                      $Items=SelectData('order_info',"WHERE order_id='".$order['order_id']."'");
                      foreach ($Items as $Item) {
                        $total_Items+=$Item['quantity'];
                        $total_Bill+=$Item['unit_price'];
                      } ?>

                    <td>Tk. <?php echo $total_Bill; ?></td>
                    <td><?php echo $total_Items; ?></td>
                    <td><?php echo "Pending" ?></td>
                 </tr>  

            <?php } ?>
                </tbody>
              </table>



              </div>
           </div>
        </div>
    </div>
</div>




 <?php include("inc/footer.php"); ?>