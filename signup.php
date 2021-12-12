  <?php 
    // dtabase
    include ("admin/inc/db.php");

    if (isset($_POST['submit'])) {
      $username         =$_POST['username'];
      $phone            =$_POST['phone'];
      $email            =$_POST['email'];
      $refer_id         =$_POST['refer_id'];
      $address          =$_POST['address'];
      $password         =md5($_POST['password']);
      $confirm_password =md5($_POST['confirm_password']);
      $profile_image    =$_FILES["profile_image"]["name"];

      //image
      $target_dir  = "admin/signup/";
      $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
      move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
      


  if ($password === $confirm_password) {
          
    // insert query
         $sql=" INSERT INTO sign_up (
                 username, 
                 phone, 
                 email, 
                 refer_id, 
                 address, 
                 password, 
                 profile_image) 
                 VALUES(
                 '$username',
                 '$phone',
                 '$email',
                 '$refer_id',
                 '$address',
                 '$password',
                 '$profile_image')";

         if(mysqli_query($conn, $sql)){
           $msg = "Sign Up Successfully !";
           $bg = "alert alert-success";

         }else{
           echo "error";
         }

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
              <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group text-start mb-4">
                  <label for="username"></label>
                  <input class="form-control" id="username" type="text" placeholder="Username" name="username" required="">
                </div>


                <div class="form-group text-start mb-4">
                  <label for="phone"></label>
                  <input class="form-control" id="phone" type="text" placeholder="Phone" name="phone" required="">
                </div>

                <div class="form-group text-start mb-4">
                  <label for="email"></label>
                  <input class="form-control" id="email" type="email" placeholder="Email" name="email" required="">
                </div>


                <div class="form-group text-start mb-4">
                  <label for="ReferID"></label>
                  <input class="form-control" id="ReferID" type="text" placeholder="Refer ID" name="refer_id" required="">
                </div>


                <div class="form-group text-start mb-4">
                  <label for="address"></label>
                  <textarea class="form-control" id="address" type="text" placeholder="Address" name="address" required=""></textarea>
                </div>



                <div class="form-group text-start mb-4">
                  <label for="password"></label>
                  <input class="input-psswd form-control" id="registerPassword" type="password" placeholder="Password" name="password" required="">
                </div>


                <div class="form-group text-start mb-4">
                  <label for="rePassword"></label>
                  <input class="input-psswd form-control" id="rePassword" type="password" placeholder="confirm_password" name="confirm_password" required="">
                </div>



                <div class="form-group text-start mb-4">
                  <input class="form-control" id="image" type="file"name="profile_image">
                </div>


                <button class="btn btn-warning btn-lg w-100" type="submit" name="submit">Sign Up</button>
              </form>
            </div>

            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="login.php">Sign In</a></p>
            </div>
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