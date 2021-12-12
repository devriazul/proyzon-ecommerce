<?php 
   include('inc/header.php'); 


  // add to cart

   if (isset($_POST["add_to_cart"])) {
     
      if ($_SESSION["shopping_cart"])
      {
        $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");
        if (!in_array($_GET['product_id'], $item_array_id)) 
        {
          $count = count($_SESSION['shopping_cart']); 
          $item_array = array(
            'item_id'        =>  $_GET['product_id'],
            'item_image'     =>  $_POST['hidden_image'],
            'item_name'      =>  $_POST['hidden_name'],
            'item_price'     =>  $_POST['hidden_price'],
            'item_qtn'       =>  $_POST['hidden_qtn']

          );

          $_SESSION['shopping_cart'] [$count] = $item_array;
        } 
        else
        {

          echo '<script>alert("Item Already Added")</script>';
          echo '<script>windows.location="../index.php"</script>';
        }


      }

      else
      {
        $item_array = array( 
          'item_id'        =>  $_GET['product_id'],
          'item_image'     =>  $_POST['hidden_image'],
          'item_name'      =>  $_POST['hidden_name'],
          'item_price'     =>  $_POST['hidden_price'],
          'item_qtn'       =>  $_POST['hidden_qtn']
        );
        $_SESSION['shopping_cart'][0] = $item_array;
      }
   }


