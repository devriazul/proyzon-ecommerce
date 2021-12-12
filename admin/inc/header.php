<?php 
  include("inc/db.php"); 
  include("function/function.php"); 
?>


<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>

    <link rel="icon" href="img/mini_logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

    <!-- date picker -->
     <link rel="stylesheet" href="vendors/datepicker/date-picker.css" />

     <link rel="stylesheet" href="vendors/vectormap-home/vectormap-2.0.2.css" />
     
     <!-- scrollabe  -->
     <link rel="stylesheet" href="vendors/scroll/scrollable.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
    <!-- text editor css -->
    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />
    <!-- morris css -->
    <link rel="stylesheet" href="vendors/morris/morris.css">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

    <!-- menu css  -->
    <link rel="stylesheet" href="css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">

    <link href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css" rel="stylesheet">
</head>
<body class="crm_body_bg">
    


<!-- main content part here -->
 
 <!-- sidebar  -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.php"><img src="img/logo.png" alt=""></a>
        <a class="small_logo" href="index.php"><img src="img/mini_logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">




        <li class="" aria-expanded="false">
            <a class="" href="#" >
                <div class="nav_icon_small">
                  <i class="fad fa-home"></i>
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>




        <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                  <i class="fad fa-bags-shopping"></i>
                </div>
                <div class="nav_title">
                    <span>Order Manage</span>
                </div>
            </a>
            <ul>
              <li>
                <a href="all_orders.php"><i class="fas fa-list-ul"></i>All Order</a>
              </li>
              <li>
                <a href="all_orders.php?order_status=0" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>                  
                  <p>Pending Orders</p>
                </a>
              </li>
              <li>
                <a href="all_orders.php?order_status=1" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i> 
                  <p>Processing Orders</p>
                </a>
              </li>
              <li>
                <a href="all_orders.php?order_status=4" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i> 
                  <p>Completed Orders</p>
                </a>
              </li>
              <li>
                <a href="all_orders.php?order_status=5" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i> 
                  <p>Return Orders</p>
                </a>
              </li>
              <li>
                <a href="all_orders.php?order_status=6" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i> 
                  <p>Cancel Orders</p>
                </a>
              </li>
            </ul>
        </li>


         <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                  <i class="fad fa-cart-plus"></i>
                </div>
                <div class="nav_title">
                    <span>Product Manage</span>
                </div>
            </a>
            <ul>
              <li><a href="add_product.php"><i class="fas fa-plus-circle"></i>Add New Product</a></li>
              <li><a href="all_products.php"><i class="fas fa-list-ul"></i>All Product</a></li>
              <li><a href="#"><i class="fab fa-creative-commons-zero"></i>Deactiveted Product</a></li>
              <li><a href="#"><i class="fas fa-album-collection"></i>Product Catalogs</a></li>
              <li><a href="#"><i class="fas fa-arrows-alt-h"></i>Bulk Product Upload</a></li>
            </ul>
        </li>




         <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                  <i class="fab fa-affiliatetheme"></i>
                </div>
                <div class="nav_title">
                    <span>Affiliate Product</span>
                </div>
            </a>
            <ul>
              <li><a href="#"><i class="fas fa-plus-circle"></i>Add Affiliate Product</a></li>
              <li><a href="#"><i class="fas fa-list-ul"></i>All Affiliate Product</a></li>
            </ul>
        </li>




        <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                 <i class="fas fa-users"></i>
                </div>
                <div class="nav_title">
                    <span>Coustomer Manage</span>
                </div>
            </a>
            <ul>
              <li><a href="#"><i class="fas fa-list-ul"></i>Coustomer List</a></li>
              <li><a href="#"><i class="fas fa-list-ul"></i>Withdraws </a></li>
              <li><a href="#"><i class="fas fa-list-ul"></i>Coustomer Default Image </a></li>

            </ul>
        </li>





        <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                  <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="nav_title">
                    <span>Category</span>
                </div>
            </a>
            <ul>
              <li><a href="category.php"><i class="fas fa-plus-circle"></i>Main Category</a></li>
              <li><a href="sub_category.php"><i class="fas fa-plus-circle"></i>Sub Category</a></li>
            </ul>
        </li>






        <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                  <i class="fas fa-bullhorn"></i>
                </div>
                <div class="nav_title">
                    <span>Telemarketing Manage</span>
                </div>
            </a>
            <ul>
              <li><a href="#"><i class="fas fa-podcast"></i>Marketing</a></li>
            </ul>
        </li>



        <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                 <i class="fas fa-user"></i>
                </div>
                <div class="nav_title">
                    <span>User Manage</span>
                </div>
            </a>
            <ul>
              <li><a href="user_create.php"><i class="fas fa-user-plus"></i>User Create</a></li>
              <li><a href="all_users.php

                "><i class="fas fa-list-ul"></i>All Users</a></li>
            </ul>
        </li>





        <li class="" aria-expanded="false">
            <a class="has-arrow" href="#" >
                <div class="nav_icon_small">
                 <i class="fas fa-truck"></i>
                </div>
                <div class="nav_title">
                    <span>Delivery Manage</span>
                </div>
            </a>
            <ul>
              <li><a href="orderprosesing.php"><i class="fas fa-list-ul"></i>Order Processing</a></li>
              <li><a href="deliveryassistant.php"><i class="fas fa-list-ul"></i>Delevery Assistant</a></li>
            </ul>
        </li>




         <li class="" aria-expanded="false">
            <a class="" href="daliveryhero.php">
                <div class="nav_icon_small">
                 <i class="fas fa-sort"></i>
                </div>
                <div class="nav_title">
                   <span>My Order</span>
                </div>
            </a>
        </li>






      </ul>
</nav>
 <!--/ sidebar  -->

<section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
    <div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="img/line_img.png" alt="">
                    </div>
                    <div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search">
                                </div>
                                <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                            </form>
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        
                        <div class="profile_info">
                            <img src="img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>Neurologist </p>
                                    <h5>Dr. Robar Smith</h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="admin_profile.php">My Profile </a>
                                    <a href="#">Settings</a>
                                    <a href="#">Log Out </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      