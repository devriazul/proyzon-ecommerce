<?php 
include('inc/header.php');
If_Not_Login('login.php');
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="page-content-wrapper"> 
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card bg-danger mb-2">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Checkout</h6>
              </div>
            </div>
            
            <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
 

              <?php
                  $item_qtn = 0;
                  if (!empty($_SESSION['shopping_cart'])) {             
                    foreach ($_SESSION['shopping_cart'] as $key => $values);                 
              }?>

              <table class="table mb-0">
                <tbody>
              <?php
                  $total = 0;
                  $qtn   = 0;
                  if (!empty($_SESSION['shopping_cart'])) {             
                     foreach ($_SESSION['shopping_cart'] as $key => $values) {?>
                  <tr>
                    <td><img class="rounded" src="admin/products/<?php echo $values["item_image"];?>" alt=""></td>
                    <td><a href="single-product.html"><?php echo $values["item_name"]; ?><span><?php echo $price=$values["item_qtn"]*$values["item_price"];  ?></span></a></td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" value="<?php echo $values["item_qtn"];?>">
                      </div>
                    </td>
                  </tr>

                  <?php  
                      $total+= $price + 60; 
                      $qtn = $qtn + ($values['item_qtn']);
                  ?>

                  <?php } ?> 


                  <tr>
                    <td></td>
                    <td><a>Total Quantity</a></td>
                    <td class="text-right" colspan="2"><a><?php echo $qtn; ?></a></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td><a>Delivery Charge</a></td>
                    <td class="text-right" colspan="2" ><a>60  ৳</a></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td><a>Sub Total</a></td>
                    <td class="text-right" colspan="2" ><a><?php echo $total; ?> ৳</a></td>
                  </tr>
                    
                </tbody>
              </table>
            </div>
          </div>
          </div>
          <!-- Shipping Method Choose-->
          <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Shipping & Billing Details</h6>
              </div>
            </div>

          <?php $select=SelectData('address',"WHERE Customer_ID='".$_SESSION['username']."' ORDER BY sid DESC ");
            $address= mysqli_fetch_array($select); 
            if (mysqli_num_rows($select)>0) { ?>

            <div class="card shipping-method-choose-card">
              <div class="card-body">

                <div class="mb-3">
                  <div class="title mb-2"><span>Name</span></div>
                  <input class="form-control" type="text" value="<?php echo $username; ?>"> 
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><span>Phone</span></div>
                  <input class="form-control" type="text" name="" value="<?php echo $phone; ?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><span>Email Address</span></div>
                  <input class="form-control" type="email" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><span>Shipping Address</span></div>
                  <textarea class="form-control" type="text" name="address_id"><?php echo $address['Address_1']; ?></textarea>
                </div>

           
              </div>
            </div>
          </div>

          <?php }else{

            echo "Please Create a New Address";

          }
            ?>

            <div id="expand" class="mb-2">
                  <a onclick="insert(<?php $id=$userinfo['username']; echo "'pcheckout.php?id=".$id."'"; ?>)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">New Address</a>
            </div>
          <!-- Cart Amount Area-->
         
            
       <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo date('Dsmy').rand(10,1000);?>" >
            <input type="hidden" name="customer_id" value="<?php echo $_SESSION['username']; ?>" >
            <input type="hidden" name="address_id" value="<?php echo $address['Address_ID']; ?>" >
         
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0">৳ <span class="counter"><?php echo $total; ?></span></h5>
              <button class="btn btn-warning" type="submit" name="Place_Order">Confirm &amp; Pay</button>
            </div>
          </div>
        </form>

        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
  <?php }?>




<?php 

    if (isset($_POST['address_save'])) {

       $Address_ID    = "ADD".rand(0,999999);
       $Customer_ID   = $_POST['Customer_ID'];
       $Name      = $_POST['Name'];
       $Phone_No    = $_POST['Phone_No'];
       $Address_1     = $_POST['Address_1'];
       $Country     = $_POST['Country'];
       $city      = $_POST['city'];
       $Zip       = $_POST['Zip'];


       $insert = "INSERT INTO `address`(
          
          `Address_ID`,
          `Customer_ID`,
          `Name`,
          `Phone_No`,
          `Address_1`,
          `Country`,
          `city`,
          `Zip`

      )VALUES(
        '$Address_ID',
        '$Customer_ID',
        '$Name',
        '$Phone_No',
        '$Address_1',
        '$Country',
        '$city',
        '$Zip'

      )";

      $sql = mysqli_query($conn, $insert);
      if ($sql) {
        alert('success', 'Success');
        Reconect($_SERVER['PHP_SELF']);
      }
        
    }

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="POST">
        <div class="modal-body">


            <div class="mb-3">
              <input class="form-control" type="text" name="Name" placeholder="Name">
            </div>

            <input class="form-control" type="hidden" 
            value="<?php echo $_SESSION['username']; ?>" name="Customer_ID">

            <div class="mb-3">
              <input class="form-control" type="text" name="Phone_No" placeholder="Phone">
            </div>


            <div class="mb-3">
              <textarea class="form-control" type="text" name="Address_1" placeholder="Address"></textarea> 
            </div>


            <div class="mb-3">
              <input class="form-control" type="text" name="Country" placeholder="Country">
            </div>


            <div class="mb-3">
              <input class="form-control" type="text" name="city" placeholder="City">
            </div>


            <div class="mb-3">
              <input class="form-control" type="text" name="Zip" placeholder="Zip Code">
            </div>

         
        </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="address_save">Save</button>
      </div>
    </div>
  </div>
</div>





<?php include('inc/footer.php'); ?>

<script> 
    function insert(url) {
        $.ajax({
            url: url,
            method: "POST",
            success: function(data) {
                $("#employee_detail").html(data);
                $("#dataModal").modal("show");
            },
        });
    }

</script>