?>

    <div class="page-content-wrapper">
      <div class="container">
        <div class="pt-3">
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/1.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Amazon Echo</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/2.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Light Candle</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">Now only $22</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-duration="1000ms">Buy Now</a>
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/bg-img/3.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Best Furniture</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Product Catagories -->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
          <div class="section-heading">
            <h6>Product Categories</h6>
          </div>
          <div class="product-catagory-wrap">
            <div class="row g-3">
              <!-- Single Catagory Card -->
       <?php
          $select_data="SELECT * FROM category";
          $category_data=mysqli_query($conn, $select_data);
          $i=1;
          foreach($category_data as $rows){?>  

              <div class="col-4">
                <div class="card catagory-card">
                  <div class="card-body"><a class="text-danger" href="catagory.php">
                    <i class="<?php echo $rows['category_icon']; ?>"></i>
                      <span><?php echo $rows['category_name']; ?></span></a></div>
                </div>
              </div>

          <?php } ?>
              <!-- Single Catagory Card -->            
            </div>
          </div>
        </div>
      </div>




      <!-- Flash Sale Slide -->
      <div class="flash-sale-wrapper">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
              <svg class="bi bi-lightning me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"></path>
              </svg>Flash sale
            </h6>
            <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
            <ul class="sales-end-timer ps-0 d-flex align-items-center" data-countdown="2022/01/01 14:21:37">
              <li><span class="days">0</span>d</li>
              <li><span class="hours">0</span>h</li>
              <li><span class="minutes">0</span>m</li>
              <li><span class="seconds">0</span>s</li>
            </ul>
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="img/product/1.png" alt=""><span class="product-title">Black Table Lamp</span>
                  <p class="sale-price">$7.99<span class="real-price">$15</span></p><span class="progress-title">33% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="img/product/2.png" alt=""><span class="product-title">Modern Sofa</span>
                  <p class="sale-price">$14<span class="real-price">$21</span></p><span class="progress-title">57% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="img/product/3.png" alt=""><span class="product-title">Classic Garden Chair</span>
                  <p class="sale-price">$36<span class="real-price">$49</span></p><span class="progress-title">99% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="img/product/1.png" alt=""><span class="product-title">Black Table Lamp</span>
                  <p class="sale-price">$7.99<span class="real-price">$15</span></p><span class="progress-title">33% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="img/product/2.png" alt=""><span class="product-title">Modern Sofa</span>
                  <p class="sale-price">$14<span class="real-price">$21</span></p><span class="progress-title">57% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="single-product.php"><img src="img/product/3.png" alt=""><span class="product-title">Classic Garden Chair</span>
                  <p class="sale-price">$36<span class="real-price">$49</span></p><span class="progress-title">99% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Products -->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Top Products</h6><a class="btn" href="shop-grid.php">View All</a>
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card -->

        <?php
          $select_data="SELECT * FROM products";
          $product_data=mysqli_query($conn, $select_data);
          $i=1;
          foreach($product_data as $rows){?>    

            <!-- Single Top Product Card -->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card product-card">
                <div class="card-body">
                  <!-- Badge-->
                  <span class="badge rounded-pill badge-success">New</span>
                  <!-- Wishlist Button-->
                  <a class="wishlist-btn" href="#">
                    <i class="lni lni-heart"></i></a>
                  <!-- Thumbnail -->
                  <a class="product-thumbnail d-block" href="product_info.php?product_id=<?php echo $rows['product_id']?>&<?php echo $rows['product_name']?>">
                    <img class="mb-2" src="admin/products/<?php echo $rows['product_image']; ?>" alt="" style="width: 128px; height: 113px;"></a>
                  <!-- Product Title -->
                  <a class="product-title d-block" href="product_info.php?product=<?php echo $rows['product_id']?>&<?php echo $rows['product_name']?>">
                    <?php echo $rows['product_name']; ?></a>
                  <!-- Product Price -->
                  <p class="sale-price">Tk. <?php echo $rows['p_current_price']; ?><span>
                    <?php echo $rows['p_previous_price']; ?></span></p>
                  <!-- Rating -->
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                  <!-- Add to Cart -->


                  <!-- add to cart -->
                  <form action="index.php?action=add&product_id=<?php echo $rows['product_id']; ?>" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="hidden_qtn" value="1">
                      <input type="hidden" name="hidden_image" value="<?php echo $rows['product_image']; ?>">
                      <input type="hidden" name="hidden_name" value="<?php echo $rows['product_name']; ?>">
                      <input type="hidden" name="hidden_price" value="<?php echo $rows['p_current_price']; ?>">
                       <button class="btn btn-success btn-sm" type="submit" name="add_to_cart">
                         <i class="lni lni-cart"></i>
                       </button>
                  </form>
 
                </div>
              </div>
            </div>
            <!-- Single Top Product Card -->

        <?php } ?>
           


          </div>
        </div>
      </div>
      <!-- Cool Facts Area-->
      <div class="cta-area">
        <div class="container">
          <div class="cta-text p-4 p-lg-5" style="background-image: url(img/bg-img/24.jpg)">
            <h4 class="text-white">On Sale 50% Off!</h4>
            <p class="text-white">Suha is a multipurpose, creative &amp; <br>modern mobile template.</p><a class="btn btn-warning" href="#">Shop Today</a>
          </div>
        </div>
      </div>
      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Weekly Best Sellers</h6><a class="btn" href="shop-list.php">View All</a>
          </div>
          <div class="row g-3">
            <!-- Single Weekly Product Card -->
            <div class="col-12 col-md-6">
              <div class="card horizontal-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <!-- Badge --><span class="badge badge-success">Sale</span>
                    <!-- Wishlist Button --><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/10.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Modern Sofa</a>
                    <!-- Price -->
                    <p class="sale-price"><i class="lni lni-dollar"></i>$64<span>$89</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.88 (39)</div>
                    <!-- Buy Now Button --><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card -->
            <div class="col-12 col-md-6">
              <div class="card horizontal-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <!-- Badge --><span class="badge badge-primary">Sale</span>
                    <!-- Wishlist Button --><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/7.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Office Chair</a>
                    <!-- Price -->
                    <p class="sale-price"><i class="lni lni-dollar"></i>$100<span>$160</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.82 (125)</div>
                    <!-- Buy Now Button --><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card -->
            <div class="col-12 col-md-6">
              <div class="card horizontal-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <!-- Badge --><span class="badge badge-danger">-10%</span>
                    <!-- Wishlist Button --><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/12.png" alt="">
                      <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                      <ul class="offer-countdown-timer d-flex align-items-center shadow-sm" data-countdown="2022/12/09 23:59:59">
                        <li><span class="days">0</span>d</li>
                        <li><span class="hours">0</span>h</li>
                        <li><span class="minutes">0</span>m</li>
                        <li><span class="seconds">0</span>s</li>
                      </ul></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Sun Glasses</a>
                    <!-- Price -->
                    <p class="sale-price"><i class="lni lni-dollar"></i>$24<span>$32</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.79 (63)</div>
                    <!-- Buy Now Button --><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Weekly Product Card -->
            <div class="col-12 col-md-6">
              <div class="card horizontal-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <!-- Badge --><span class="badge badge-warning">New</span>
                    <!-- Wishlist Button --><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/13.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Wall Clock</a>
                    <!-- Price -->
                    <p class="sale-price"><i class="lni lni-dollar"></i>$31<span>$47</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i>4.99 (7)</div>
                    <!-- Buy Now Button --><a class="btn btn-danger btn-sm" href="#"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Discount Coupon Card-->
      <div class="container">
        <div class="card discount-coupon-card">
          <div class="card-body">
            <div class="coupon-text-wrap d-flex align-items-center p-3">
              <h4 class="text-white pe-3 mb-0">Get 20% <br> discount</h4>
              <p class="text-white ps-3 mb-0">To get discount, enter the<strong class="px-1">GET20</strong>code on the checkout page.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Featured Products Wrapper-->
      <div class="featured-products-wrapper py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Featured Products</h6><a class="btn" href="featured-products.php">View All</a>
          </div>
          <div class="row g-3">
            <!-- Featured Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side">
                    <!-- Wishlist Button --><a class="wishlist-btn shadow-sm border" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/14.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Blue Skateboard</a>
                    <!-- Price -->
                    <p class="sale-price">$39.8<span>$89</span></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side">
                    <!-- Wishlist Button --><a class="wishlist-btn shadow-sm border" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/15.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Travel Bag</a>
                    <!-- Price -->
                    <p class="sale-price">$14.7<span>$21</span></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side">
                    <!-- Wishlist Button --><a class="wishlist-btn shadow-sm border" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/16.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Cotton T-shirts</a>
                    <!-- Price -->
                    <p class="sale-price">$3.69<span>$5</span></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side">
                    <!-- Wishlist Button --><a class="wishlist-btn shadow-sm border" href="#"><i class="lni lni-heart"></i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img src="img/product/6.png" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Roof Lamp</a>
                    <!-- Price -->
                    <p class="sale-price">$27.9<span>$31</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          <h6>Collections</h6><a class="btn" href="#">View All</a>
        </div>
        <!-- Collection Slide-->
        <div class="collection-slide owl-carousel">
          <!-- Collection Card-->
          <div class="card collection-card"><a href="single-product.php"><img src="img/product/17.jpg" alt=""></a>
            <div class="collection-title"><span>Women</span><span>9 new items</span></div>
          </div>
          <!-- Collection Card-->
          <div class="card collection-card"><a href="single-product.php"><img src="img/product/19.jpg" alt=""></a>
            <div class="collection-title"><span>Men</span><span>29 items</span></div>
          </div>
          <!-- Collection Card-->
          <div class="card collection-card"><a href="single-product.php"><img src="img/product/21.jpg" alt=""></a>
            <div class="collection-title"><span>Kids</span><span>4 new items</span></div>
          </div>
          <!-- Collection Card-->
          <div class="card collection-card"><a href="single-product.php"><img src="img/product/22.jpg" alt=""></a>
            <div class="collection-title"><span>Gadget</span><span>11 items</span></div>
          </div>
          <!-- Collection Card-->
          <div class="card collection-card"><a href="single-product.php"><img src="img/product/23.jpg" alt=""></a>
            <div class="collection-title"><span>Foods</span><span>2 new items</span></div>
          </div>
          <!-- Collection Card-->
          <div class="card collection-card"><a href="single-product.php"><img src="img/product/24.jpg" alt=""></a>
            <div class="collection-title"><span>Sports</span><span>5 items</span></div>
          </div>
        </div>
        <div class="pb-3"></div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


  <!-- footer -->


  <?php include('inc/footer.php'); ?>