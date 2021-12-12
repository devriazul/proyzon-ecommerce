<?php include("inc/header.php"); 



if (isset($_POST['submit'])) {

  $category_name    =$_POST["category_name"];
  $category_icon    =$_POST["category_icon"];

// insert query
    $sql=" INSERT INTO category (
                category_name, 
                category_icon) 
                VALUES (
                '$category_name',
                '$category_icon')";


     if(mysqli_query($conn, $sql)){
       $msg = "Catgory Create Successfully !";
       $bg = "alert alert-success";

     }else{
       echo "error";
     }
} ?>


    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                       
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header my-3">
                                    <h4>All Category</h4>
                                   <a href="create_category.php" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus-circle"></i> Create Category</a>
                                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active3 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col"> Category Name</th>
                                                <th scope="col">Icon</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            $select_data="SELECT * FROM category";
                                            $result=mysqli_query($conn, $select_data);
                                            $i=1;
                                            foreach($result as $rows){?>  

                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"><?php echo $i++; ?></a></th>
                                                <td><?php echo $rows['category_name']; ?></td>
                                                <td>
                                                    <i class="<?php echo $rows['category_icon']; ?>"></i>
                                                </td>

                                                <td>
                                                	<a href="category.php?category_id=<?php echo $rows['category_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a> &nbsp; &nbsp; &nbsp;

                                                	<a href="update_category.php?category_id=<?php echo $rows['category_id']; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
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


<?php

if (isset($_GET["category_id"])) {

        $sql = "DELETE FROM category WHERE category_id='" . $_GET["category_id"] . "'";

        if (mysqli_query($conn, $sql)) {
          $delete_msg = "Category deleted successfully";
          $bg = "alert alert-danger";

          echo "<script>window.location.href='".$_SERVER['PHP_SELF']."';</script>";

        } else {
            echo "Error deleting record:" ;
        }

    }
?>


  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Crate a new Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
           <div class="modal-body">     
        	<form action="" method="POST">

        		<div class="form-group mb-3 my-3">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="category_name"  placeholder="Category Name">
                </div>

                <div class="form-group mb-3 my-3">
                    <label>Category Icon</label>
                    <input type="text" class="form-control" name="category_icon"  placeholder="Category Icon">
                </div>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submit">Save Category</button>
                </div>
         </form>

      </div>
    </div>
  </div>
<!-- modals ppup  -->

<!-- footer part -->
<?php include("inc/footer.php"); ?>