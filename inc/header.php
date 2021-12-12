<?php
session_start();
include 'admin/inc/db.php';
include 'config/function.php'; 
include 'order.php'; 
  //database connect 
  if (isset($_SESSION['username'])) {  
    $select = "SELECT * FROM sign_up WHERE username='".$_SESSION['username']."'";
    $result     =mysqli_query($conn, $select);
    $user_inf   = mysqli_fetch_array($result);
    $username   =$user_inf['username'];
    $phone      =$user_inf['phone'];
    $email      =$user_inf['email'];
    $address      =$user_inf['address'];
    $userimage  =$user_inf['profile_image'];
  }else{

      $username   ='User';
      $userimage  ='profile.png';
  }

  // echo $_SESSION['signup'];


// cart delete

if (isset($_GET['action'])) 
   {
     if ($_GET['action'] == "delete") 
     {
      foreach($_SESSION['shopping_cart'] as $keys => $values)
      {
        if ($values['item_id'] == $_GET['id']) 
        {
          unset($_SESSION['shopping_cart'] [$keys]);
          echo '<script>alert("Item Remove")</script>';
          echo '<script>windows.location="../cart.php"</script>';
        }
      }
     }
   }   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile php Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
  
    <!-- Title-->
    <title>ecommerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon.PNG">
    <!-- Apple Touch Icon-->
  
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/style.css">
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

    <link href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css" rel="stylesheet">
  </head>
  <body>
 
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->

        <div class="logo-wrapper">
          <a href="index.php">
           <img src="admin/signup/<?php echo $userimage; ?>" class="Responsive image img-fluid" alt="" width="30px;">
          </a>
        </div>
       

      
        <!-- Search Form-->
        <div class="top-search-form">
          <form action="#" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->

        <div class="sidenav-profile">
          <div class="user-profile"><img src="admin/signup/<?php echo $userimage; ?>" alt=""></div>
          <div class="user-info">
            <h6 class="user-name mb-1"><?php echo $username; ?></h6>
            <p class="available-balance">Total balance $<span class="counter">583.67</span></p>
          </div>
        </div>

        <?php ?>
        <!-- Sidenav Nav-->

          <ul class="sidenav-nav ps-0">

         <?php 
         if (isset($_SESSION['username'])) {?>

          <li><a href="profile.php"><i class="lni lni-user"></i>My Profile</a>
          </li>


          <li>
            <a href="my_order.php"><i class="lni lni-cog"></i>My Order</a>
          </li>

        <?php }?>

          <li>
            <a href="ordertrack.php"><i class="lni lni-cog"></i>Order Track</a>
          </li>


          <li><a href="notifications.php"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li>
          <li>
            <a href="settings.php"><i class="lni lni-cog"></i>Settings</a>
          </li>

          <li>

            <?php 

                if (isset($_SESSION['username'])) {?>
                    <a href="logout.php"><i class="lni lni-power-switch"></i>Log Out</a>
                <?php }else{?>
                    <a href="login.php"><i class="lni lni-power-switch"></i>Login</a>

            <?php } ?>




          </li>

        </ul>
      </div>
    </div>