<?php 

    include_once 'inc/db.php';
    include_once 'function/function.php';

    $orders=SelectData('orders',"WHERE order_id='".$_GET['order_id']."'");  
    $ordersinfo = mysqli_fetch_array($orders);

    $Address=SelectData('address',"WHERE Address_ID='".$ordersinfo['address_id']."'");  
    $Addressinfo = mysqli_fetch_array($Address); 

    $total_Items='0';
    $total_Bill='0';
    $Items=SelectData('order_info',"WHERE order_id='".$ordersinfo['order_id']."'");
    foreach ($Items as $Item) {
        $total_Items+=$Item['quantity'];
        $total_Bill+=$Item['unit_price']*$Item['quantity'];
    }                       
?>

<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Management Admin</title>

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
</head>

<body class="crm_body_bg">

    <!-- main content part here -->

<section class="">
      
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
         
                <div class="row ">
                    <div class="col-12 QA_section" >
                        <div class="card QA_table ">
                            <div class="card-header">
                                Invoice
                                <strong><?php echo $ordersinfo['order_id']; ?></strong>
                                <span class="float-right"> <strong>Status:</strong> <?php echo Delivery_Status($ordersinfo['status']); ?></span>
                            </div>
                            <div class="row">
                               <div class="col-md-8 pt-4 mb-4">
                                 <img src="img/logo.png" class="mx-4 pt-3">
                               </div>
                               <div class="col-md-4 pt-4 mb-4">
                                   <div>71-101 Szczecin, England</div>
                                        <div>Email: demo@gmail.com</div>
                                        <div>Phone: +0000</div>
                               </div>
                            </div><hr>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h6 class="mb-3"> Billing Address</h6>
                                        <div>Name: <?php echo $ordersinfo['customer_id']; ?></div>
                                    </div>

                                    <div class="col-sm-6">
                                        <h6 class="mb-3">Shipping Address</h6>
                                        <div>Name: <?php echo $Addressinfo['Name']; ?></div>
                                        <div>Address: <?php echo $Addressinfo['Address_1']; ?>,<?php echo $Addressinfo['city']; ?>, <?php echo $Addressinfo['Country']; ?></div>
                                        <div>Phone:  <?php echo $Addressinfo['Phone_No']; ?></div>
                                    </div>



                                </div>

                                <div class="table-responsive-sm">
                                     <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th class="center"  style="color: white;">#</th>
                                                <th  style="color: white;">Product ID</th>
                                                <th  style="color: white;">Description</th>

                                                <th class="right"  style="color: white;">Product Name</th>
                                                <th class="center"  style="color: white;">Qty</th>
                                                <th class="right"  style="color: white;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                            $total = 0;
                                            $qtn   = 0;
                                            $Items=SelectData('order_info',"WHERE order_id='".$ordersinfo['order_id']."'");
                                            $i=1;
                                            foreach ($Items as $Item) {
                                                $products=SelectData('products',"WHERE product_id='".$Item['product_id']."'");
                                                $product=mysqli_fetch_array($products);?>

                                                <tr>
                                                    <td class="center"><?php echo $i++; ?> </td>
                                                    <td class="left strong"><?php echo $product['Product_Code']; ?> </td>
                                                    <td class="left"><?php echo $product['product_name']; ?> </td>
                                                    <td class="right"><img src="products/<?php echo $product['product_image']; ?>" style="width: 50px;"></td>
                                                    <td class="center"><?php echo $Item['quantity']; ?> </td>                        
                                                    <td class="center"><?php echo $price= $Item['unit_price']*$Item['quantity']; ?> </td>
                                                </tr>

                                                  <?php  
                                                  $total += $price; 
                                                  $qtn = $qtn + ($Item['quantity']);
                                                  ?>
                                        <?php } ?>
                                               
                                        </tbody> 
                                    </table>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5">

                                    </div>


                                    <div class="col-lg-4 col-sm-5 ml-auto QA_section">
                                        <table class="table table-clear QA_table">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td class="right"><?php echo $qtn; ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="left">
                                                        <strong>Shipping Charge</strong>
                                                    </td>
                                                    <td class="right">60</td>
                                                </tr>

                                                <tr>
                                                    <td class="left">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong>Tk. <?php echo $total + 60; ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- main content part end -->


   



<script>
    window.print();
</script>
    <!--/### CHAT_MESSAGE_BOX  ### -->

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <!-- footer  -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstarp js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- sidebar menu  -->
    <script src="js/metisMenu.js"></script>
    <!-- waypoints js -->
    <script src="vendors/count_up/jquery.waypoints.min.js"></script>
    <!-- waypoints js -->
    <script src="vendors/chartlist/Chart.min.js"></script>
    <!-- counterup js -->
    <script src="vendors/count_up/jquery.counterup.min.js"></script>

    <!-- nice select -->
    <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>
    <!-- owl carousel -->
    <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <!-- responsive table -->
    <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="vendors/datatable/js/jszip.min.js"></script>
    <script src="vendors/datatable/js/pdfmake.min.js"></script>
    <script src="vendors/datatable/js/vfs_fonts.js"></script>
    <script src="vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="vendors/datatable/js/buttons.print.min.js"></script>

    <!-- datepicker  -->
    <script src="vendors/datepicker/datepicker.js"></script>
    <script src="vendors/datepicker/datepicker.en.js"></script>
    <script src="vendors/datepicker/datepicker.custom.js"></script>

    <script src="js/chart.min.js"></script>
    <script src="vendors/chartjs/roundedBar.min.js"></script>

    <!-- progressbar js -->
    <script src="vendors/progressbar/jquery.barfiller.js"></script>
    <!-- tag input -->
    <script src="vendors/tagsinput/tagsinput.js"></script>
    <!-- text editor js -->
    <script src="vendors/text_editor/summernote-bs4.js"></script>
    <script src="vendors/am_chart/amcharts.js"></script>

    <!-- scrollabe  -->
    <script src="vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="vendors/scroll/scrollable-custom.js"></script>

    <!-- vector map  -->
    <script src="vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
    <script src="vendors/vectormap-home/vectormap-world-mill-en.js"></script>

    <script src="vendors/chart_am/core.js"></script>
    <script src="vendors/chart_am/charts.js"></script>
    <script src="vendors/chart_am/animated.js"></script>
    <script src="vendors/chart_am/kelly.js"></script>
    <script src="vendors/chart_am/chart-custom.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>


<!-- Mirrored from demo.dashboardpack.com/user-management-html/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Oct 2021 02:24:47 GMT -->
</html>
