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
									<h1>Manage Banned Users</h1>
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
                          <button type="submit" name="ban" class="btn btn-info btn-lg">Search</button>
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
                    <h4>Banned Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExports" style="width:100%;">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(isset($_GET['search']) AND $_GET['search'] !=''){
                            $search = clean($_GET['search']);
                            $sqls =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='inactive' AND dlevel='customer' AND userid LIKE '%$search%' OR dstatus='inactive' AND dlevel='customer' AND demail LIKE '%$search%' OR dstatus='inactive' AND dlevel='customer' AND dphone LIKE '%$search%' OR dstatus='inactive' AND dlevel='customer' AND dactivator LIKE '%$search%' ORDER BY dusername");
                            $total_records =$sqls->num_rows;
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $start_from = ($page_no - 1) * $total_records_per_page;

                            $sql =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='inactive' AND dlevel='customer' AND userid LIKE '%$search%' OR dstatus='inactive' AND dlevel='customer' AND demail LIKE '%$search%' OR dstatus='inactive' AND dlevel='customer' AND dphone LIKE '%$search%' OR dstatus='inactive' AND dlevel='customer' AND dactivator LIKE '%$search%' ORDER BY dusername LIMIT $start_from, $total_records_per_page");
                          }else{
                            $sqls =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='inactive' AND dlevel='customer' ORDER BY dusername");
                            $total_records =$sqls->num_rows;
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $start_from = ($page_no - 1) * $total_records_per_page;

                          $sql =$conn->query("SELECT * FROM `dlogin` WHERE dstatus='inactive' AND dlevel='customer' ORDER BY dusername LIMIT $start_from, $total_records_per_page");
                          }

                          if($sql->num_rows>0){
                            while($row=$sql->fetch_assoc()):
                              ?>
                          <tr>
                            <td><?php echo $row['userid']?></td>
                            <td><?php echo $row['dusername']?></td>
                            <td><?php echo $row['demail']?></td>
                            <td><?php echo $row['dphone']?></td>
                            <td>
                            
                                
                            <button id='unban' text="active" lap="<?php echo $row['userid']; ?>"  class="btn btn-sm btn-primary">Unban</button>
                            
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
              echo "<li  class='page-item '><a class='page-link' href='banned?search=$search&page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
          
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

    </div>
  </div>
  
  
  <?php include('script.php');
   ?>
  
</body>


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexsan/source/light/export-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jul 2020 13:49:52 GMT -->
</html>