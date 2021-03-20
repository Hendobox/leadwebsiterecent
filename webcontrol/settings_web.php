<?php include 'head.php' ?>
<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include  'header.php';
      
      if ($crop['dlevel'] !='admin') { 
        setPrivilege('General', $crop['dprivilege']);
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
									<h1>Settings</h1>
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
                            <th>Interest(%)</th>
                            <th>Minimum(&#8358;)</th>
                            <th>Maximum(&#8358;)</th>
                            <th>New Users(days)</th>
                            <th>Old Users(days)</th>
                            <th>Time Out</th>
                            <th>Upgrade</th>
                            <th>Reopen fee</th>
                            <th>Min Bonus</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = $conn->query("SELECT * FROM `dpercentage`");
                          if($sql->num_rows>0){
                            while($row=$sql->fetch_assoc()):?>
                          
                         
                          <tr>
                            <td><?php echo $row['dpercent'];?></td>
                            <td><?php echo number_format($row['dmin']);?></td>
                            <td><?php echo number_format($row['dmax']);?></td>
                            <td><?php echo $row['dday'];?></td>
                            <td><?php echo $row['olduser'];?></td>
                            <td><?php echo $row['dhours'];?></td>
                            <td><?php echo $row['dupgrade_time'];?></td>
                            <td><?php echo $row['reopen_fee'];?></td>
                            <td><?php echo $row['with_bonus'];?></td>
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
            $sql = $conn->query("SELECT * FROM `dpercentage`");
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
                
                <form action="settings-web-proccess" method="post">

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="per">Interest(%)</label>
                      <input type="text" required id="int" value="<?php echo $row['dpercent']; ?>" class="form-control" name="percent">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="max">Minimum</label>
                      <input type="text" id="min" required value="<?php echo $row['dmin']; ?>" class="form-control" name="min">
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="max">Maximum</label>
                      <input type="text" id="max" required placeholder="Maximum" value="<?php echo $row['dmax']; ?>" class="form-control" name="max">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="day">New users(days)</label>
                      <input type="text" required id="day" placeholder="Days" value="<?php echo $row['dday']; ?>" class="form-control" name="day">
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="days">Old users(days)</label>
                      <input type="text" required id="days" placeholder="Old Users" value="<?php echo $row['olduser']; ?>" class="form-control" name="old">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="dayx">Time Out</label>
                      <input type="text" required id="day" placeholder="Hours" value="<?php echo $row['dhours']; ?>" class="form-control" name="hours">
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="dayxx">Upgrade Time</label>
                      <input type="text" required id="dayxx" placeholder="Upgrade Time" value="<?php echo $row['dupgrade_time']; ?>" class="form-control" name="upgrade">
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="dayxxs">Reopen Fee</label>
                      <input type="text" required id="dayxxs" placeholder="Reopen Fee" value="<?php echo $row['reopen_fee']; ?>" class="form-control" name="open">
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="dayxxss">Min Bonus</label>
                      <input type="text" required id="dayxxss" placeholder="Min Bonus" value="<?php echo $row['with_bonus']; ?>" class="form-control" name="with_bonus">
                  </div>
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