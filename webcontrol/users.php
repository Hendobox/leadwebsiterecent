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
									<h1>Manage Active Users</h1>
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                  </div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ">
								<div class="section-header-breadcrumb-chart float-rights ">
									<div class="breadcrumb-charts m-l-50s">
										<div class="float-rights bg-dangers">
												<form action="search-process" method="post" >
                        <div class="row">
                          <div class="col-md-8">
                          <input type="text" name="search" placeholder="Enter search here..." class="form-control">
                          </div>
                          <div class="col-md-4">
                          <button type="submit" name="user" class="btn btn-info btn-lg">Search</button>
                          </div>
                        </div>
                        </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

          <?php
              if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                  $page_no = $_GET['page_no'];
                  }else {
                      $page_no = 1;
                      } 
                      $total_records_per_page = 100;

          ?>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Active Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExports" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Bonus Balance(&#8358;)</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          if(isset($_GET['search']) AND $_GET['search'] !=''){
                            $search = clean($_GET['search']);
                            $sqls =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='active' AND dlevel='customer' AND userid LIKE '%$search%' OR dstatus='active' AND dlevel='customer' AND demail LIKE '%$search%' OR dstatus='active' AND dlevel='customer' AND dphone LIKE '%$search%' OR dstatus='active' AND dlevel='customer' AND dactivator LIKE '%$search%' ORDER BY dusername");
                            $total_records =$sqls->num_rows;
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $start_from = ($page_no - 1) * $total_records_per_page;

                            $sql =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='active' AND dlevel='customer' AND userid LIKE '%$search%' OR dstatus='active' AND dlevel='customer' AND demail LIKE '%$search%' OR dstatus='active' AND dlevel='customer' AND dphone LIKE '%$search%' OR dstatus='active' AND dlevel='customer' AND dactivator LIKE '%$search%' ORDER BY dusername LIMIT $start_from, $total_records_per_page");
                          }else{
                            $sqls =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='active' AND dlevel='customer' ORDER BY dusername");
                            $total_records =$sqls->num_rows;
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $start_from = ($page_no - 1) * $total_records_per_page;

                          $sql =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='active' AND dlevel='customer' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                          }
                          if($sql->num_rows>0){
                            while($row=$sql->fetch_assoc()):
                              ?>
                          <tr>
                          <td><?php 
                                $dap = $row['ddate'];
                                echo gmdate("M d, Y H:i:s", strtotime($dap." +1hours"));?>
                                </td>
                            
                            <td><?php echo $row['userid']?></td>
                            <td><?php echo $row['dusername']?></td>
                            <td><?php echo $row['demail']?></td>
                            <td><?php echo $row['dphone']?></td>
                            <td><?php if($row['dbonus']==0){echo "0.00"; }else{echo number_format($row['dbonus']); }?></td>
                            <!-- <td><?php //echo $row['dactivator']?></td> -->
                            
                            <!-- <button  class="btn  btn-primary">Ban</button> -->
                            <td>
                                <div class="dropdown d-inline">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">                                    
                                        <!-- <a class="dropdown-item has-icon" id='activator' lap="<?php //echo $row['userid']; ?>" href="#"><i class="fas fa-users"></i> Make Activator</a> -->
                                        <a class="dropdown-item has-icon" phone="<?php echo $row['dphone']; ?>" id='bonus' email="<?php echo $row['demail']; ?>" love="<?php echo $row['dusername']; ?>" userid="<?php echo $row['userid']; ?>" href="#"><i class="fas fa-users"></i>Fund Bonus</a>

                                        <a class="dropdown-item has-icon" id='ban' text="inactive" lap="<?php echo $row['userid']; ?>" href="#"><i class="fas fa-exclamation-triangle"></i> Ban User</a>

                                        <a class="dropdown-item has-icon" dname="<?php echo $row['dusername']; ?>" id='accountBank' acc_name='<?php echo $row['dacc_name']; ?>' bank='<?php echo $row['dbank']; ?>' acc_num='<?php echo $row['dacc_number']; ?>' usid="<?php echo $row['userid']; ?>" href="#"><i class="fas fa-edit"></i>Update Account</a>
                                    </div>
                                </div>
                            
                            </td>
                          </tr>
                          
                            <?php endwhile; }else{
                              echo "<tr><td colspan='7'>No result found</td></tr>";
                            }?>
                        </tbody>
                      </table>
                      <ul class="pagination pagination-md justify-content-center">
            
            <?php 

          if(isset($_GET['search']) AND $_GET['search'] !=''){
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
              $search = $_GET['search'];
              echo "<li  class='page-item '><a class='page-link' href='users?search=$search&page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
          
            }
          }else{
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
              echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
          
          }
          }
           
            ?>
            </ul>
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
      <?php include('modal-staffs.php') ?>


      <!-- basic modal -->
 <div class="modal fade bonusMe" id="basicModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fund Bonus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <p>
            <b class="lop">Username: </b> <span id="names"></span> <br>
            <b class="lop">Email: </b> <span id="email"></span> <br>
            <b class="lop">Phone: </b> <span id="phone"></span>
        </p>

        <form action="bonus-proccess" method="post">
          <div class="form-group">
          <label for="bo">Enter Amount</label>
            <input type="text" required id="bo" name="bonus" placehlder='Enter Amount' class="form-control">
            <input type="hidden" name="userid" value='' id="user">
          </div>
        
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
    </div>
</div>



    <!-- basic modal -->
    <div class="modal fade accountBankModal" id="basicModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Account Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <p>
            <b class="lop">Username: </b> <span id="dnames"></span>
        </p>

        <form action="user-account-proccess" method="post">
          <div class="form-group">
          <label for="bo">Enter Account Name</label>
            <input type="text" required id="accname" name="name" placehlder='Enter Acount Name' class="form-control">
            <input type="hidden" name="userid" value='' id="userids">
          </div>

          <div class="form-group">
          <label for="bo">Enter Account Number</label>
            <input type="text" required id="number" name="number" placehlder='Enter Account Number' class="form-control">
          </div>

          <div class="form-group">
          <label for="bo">Enter Bank Name</label>
            <input type="text" required id="bank" name="bank" placehlder='Enter Bank Name' class="form-control">
          </div>
        
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
    </div>
</div>





    </div>
  </div>
  
  
  <?php include('script.php');
   ?>
  
</body>


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexsan/source/light/export-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jul 2020 13:49:52 GMT -->
</html>