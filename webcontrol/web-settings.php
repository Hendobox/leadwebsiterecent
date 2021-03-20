<?php include 'head.php' ?>
<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include  'header.php';
      include 'aside.php'; ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="section-header-breadcrumb-content">
									<h1>Web Settings</h1>
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
												<!-- <a href="#" class="btn btn-lg btn-primary btn-outline"  data-toggle="modal" data-target="#basicModal">Add New Activators</a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Setting</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExports" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Web Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = $conn->query("SELECT * FROM `dsetting`");
                          if($sql->num_rows>0){
                            while($row=$sql->fetch_assoc()):?>
                          
                         
                          <tr>
                            <td><?php echo $row['dname'];?></td>
                            <td><?php echo $row['dweb_name'];?></td>
                            <td><?php echo $row['demail'];?></td>
                            <td><?php echo $row['dphone'];?></td>
                            <td><?php echo $row['daddress'];?></td>
                            <td>
                            <button class="btn btn-info" data-toggle="modal" data-target="#basicModal<?php echo $row['id']; ?>">Update</button>
                            </td>
                          </tr>
                            <?php endwhile; } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php //include('aside-right.php') ?>

      </div>
      
      
      <?php include('footer.php') ?>
      <?php //include('modal-departments.php') ?>
      <?php
            $sql = $conn->query("SELECT * FROM `dsetting`");
            if($sql->num_rows>0){
            while($row=$sql->fetch_assoc()):?>
       <!-- basic modal -->
    <div class="modal fade" id="basicModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Web Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                
                <form action="web-settings-proccess" method="post">

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="per">Name</label>
                      <input type="text" id="int" required value="<?php echo $row['dname']; ?>" class="form-control" name="name">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="max">Web Name</label>
                      <input type="text" id="min" required value="<?php echo $row['dweb_name']; ?>" class="form-control" name="web">
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                  <label for="max">Email</label>
                      <input type="text" id="max" required placeholder="Email" value="<?php echo $row['demail']; ?>" class="form-control" name="email">
                  </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                  <label for="day">Phone No</label>
                      <input type="text" id="day" required placeholder="Phone No" value="<?php echo $row['dphone']; ?>" class="form-control" name="phone">
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                  <label for="days">Address</label>
                      <input type="text" id="days" required placeholder="Address" value="<?php echo $row['daddress']; ?>" class="form-control" name="address">
                  </div>
                  

                </div>

               
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Update</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <?php endwhile; } ?>

    </div>
  </div>
  
  
  <?php include('script.php') ?>
  
</body>


</html>