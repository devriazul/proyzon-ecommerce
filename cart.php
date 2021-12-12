<?php include('inc/header.php'); 

if (!empty($_SESSION['shopping_cart'])) {?> 

    <div class="page-content-wrapper"> 
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>

                  <?php
                        $total = 0; 
                        $qtn   = 0; 

                        foreach ($_SESSION['shopping_cart'] as $key => $values) { ?>

                  <tr>
                    <th scope="row"><a class="remove-product" href="<?php echo $_SERVER['PHP_SELF'];?>?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="lni lni-close"></i></a></th>
                    <td><img class="rounded" src="admin/products/<?php echo $values["item_image"];?>" alt=""></td>
                    <td><a href="">
                      <?php echo $values["item_name"]; ?><span><?php echo $price=$values["item_qtn"]*$values["item_price"];  ?></span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="<?php echo $values["item_qtn"];?>">
                      </div>
                    </td>


                  </tr>

                  <?php  
                      $total+= $price; 
                      $qtn = $qtn + ($values['item_qtn']);
                      ?>
                  <?php } ?>


                  <tr>
                    <td></td>
                    <td></td>
                    <td><a>Total Quantity</a></td>
                    <td class="text-right" colspan="2" ><a><?php echo $qtn; ?></a></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td><a>Total</a></td>
                    <td class="text-right" colspan="2" ><a><?php echo $total; ?> ৳</a></td>
                  </tr>
                    
                  
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- Coupon Area-->
    <!--       <div class="card coupon-card mb-3">
            <div class="card-body">
              <div class="apply-coupon">
                <h6 class="mb-0">Have a coupon?</h6>
                <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                <div class="coupon-form">
                  <form action="#">
                    <input class="form-control" type="text" placeholder="SUHA30">
                    <button class="btn btn-primary" type="submit">Apply</button>
                  </form>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0">৳ <span class="counter"><?php echo $total; ?></span></h5><a class="btn btn-warning" href="checkout.php">Checkout Now</a>
            </div>
          </div>


          <?php }else{?>
          <div class="container">
          <div class="card  d-flex align-items-center justify-content-between coupon-card mb-3" style="margin-top:65px;">
            <div class="card-body">
               <center>
                 <img src="img/empty_cart.png" class="mb-2" width="60px;">
                 <p style="margin-bottom: 0px;"><strong>Your Cart is Empty!</strong></p>
                 <p style="margin-bottom: 0px;">Looks like you haven't made order yet.</p><br>
                  <a class="btn btn-danger btn-sm" href="index.php" style="margin-top:-18px;"><i class="me-1 lni lni-cart"></i>Continue To Shopping</a>
               </center>
            </div>
          </div>
          </div>
         <?php }?>

        </div>
      </div>
    </div>


    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


    <!-- Footer -->
    
   <?php  include('inc/footer.php'); ?>
