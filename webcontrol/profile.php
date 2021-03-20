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
									<h1>My Profile</h1>
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
            <div class="col-3"></div>
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>My Profile</h4>
                  </div>
                  <div class="card-body">

                  <form action="profile-process" method="post">
                        

                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" name="user"  value="<?php echo $crop['dname'] ?>" required placeholder="Enter Username" id="user" class="form-control form-control-sm">
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $crop['demail'] ?>" required placeholder="Enter Email" id="email" class="form-control form-control-sm">
                        </div>

                        <button type="submit" name="log" class="btn btn-outline btn-primary btn-lg">Update Profile</button>
                  
                  </form>
                    
                  </div>
                </div>
              </div>
            <div class="col-3"></div>
            </div>
          </div>
        </section>
        

      </div>
      
      
      <?php include('footer.php') ?>
      <?php //include('modal-staffs.php') ?>

    </div>
  </div>
  
  
  <?php include('script.php') ?>
  
</body>


</html>