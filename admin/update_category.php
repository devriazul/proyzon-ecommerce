<?php 
    include("inc/header.php"); 

  
  if (isset($_POST['update'])) {


    // Update query
     $sql=" UPDATE category 
                   SET 
                   category_name          ='{$_POST['category_name']}',
                   category_icon          ='{$_POST['category_icon']}'
                   WHERE 
                   category_id='" . $_GET["category_id"] . "'";

     
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
                $category_id = $_GET['category_id'];
                $select = "SELECT * FROM category WHERE category_id='$category_id'";
                $result=mysqli_query($conn, $select);
                $category_data = mysqli_fetch_array($result);
             ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="white_card mb_30">
                                <div class="white_card_body">

                                    <div class="white_box_tittle list_header my-3">
                                        <h4>Category Update</h4>
                                    </div><hr>


                                    <div class="form-group mb-3 my-3">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="category_name" id="inputText"  value="<?php echo $category_data['category_name']?>">
                                    </div>
 

                                    <div class="form-group mb-3 my-3">
                                    	<input type="text" class="form-control" name="category_icon" value="<?php echo $category_data['category_icon']?>">
                                    </div>



                                    <!-- <div class="form-group mb-3 my-3">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="">
                                            <option>Select Sub Category</option>
                                            <option>1</option>
                                        </select> 
                                    </div> -->


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