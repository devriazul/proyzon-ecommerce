<?php include("inc/header.php"); ?>

    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">

   <form action="" method="">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card mb_30">
                        <div class="white_card_body" style="min-height: 400px;">
                        	<div class="white_box_tittle list_header my-3">
                                <h4>Create User</h4>
							</div><hr>

                        <div class="col-lg-6 float-left">

                        	<div class="form-group mb-3 my-3">
                                <label>Frist Name</label>
                                <input type="text" class="form-control" name="frist_name" id="inputText" placeholder="Frist Name">
                            </div>


                            <div class="form-group mb-3 my-3">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="user_name" id="inputText" placeholder="User Name">
                            </div>


                            <div class="form-group mb-3 my-3">
                                <label>User Type</label>
                                <select class="form-control" name="user_type">
                                	<option>Select User Type</option>
                                	<option>Boss</option>
                                </select>
                            </div>



                        </div>


                        <div class="col-lg-6 float-right">

                        	<div class="form-group mb-3 my-3">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="inputText" placeholder="Last Name">
                            </div>



                            <div class="form-group mb-3 my-3">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                            </div>

                             <div class="form-group mb-3 my-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>

                            <button class="btn btn-primary float-right" name="submit">Save</button>

                        </div>


                        
                        </div>
                    </div>
                </div>

                
                
            </div>

      </form>
                


            </div>
        </div>
    </div>




<?php include("inc/footer.php"); ?>