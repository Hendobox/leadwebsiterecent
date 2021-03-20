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
									<h1>Manage Staff</h1>
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
												<a href="#" class="btn btn-lg btn-primary btn-outline"  data-toggle="modal" data-target="#basicModal">Add New Staff</a>
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
                    <h4>Staff Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExports" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Created Date</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = $conn->query("SELECT * FROM admin ORDER BY id DESC") ;
                        if($sql->num_rows>0){
                          while($row=$sql->fetch_assoc()):
                            ?>
                          <tr>
                            <td><?php echo date("M d, Y", strtotime($row['ddate'])); ?></td>
                            <td><?php echo $row['dname']; ?></td>
                            <td><?php echo $row['demail']; ?></td>
                            <td><?php echo $row['dstatus']; ?></td>
                            <td>
                            <div class="dropdown d-inline">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">     

                                        <a class="dropdown-item has-icon" data-toggle="modal" data-target="#basicModal<?php echo $row['id']; ?>" href="#"><i class="fas fa-edit"></i> Edit</a>
                                        <?php
                                        if($row['dstatus'] == 'active'){ ?>
                                        <a class="dropdown-item has-icon" id="bans" intid="<?php echo $row['userid']; ?>" href="#"><i class="fas fa-first-aid"></i> Ban Staff</a>
                                        <?php }else{ ?>
                                        <a class="dropdown-item has-icon" id="unbans" ban="active" text="unban" intid="<?php echo $row['userid']; ?>" href="#"><i class="fas fa-first-aid"></i> Unban Staff</a>
                                        <?php } ?>
                                        <a class="dropdown-item has-icon" id="deleted" intid="<?php echo $row['userid']; ?>" href="#"><i class="fas fa-trash"></i> Delete</a>
                                        
                                    </div>
                                </div>
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
        

      </div>
      
      
      <?php include('footer.php') ?>
      <?php include('modal-staff.php') ?>

    </div>
  </div>
  
  
  <?php include('script.php') ?>
  
</body>


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexsan/source/light/export-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jul 2020 13:49:52 GMT -->
</html>