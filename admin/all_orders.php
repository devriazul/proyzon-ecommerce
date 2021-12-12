<?php 
    include("inc/header.php"); 
        if (isset($_GET['order_status'])) {
           $order_status = $_GET['order_status'];
           $orders=SelectData('orders',"WHERE Status='$order_status' ORDER BY sid DESC ");
        }else{
         $orders=SelectData('orders'," ORDER BY sid DESC ");
        }
?> 
 
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center"> 
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                       
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header my-3">
                                <h4>All Orders</h4>
                            </div>
         
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active3 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">SN</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Coustomer ID</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Items</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              $i=1;
                                                foreach ($orders as $order) {?>

                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"><?php echo $i++ ?></a></th>
                                                <td><a onclick="insert(<?php $order_id=$order['order_id']; echo "'inc/orderinfo.php?order_id=".$order_id."'" ?>)"><?php echo $order['order_id']; ?></a>
                                                </td>
                                                <td><?php echo $order['customer_id']; ?></td>
                                                <td><?php echo $order['order_date']; ?></td>
                                                <?php 
                                                    $total_Items='0';
                                                    $total_Bill='0';
                                                    $Items=SelectData('order_info',"WHERE order_id='".$order['order_id']."'");
                                                    foreach ($Items as $Item) {
                                                        $total_Items+=$Item['quantity'];
                                                        $total_Bill+=$Item['unit_price'];
                                                    } 
                                                ?>
                                                <td><?php echo $total_Bill; ?></td>
                                                <td><?php echo $total_Items; ?></td>
                                                <td><a href="#" class="status_btn" style="color:white;"><?php echo Delivery_Status($order['status']); ?></a></td>
                                            </tr>
                                            <?php } ?>

                                            
                                            
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





<!-- popup -->
<script> 
    function insert(url) {
        $.ajax({
            url: url,
            method: "POST",
            success: function(data) {
                $("#employee_detail").html(data);
                $("#dataModal").modal("show");
            },
        });
    }

</script>

<div id="dataModal" class="modal" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-3" id="employee_detail">
        </div>
    </div>
</div>


 
<?php
    if (isset($_POST['order_stutas_update'])) {     
        $status = $_POST['status'];
        $order_id = $_POST['order_id'];
        $customer_id = $_POST['customer_id'];
        $update=UpdateData('orders',"Status='$status' WHERE Order_ID='$order_id'");
        Reconect('all_orders.php');
    }
?>



<!-- footer part -->


<?php include("inc/footer.php"); ?>