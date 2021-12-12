<?php 
include("inc/header.php"); 


if (isset($_POST['submit'])) {
      $product_code           = "PR".date('Y').rand('100','999999');
      $product_name           =$_POST['product_name'];
      $product_category       =$_POST['product_category'];
      $product_stock          =$_POST['product_stock'];
      $product_description    =$_POST['product_description'];
      $p_current_price        =$_POST['p_current_price'];
      $p_previous_price       =$_POST['p_previous_price'];
      $tags                   =$_POST['tags'];
      $brand                  =$_POST['brand'];
      $product_image          =$_FILES["product_image"]["name"];

      //image
      $target_dir  = "products/";
      $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
      move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
      
          
    // insert query
         $sql=" INSERT INTO products (
                 product_code,
                 product_name, 
                 product_category, 
                 product_stock, 
                 product_description, 
                 p_current_price, 
                 p_previous_price, 
                 tags, 
                 brand, 
                 product_image) 
                 VALUES(
                 '$product_code',
                 '$product_name',
                 '$product_category',
                 '$product_stock',
                 '$product_description',
                 '$p_current_price',
                 '$p_previous_price',
                 '$tags',
                 '$brand',
                 '$product_image')";

         if(mysqli_query($conn, $sql)){
           $msg = "Product Create Successfully !";
           $bg = "alert alert-success";

         }else{
           echo "error";
         }
    }


?>

    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">

            <?php if (isset($msg)){ ?>
                <div class="alert alert-success <?php echo $bg; ?>" role="alart">
                  <strong><?php echo $msg; ?></strong>
                </div>    
            <?php } ?>

            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="white_card mb_30">
                                <div class="white_card_body">

                                    <div class="white_box_tittle list_header my-3">
                                        <h4>Product Create</h4>
                                    </div><hr>


                                    <div class="form-group mb-3 my-3">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control"id="inputText" placeholder="Text Input" name="product_name">
                                    </div>


                                    <div class="form-group mb-3 my-3">
                                        <label>Product Category</label>
                                        <select class="form-control" name="product_category">
                                            <option>Select Category</option>

                                            <?php
                                              $select_category="SELECT * FROM category";
                                              $category_show=mysqli_query($conn, $select_category);
                                              foreach($category_show as $rows){?>

                                                <option value="<?php echo $rows['category_id']; ?>">
                                                <?php echo $rows['category_name']; ?></option>

                                            <?php } ?> 
                                        </select>
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <label>Sub Category</label>
                                       <!--  <select class="form-control" name="">
                                            <option>Select Sub Category</option>
                                            <option>1</option>
                                        </select>  -->
                                    </div>


                                    <div class="form-group mb-3 my-3">
                                        <label>Product Stock</label>
                                        <input type="number" class="form-control" name="product_stock" placeholder="Product Stock">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <label>Product Description</label>
                                        <textarea class="form-control" id="editor" name="product_description"></textarea>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-lg-4">
                            <div class="white_card  mb_30">
                                <div class="white_card_body">

                                    <div class="form-group mb-3 my-3">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control" name="product_image">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <label>Product Current Price</label>
                                        <input type="text" class="form-control" name="p_current_price" placeholder="Product Current Price">
                                    </div>




                                    <div class="form-group mb-3 my-3">
                                        <label>Product Previous Price</label>
                                        <input type="text" class="form-control" name="p_previous_price" placeholder="Product Previous Price">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <label>Tags</label>
                                        <input type="text" class="form-control" name="tags" placeholder=" Product Tags">
                                    </div>


                                    <div class="form-group mb-3 my-3">
                                        <label>Brand</label>
                                        <input type="text" class="form-control" name="brand" placeholder="Product Brand">
                                    </div>



                                    <div class="form-group mb-3 my-3">
                                        <button class="btn btn-primary form-control" name="submit">Submit</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
               </form>
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