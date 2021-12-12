<?php
    include "admin/inc/db.php";

    session_start();
    if (isset($_SESSION['username'])) {
        header('location:index.php');
    }
 
    if (isset($_POST['login'])) {
        
        $pass = md5($_POST['password']);
        $select = "SELECT * FROM sign_up WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."' ";
        $query = mysqli_query($conn, $select);
        $user = mysqli_fetch_array($query);
        $rows  = mysqli_num_rows($query);


      if ($rows>0) {
        if ($user['password']==$pass) {   
              $_SESSION['username']=$user['username'];
              header('location:index.php');
          }

        } else {
              $msg = "Please Try Again";
              $bg = "alert alert-danger";
          }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
   
    <title>ecommerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/lineicons.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>

    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/core-img/pryzon-logo.png" alt="" width="100px;">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">

              <?php if (isset($msg)){ ?>
                  <div class="alert alert-success <?php echo $bg; ?>" role="alart">
                      <strong><?php echo $msg; ?></strong>
                  </div>    
              <?php } ?>

              <form action=" " method="POST">

                <div class="form-group text-start mb-4">
                  <label for="username"></label>
                  <input class="form-control" id="username" type="text" placeholder="Username" name="username">
                </div>

                <div class="form-group text-start mb-4">
                  <label for="password"></label>
                  <input class="form-control" id="password" type="password" placeholder="Password" name="password">
                </div>

                <button type="submit" class="btn btn-warning btn-lg w-100" name="login">Log In</button>

              </form>

            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="forget-password.php">Forgot Password?</a>
              <p class="mb-0">Didn't have an account?<a class="ms-1" href="signup.php">Sign Up</a></p>
            </div>
            <!-- View As Guest-->
            <div class="view-as-guest mt-3"><a class="btn" href="index.php">View as Guest</a></div>
          </div>
        </div>
      </div>
    </div>

    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>
</html>