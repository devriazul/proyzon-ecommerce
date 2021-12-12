<?php include("inc/header.php"); ?>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                       
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header my-3">
                                    <h4>All User</h4>
                                    <a href="user_create.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i>User Create</a>
                                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active3 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">User Type</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Acount Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> 1</a></th>
                                                <td>Admin</td>
                                                <td>boss</td>
                                                <td>Morning Boss</td>
                                                <td>7456745474</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
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

<!-- footer part -->


<?php include("inc/footer.php"); ?>