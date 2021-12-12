
<?php include('inc/header.php'); ?>

    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card" style="background-color:#113053;">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="admin/signup/<?php echo $userimage; ?>" alt="">
                <div class="change-user-thumb">
                  <form>
                    <input class="form-control-file" type="file">
                    <button><i class="lni lni-pencil"></i></button>
                  </form>
                </div>
              </div>
              <div class="user-info">
                <h5 class="mb-0 text-white"><?php echo $username;?></h5>
                <p class="mb-0 text-white"><?php echo $phone;?></p>

              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="#" method="">
                
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-user"></i><span>Full Name</span></div>
                  <input class="form-control" type="text" value="<?php echo $username;?>" disabled>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-phone"></i><span>Phone</span></div>
                  <input class="form-control" type="text" value="<?php echo $phone;?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                  <input class="form-control" type="email" value="<?php echo $email;?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Shipping Address</span></div>
                  <input class="form-control" type="text" value="<?php echo $address;?>">
                </div>
                <button class="btn btn-warning w-100" type="submit">Save All Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Footer -->
   <?php include('inc/footer.php'); ?>
