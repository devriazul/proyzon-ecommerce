  <?php 
    include('inc/header.php');

    if (isset($_GET['product_id'])) {
      $product_id=$_GET['product_id'];
      $select=SelectData('products',"WHERE product_id='$product_id'");
      $product_info = mysqli_fetch_array($select);



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
      <div class="product-slide-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel">
          <!-- Single Hero Slide-->
          <div class="single-product-slide" style="background-image: url('admin/products/<?php echo $product_info['product_image']; ?>')" style="width: 200px;"></div>
        </div>
        
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container d-flex justify-content-between">
            <div class="p-title-price">
              <h6 class="mb-1"><?php echo $product_info['product_name']?></h6>
              <p class="sale-price mb-0">Tk. <?php echo $product_info['p_current_price']?><span><?php echo $product_info['p_previous_price']?></span></p>
            </div>
            <div class="p-wishlist-share"><a href="wishlist-grid.php"><i class="lni lni-heart"></i></a></div>
          </div>
          <!-- Ratings-->
          <div class="product-ratings">
            <div class="container d-flex align-items-center justify-content-between">
              <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
              <div class="total-result-of-ratings"><span>5.0</span><span>Very Good </span></div>
            </div>
          </div>
        </div>
        <!-- Flash Sale Panel-->
    
        <!-- Selection Panel-->
        <!-- <div class="selection-panel bg-white mb-3 py-3">
          <div class="container d-flex align-items-center justify-content-between"> -->
            <!-- Choose Color-->
            <!-- <div class="choose-color-wrapper">
              <p class="mb-1 font-weight-bold">Color</p>
              <div class="choose-color-radio d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="form-check-input blue" id="colorRadio1" type="radio" name="colorRadio" checked>
                  <label class="form-check-label" for="colorRadio1"></label>
                </div>
                <div class="form-check mb-0">
                  <input class="form-check-input yellow" id="colorRadio2" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio2"></label>
                </div>
                <div class="form-check mb-0">
                  <input class="form-check-input green" id="colorRadio3" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio3"></label>
                </div>
                <div class="form-check mb-0">
                  <input class="form-check-input purple" id="colorRadio4" type="radio" name="colorRadio">
                  <label class="form-check-label" for="colorRadio4"></label>
                </div>
              </div>
            </div> -->


            <!-- Choose Size-->

            <!-- <div class="choose-size-wrapper text-end">
              <p class="mb-1 font-weight-bold">Size</p>
              <div class="choose-size-radio d-flex align-items-center">
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio1" type="radio" name="sizeRadio">
                  <label class="form-check-label" for="sizeRadio1">S</label>
                </div>
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio2" type="radio" name="sizeRadio" checked>
                  <label class="form-check-label" for="sizeRadio2">M</label>
                </div>
                <div class="form-check mb-0">
                  <input class="form-check-input" id="sizeRadio3" type="radio" name="sizeRadio">
                  <label class="form-check-label" for="sizeRadio3">L</label>
                </div>
              </div>
            </div> -->
       <!--    </div>
        </div> -->

        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
            <form class="cart-form" action="" method="POST" enctype="multipart/form-data">


              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler" id="decrementValue" onclick="decrementValue()">-</div>
                <input class="form-control cart-quantity-input" type="text" name="hidden_qtn" id="indec" value="1">
                <div class="quantity-button-handler" onclick="incrementValue()">+</div>
              </div>


              <script>  
                  function incrementValue(){
                      var value = parseInt(document.getElementById('indec').value, 10);
                      value = isNaN(value) ? 0 : value;
                      value+;
                      document.getElementById('indec').value = value;
                  }


                  function decrementValue(){
                      var value = parseInt(document.getElementById('indec').value, 10);
                      value = isNaN(value) ? 0 : value;
                      value--;
                      document.getElementById('indec').value = value;
                  }
              </script>

              <input type="hidden" name="hidden_image" value="<?php echo $product_info['product_image']; ?>">
              <input type="hidden" name="hidden_name" value="<?php echo $product_info['product_name']; ?>">
              <input type="hidden" name="hidden_price" value="<?php echo $product_info['p_current_price']; ?>">

              <button class="btn btn-danger ms-3" type="submit" name="add_to_cart">Add To Cart</button>
            </form>
          </div>
        </div>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
          <div class="container">
            <h6>Specifications</h6>
            <p><?php echo $product_info['product_description']?></p>
        
          </div>
        </div>
        
      
        <!-- Related Products Slides-->
        <div class="related-product-wrapper py-3 mb-3">
          <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
              <h6>Related Products</h6><a class="btn" href="shop-grid.php">View All</a>
            </div>
            <div class="related-product-slide owl-carousel">
              <!-- Single Product Slide -->
              <div class="single-related-product-slide">
                <div class="card product-card">
                  <div class="card-body">
                    <!-- Badge--><span class="badge rounded-pill badge-warning">Sale</span>
                    <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i class="lni lni-heart">                       </i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/11.png" alt=""></a>
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Beach Cap</a>
                    <!-- Product Price -->
                    <p class="sale-price">$13<span>$42</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                  </div>
                </div>
              </div>
              <!-- Single Product Slide -->
              <div class="single-related-product-slide">
                <div class="card product-card">
                  <div class="card-body">
                    <!-- Badge--><span class="badge rounded-pill badge-success">New</span>
                    <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i class="lni lni-heart">                       </i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/5.png" alt="">
                      <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                      <ul class="offer-countdown-timer d-flex align-items-center shadow-sm" data-countdown="2021/12/31 23:59:59">
                        <li><span class="days">0</span>d</li>
                        <li><span class="hours">0</span>h</li>
                        <li><span class="minutes">0</span>m</li>
                        <li><span class="seconds">0</span>s</li>
                      </ul></a>
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Wooden Sofa</a>
                    <!-- Product Price -->
                    <p class="sale-price">$74<span>$99</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                  </div>
                </div>
              </div>
              <!-- Single Product Slide -->
              <div class="single-related-product-slide">
                <div class="card product-card">
                  <div class="card-body">
                    <!-- Badge--><span class="badge rounded-pill badge-success">Sale</span>
                    <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i class="lni lni-heart">                       </i></a>
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php"><img class="mb-2" src="img/product/6.png" alt=""></a>
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php">Roof Lamp</a>
                    <!-- Product Price -->
                    <p class="sale-price">$99<span>$113</span></p>
                    <!-- Rating -->
                    <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Rating & Review Wrapper -->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <div class="container">
            <h6>Ratings &amp; Reviews</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
                <!-- Single User Review -->
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/7.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">Very good product. It's just amazing!</p><span class="name-date">Designing World 12 Dec 2021</span><a class="review-image mt-2 border rounded" href="img/product/3.png"><img class="rounded-3" src="img/product/3.png" alt=""></a>
                  </div>
                </li>
                <!-- Single User Review -->
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/8.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">Very excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2021</span><a class="review-image mt-2 border rounded" href="img/product/4.png"><img class="rounded-3" src="img/product/4.png" alt=""></a><a class="review-image mt-2 border rounded" href="img/product/6.png"><img class="rounded-3" src="img/product/6.png" alt=""></a>
                  </div>
                </li>
                <!-- Single User Review -->
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/9.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                    <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span class="name-date">Designing World 28 Nov 2021</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3">
          <div class="container">
            <h6>Submit A Review</h6>
            <form action="#" method="">
              <div class="stars mb-3">
                <input class="star-1" type="radio" name="star" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="star" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="star" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="star" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="star" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
              <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="200" placeholder="Write your review..."></textarea>
              <button class="btn btn-sm btn-primary" type="submit">Save Review</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php }?>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    
  <?php include('inc/footer.php'); ?>
