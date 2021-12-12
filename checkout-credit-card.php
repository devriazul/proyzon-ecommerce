<?php include('inc/header.php'); ?>


    <div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Credit Card Info-->
          <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">
            <div class="pay-credit-card-form">
              <form action="payment-success.php" method="">
                <div class="mb-3">
                  <label for="cardNumber">Credit Card Number</label>
                  <input class="form-control" type="text" id="cardNumber" placeholder="1234 ×××× ×××× ××××" value=""><small class="ms-1"><i class="fa fa-lock me-1"></i>Your payment info is stored securely.<a class="ms-1" href="#">Learn More</a></small>
                </div>
                <div class="mb-3">
                  <label for="cardholder">Cardholder Name</label>
                  <input class="form-control" type="text" id="cardholder" placeholder="SUHA JANNAT" value="">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="expiration">Exp. Date</label>
                      <input class="form-control" type="text" id="expiration" placeholder="12/20" value="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="cvvcode">CVV Code</label>
                      <input class="form-control" type="text" id="cvvcode" placeholder="××××" value="">
                    </div>
                  </div>
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