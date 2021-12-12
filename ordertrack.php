<?php 
  include('inc/header.php'); 
  If_Not_Login('login.php');
?>

<?php 


if (isset($_GET['order_id'])) {?>
        

    <?php  

        $orders=SelectData('orders',"WHERE order_id='".$_GET['order_id']."'");  
        $ordersinfo = mysqli_fetch_array($orders);

        $Address=SelectData('address',"WHERE sid='".$ordersinfo['sid']."'");  
        $Addressinfo = mysqli_fetch_array($Address); 

        $total_Items='0';
        $total_Bill='0';
        $Items=SelectData('order_info',"WHERE order_id='".$ordersinfo['order_id']."'");
        foreach ($Items as $Item) {
            $total_Items+=$Item['quantity'];
            $total_Bill+=$Item['unit_price'];
        }                       
    ?>


  
    <div class="page-content-wrapper">

<!--       <div class="my-order-wrapper pt-3" style="background-image: url('img/bg-img/21.jpg')">
 -->


        <div class="card w-100 pt-4">
          <h6 class="text-center mt-2">Order ID: <?php echo $_GET['order_id'];?></h6><hr>
          <div class="card-body p-4">
            <!-- Single Order Status-->
            <div class="single-order-status <?php if ($ordersinfo['status']>=0) { echo "active"; } ?>">
               <div class="order-icon shadow-sm">
                <svg class="bi bi-cart-check" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"></path>
                  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                </svg>
              </div>
              <div class="order-text">
                <h6>Pending</h6><span>2 Feb 2021 - 12:38 PM</span>
              </div>
              <div class="order-status">
                <svg class="bi bi-patch-check-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                </svg>
              </div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status <?php if ($ordersinfo['status']>=1) { echo "active"; } ?>">
              <div class="order-icon shadow-sm">
                <svg class="bi bi-box" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"></path>
                </svg>
              </div>
              <div class="order-text">
                <h6>Package & Processing</h6><span>3 Feb 2021</span>
              </div>
              <div class="order-status">
                <svg class="bi bi-patch-check-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                </svg>
              </div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status <?php if ($ordersinfo['status']>=2) { echo "active"; } ?>">
              <div class="order-icon shadow-sm">
                <svg class="bi bi-truck-flatbed" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z"></path>
                </svg>
              </div>
              <div class="order-text">
                <h6>Pickup</h6><span>3 Feb 2021</span>
              </div>
              <div class="order-status">
                <svg class="bi bi-patch-check-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                </svg>
              </div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status <?php if ($ordersinfo['status']>=3) { echo "active"; } ?>">
              <div class="order-icon shadow-sm">
                <svg class="bi bi-truck" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                </svg>
              </div>
              <div class="order-text">
                <h6>On the way</h6><span>Estimate: 4 Feb 2021</span>
              </div>
              <div class="order-status">
                <svg class="bi bi-patch-check-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                </svg>
              </div>
            </div>
           
            <!-- Single Order Status-->
            <div class="single-order-status <?php if ($ordersinfo['status']>=4) { echo "active"; } ?>">
              <div class="order-icon shadow-sm">
                <svg class="bi bi-person-check" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                </svg>
              </div>
              <div class="order-text">
                <h6>Delivered</h6><span>Estimate: 7 Feb 2021</span>
              </div>
              <div class="order-status">
                <svg class="bi bi-patch-check-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>


        <!-- product -->

<!--       <table class="table table-striped">                    
                   
                        <tbody>
                            

                                    <tr>
                                        <td><?php echo $i++; ?> </td>
                                        <td> </td>
                                        <td><?php echo $product['product_name']; ?> </td>
                                        <td><img src="admin/products/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>" style='width: 40px;'></td>
                                        <td><?php echo $Item['quantity']; ?> </td>                        
                                        <td><?php echo $Item['unit_price']; ?> </td>
                                    </tr>                     
                          
                    </tbody>
            </table> -->
 <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">

            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>

                  <?php
                      $total = 0;
                      $Items=SelectData('order_info',"WHERE order_id='".$ordersinfo['order_id']."'");
                      $i=1;
                      foreach ($Items as $Item) {
                      $products=SelectData('products',"WHERE product_id='".$Item['product_id']."'");
                        $product=mysqli_fetch_array($products);?>

                  <tr>
                    <th scope="row"><a class="remove-product" href=""><?php echo $i++; ?></a></th>
                    <td><img class="rounded" src="admin/products/<?php echo $product['product_image']; ?>" alt="" width="70px;"></td>
                    <td><a href=""><?php echo $product['product_name']; ?></a></td>

                    <td>
                      <?php echo $product['Product_Code']; ?>
                    </td>

                    <td>
                      <div class="quantity">
                        <a href=""><?php echo $Item['quantity']; ?></a>
                         
                      </div>
                    </td>
                    <td>
                        Tk. <?php echo $Item['unit_price']; ?>
                    </td>

                  </tr>

                    <?php } ?>


                </tbody>
              </table>
            </div>    
          </div>
        </div>


<?php }else{?>

      <div class="w-100 my-5">
        <div class="container">
          <div class="row">
                <div class="">
                    <form id="custom-search-form" action="" class="form-search form-horizontal">
                       <div class="input-group mb-3 mt-2 py-3">
                        <input type="text" class="form-control rounded" name="order_id" placeholder="Track Order" aria-label="Username" aria-describedby="basic-addon1">
                         <button class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></button>
                      </div>
                    </form>
                </div>
          </div>

          <img src="img/track.gif" width="100%">
        </div>
      </div>


<?php } ?>

      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


    <!-- Footer -->
  <?php include('inc/footer.php'); ?>
