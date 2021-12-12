 <!-- Footer Nav-->
    <div class="footer-bottom">
          <ul class="d-flex justify-content-center m-0 p-0">
            <li class="active ps-2"><a href="index.php"><i class="lni lni-home"></i></a></li>
            <li><a href="message.html"><i class="lni lni-life-ring"></i></a></li>

          <?php 
            if (!empty($_SESSION['shopping_cart'])) 
              {
              $qtn   = 0;
              foreach ($_SESSION['shopping_cart'] as $keys => $values)
              {
          ?>

          <?php 
             $qtn = $qtn + ($values['item_qtn']);
          } ?>

          
          <p class="text-white bg-success rounded text-center" style="margin-top:5px; margin-right:-15px; width: 18px; z-index:999;">
             <?php echo  number_format($qtn); ?>
          </p>

          <?php }?>

            <li>
              <a class="bg-success rounded-circle" style="padding:7px 9px; margin-right: 10px; margin-left: 10px;" href="cart.php">
                <i class="lni lni-shopping-basket text-white"></i>
              </a>
            </li>
            <li><a href="pages.html"><i class="lni lni-heart"></i></a></li>
            <li><a href="settings.html"><i class="lni lni-cog"></i></a></li>
          </ul>
    </div>



    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>

</html>

<!-- 
Abdullah AL Noman
www.noman.xyz -->