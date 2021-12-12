   <?php include('inc/header.php'); ?>

    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
          <div class="user-profile"><img src="img/bg-img/9.jpg" alt=""></div>
          <div class="user-info">
            <h6 class="user-name mb-1">Suha Sarah</h6>
            <p class="available-balance">Total balance $<span class="counter">583.67</span></p>
          </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
          <li><a href="profile.php"><i class="lni lni-user"></i>My Profile</a></li>
          <li><a href="notifications.php"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li>
          <li class="suha-dropdown-menu"><a href="#"><i class="lni lni-cart"></i>Shop Pages</a>
            <ul>
              <li><a href="shop-grid.php">- Shop Grid</a></li>
              <li><a href="shop-list.php">- Shop List</a></li>
              <li><a href="single-product.php">- Product Details</a></li>
              <li><a href="featured-products.php">- Featured Products</a></li>
              <li><a href="flash-sale.php">- Flash Sale</a></li>
            </ul>
          </li>
          <li><a href="pages.php"><i class="lni lni-empty-file"></i>All Pages</a></li>
          <li class="suha-dropdown-menu"><a href="wishlist-grid.php"><i class="lni lni-heart"></i>My Wishlist</a>
            <ul>
              <li><a href="wishlist-grid.php">- Wishlist Grid</a></li>
              <li><a href="wishlist-list.php">- Wishlist List</a></li>
            </ul>
          </li>
          <li><a href="settings.php"><i class="lni lni-cog"></i>Settings</a></li>
          <li><a href="intro.php"><i class="lni lni-power-switch"></i>Sign Out</a></li>
        </ul>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">
            <div class="pay-credit-card-form">
              <form action="https://designing-world.com/suha-v2.5.0/payment-success.php" method="">
                <div class="mb-3">
                  <label for="paypalEmail">Email Address</label>
                  <input class="form-control" type="email" id="paypalEmail" placeholder="paypal@example.com" value=""><small class="ms-1"><i class="fa fa-lock me-1"></i>Secure online payments at the speed of want.<a class="ms-1" href="#">Learn More</a></small>
                </div>
                <div class="mb-3">
                  <label for="paypalPassword">Password</label>
                  <input class="form-control" type="password" id="paypalPassword" value="">
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit">Pay Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    
    <!-- Footer -->
     <?php include('inc/footer.php'); ?>
