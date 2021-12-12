
<?php include('inc/header.php'); ?>


    <div class="page-content-wrapper">
   
      <div class="container">
        <div class="section-heading mt-3 my-2">
          <h5 class="mb-1 pt-2 text-center">Contact Us</h5>
          <p class="mb-4">Write to us. We will reply to you as soon as possible. But yes, it can take up to 24 hours.</p>
        </div>
        <!-- Contact Form-->
        <div class="contact-form mt-3 pb-3">
          <form action="#" method="">
            <input class="form-control mb-3" id="username" type="text" placeholder="Your Name">
            <input class="form-control mb-3" id="email" type="email" placeholder="Enter email">
            <select class="mb-3 form-control form-select" id="topic" name="topic">
              <option value="">Buying &amp; Support</option>
              <option value="">Authors Help</option>
              <option value="">Buyer Help</option>
              <option value="">License</option>
            </select>
            <input class="form-control mb-3" id="username" type="text" placeholder="Include a relevant URL">
            <textarea class="form-control mb-3" id="message" name="" cols="30" rows="10" placeholder="Write something..."></textarea>
            <button class="btn btn-warning btn-lg w-100">Send Now</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Footer -->
   <?php include('inc/footer.php'); ?>
