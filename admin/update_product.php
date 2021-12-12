<?php 
    include("inc/header.php"); 

  
  if (isset($_POST['update'])) {

    $product_image          =$_FILES["product_image"]["name"];

    //image
    $target_dir = "products/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

    // Update query
     $sql=" UPDATE products 
                   SET 
                   product_name           ='{$_POST['product_name']}',
                   product_category       ='{$_POST['product_category']}',
                   product_stock          ='{$_POST['product_stock']}',
                   product_description    ='{$_POST['product_description']}',
                   p_current_price        ='{$_POST['p_current_price']}',
                   p_previous_price       ='{$_POST['p_previous_price']}',
                   tags                   ='{$_POST['tags']}',
                   brand                  ='{$_POST['brand']}',
                   product_image          ='$product_image' 
                   WHERE 
                   product_id='" . $_GET["product_id"] . "'";

     
     if(mysqli_query($conn, $sql)){
       $msg = "Product Update Successfully !";
       $bg = "alert alert-success";

     }else{
       echo "error";
      }
   }
?>



    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">

            <?php
                $product_id = $_GET['product_id'];
                $select = "SELECT * FROM products WHERE product_id='$product_id'";
                $result=mysqli_query($conn, $select);
                $product_data = mysqli_fetch_array($result);
             ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="white_card mb_30">
                                <div class="white_card_body">

                                    <div class="white_box_tittle list_header my-3">
                                        <h4>Product Update</h4>
                                    </div><hr>


                                    <div class="form-group mb-3 my-3">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="product_name" id="inputText"  value="<?php echo $product_data['product_name']?>">
                                    </div>
 

                                    <div class="form-group mb-3 my-3">
                                        <label>Product Category</label>
                                        <select class="form-control" name="product_category">
                                            <option><?php echo $product_data['product_category']?></option>
                                        </select>
                                    </div>



                                    <!-- <div class="form-group mb-3 my-3">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="">
                                            <option>Select Sub Category</option>
                                            <option>1</option>
                                        </select> 
                                    </div> -->


                                    <div class="form-group mb-3 my-3">
                                        <label>Product Stock</label>
                                        <input type="number" class="form-control" name="product_stock"  value="<?php echo $product_data['product_stock']?>">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <label>Product Description</label>
                                        <textarea class="form-control" id="editor" name="product_description">
                                        <?php echo $product_data['product_description']?>
                                        </textarea>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-lg-4">
                            <div class="white_card  mb_30">
                                <div class="white_card_body">

                                    <div class="form-group mb-3 my-3">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control" name="product_image" value="<?php echo $product_data['product_image']?>"></br> 
                                        <img class="img-thumbnail rounded" src="products/<?php echo $product_data['product_image']?>" style="width: 60px;"> 
                                    </div>


                                    <div class="form-group mb-3 my-3">
                                        <label>Product Current Price</label>
                                        <input type="text" class="form-control" name="p_current_price" value="<?php echo $product_data['p_current_price']?>">
                                    </div>




                                    <div class="form-group mb-3 my-3">
                                        <label>Product Previous Price</label>
                                        <input type="text" class="form-control" name="p_previous_price" value="<?php echo $product_data['p_previous_price']?>">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <label>Tags</label>
                                        <input type="text" class="form-control" name="tags" value="<?php echo $product_data['tags']?>">
                                    </div>


                                    <div class="form-group mb-3 my-3">
                                        <label>Brand</label>
                                        <input type="text" class="form-control" name="brand" value="<?php echo $product_data['brand']?>">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <button class="btn btn-primary form-control" name="update">Update</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            <?php ?> 

            </div>
        </div>
    </div>


<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php include("inc/footer.php"); ?>