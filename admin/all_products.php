<?php include("inc/header.php"); ?>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                       
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header my-3">
                                    <h4>All Products</h4>
                                  
                                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active3 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">SN</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            $select_data="SELECT * FROM products";
                                            $result=mysqli_query($conn, $select_data);
                                            $i=1;
                                            foreach($result as $rows){?>

                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content">
                                                <?php echo $i++; ?></a></th>
                                                <td><?php echo $rows['product_name']; ?></td>
                                                <td><?php echo $rows['product_stock']; ?></td>
                                                <td><img src="products/<?php echo $rows['product_image']; ?>" style="width: 50px;"></td>
                                                <td><?php echo $rows['p_current_price']; ?></td>
                                                <td>
                                                	<a href="all_products.php?product_id=<?php echo $rows['product_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a> &nbsp; &nbsp; &nbsp;

                                                	<a href="update_product.php?product_id=<?php echo $rows['product_id']; ?>"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php }?>   
                                          
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




<?php

if (isset($_GET["product_id"])) {

        $sql = "DELETE FROM products WHERE product_id='" . $_GET["product_id"] . "'";

        if (mysqli_query($conn, $sql)) {
          $delete_msg = "Product deleted successfully";
          $bg = "alert alert-danger";

          echo "<script>window.location.href='".$_SERVER['PHP_SELF']."';</script>";

        } else {
            echo "Error deleting record:" ;
        }

    }
?>

<!-- footer part -->


<?php include("inc/footer.php"); ?>