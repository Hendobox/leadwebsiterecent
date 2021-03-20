<?php include 'head.php' ?>
<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include  'header.php'; 
      if ($crop['dlevel'] !='admin') { 
        setPrivilege('Users', $crop['dprivilege']);
      }
      ?>

      <?php include 'aside.php'; ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="section-header-breadcrumb-content">
									<h1>Manage Upload social Media</h1>
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
                    <h4>Upload social Media</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExports" style="width:100%;">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Facebook Link</th>
                            <th>Instagram Link</th>
                            <th>Date</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = $conn->query("SELECT * FROM dsocial WHERE dstatus='pending' AND dverify='no' ORDER BY id ASC");
                          if($sql->num_rows>0){
                            while($row=$sql->fetch_assoc()):?>
                          
                         
                          <tr>
                            <td><?php echo $row['userid'];?></td>
                            <td> <a target="_blank" href="<?php echo $row['dface'];?>"> <?php echo $row['dface'];?></a></td>
                            <td><a target="_blank" href="<?php echo $row['dint'];?>"><?php echo $row['dint'];?></a></td>
                            <td><?php echo $row['ddate'];?></td>
                            <td>
                            <button intid="<?php echo $row['id'];?>" id="verify" class="btn btn-info btn-sm">Verify</button>
                            <button id="reject" intid="<?php echo $row['id'];?>" class="btn-sm btn-primary btn">Reject</button>
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
      <?php //include('modal-department.php') ?>
      <?php include('modal-activator.php') ?>

    </div>
  </div>
  
  
  <?php include('script.php') ?>
  
</body>


</html>