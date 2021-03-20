<?php include 'head.php' ?>
<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include  'header.php'; ?>

      <?php include 'aside.php'; ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="section-header-breadcrumb-content">
									<h1>Change Password</h1>
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                  </div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="section-header-breadcrumb-chart float-right">
									<div class="breadcrumb-chart m-l-50">
										<div class="float-right m-r-5 m-l-10 m-t-1">
											<div class="chart-info">
												<!-- <a href="#" class="btn btn-lg btn-primary btn-outline"  data-toggle="modal" data-target="#basicModal">Add New Staff</a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
          <div class="section-body">
            <div class="row">
            <div class="col-md-3 col-sm-12"></div>
              <div class="col-md-6 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Change Your Password</h4>
                  </div>
                  <div class="card-body">

                  <form action="auth-reset-password-proccess" method="post">
                        <div class="form-group">
                            <label for="fname">Old Password</label>
                            <input type="password" name="old" required placeholder="Enter Old Password" id="fname" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="user">New Password</label>
                            <input type="password" name="pass" required placeholder="Enter New Password" id="user" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="phone">Confirm New Password</label>
                            <input type="password" name="cpass" required placeholder="Enter Confirm Password" id="phone" class="form-control form-control-sm">
                        </div>

                        <button type="submit" name="passed" class="btn btn-outline btn-primary btn-lg">Change Password</button>
                  
                  </form>
                    
                  </div>
                </div>
              </div>
            <div class="col-md-3 col-sm-12"></div>
            </div>
          </div>
        </section>
        

      </div>
      
      
      <?php include('footer.php') ?>

    </div>
  </div>
  
  
  <?php include('script.php') ?>
  
</body>


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexsan/source/light/export-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jul 2020 13:49:52 GMT -->
</html>