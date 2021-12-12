<?php include("inc/header.php"); ?>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                       
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header my-3">
                                    <h4>All Sub-Category</h4>
                                   <a href="create_category.php" class="btn btn-primary" data-toggle="modal" data-target="#subcategory"><i class="fas fa-plus-circle"></i> Create Sub Category</a>
                                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active3 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">Sub Category Name</th>
                                                <th scope="col">Icon</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> 1</a></th>
                                                <td>Fresh</td>
                                                <td>Icon</td>
                                                <td>
                                                	<a href=""><i class="fas fa-trash-alt"></i></a> &nbsp; &nbsp; &nbsp;
                                                	<a href=""><i class="fas fa-edit"></i></a>
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




  <!-- Modal -->
  <div class="modal fade" id="subcategory" tabindex="-1" role="dialog" aria-labelledby="subcategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Crate a new Sub-Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        	<form action="" method="">
        		


                <div class="form-group mb-3 my-3">
                    <label>Category Name</label>
                    <select class="form-control" name="">
                    	<option>Select Category</option>
                    	<option value="1">1</option>
                    </select>
                </div>

                <div class="form-group mb-3 my-3">
                    <label>Sub Category Name</label>
                    <input type="text" class="form-control" name=""  placeholder="Text Input">
                </div>

        	</form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- modals ppup  -->

<!-- footer part -->


<?php include("inc/footer.php"); ?>