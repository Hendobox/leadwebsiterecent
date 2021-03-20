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
									<h1>Manage Banks</h1>
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
												<a href="#" class="btn btn-lg btn-primary btn-outline"  data-toggle="modal" data-target="#basicModal">Add New Blog</a>
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
                    <h4>Blogs</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExports" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Post By</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>---</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = $conn->query("SELECT * FROM dblog ORDER BY id DESC") ;
                        if($sql->num_rows>0){
                          while($row=$sql->fetch_assoc()):
                            ?>
                          <tr>
                            <td>
                              <img style="max-width: 50px;" src="../cover/<?php echo $row['dimg']; ?>.jpg" alt="">
                            </td>
                            <td><?php echo $row['dby']; ?></td>
                            <td><?php echo $row['dtitle']; ?></td>
                            <td><?php echo limit_text($row['ddesc'],10); ?></td>
                            <td><?php echo formatDate($row['ddate']); ?></td>
                            <td>
                            <div class="dropdown d-inline">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">                                    
                                       
                                        <a class="dropdown-item has-icon" data-toggle="modal" data-target="#basicModal<?php echo $row['id']; ?>" href="#"><i class="fas fa-edit"></i> Edit</a>
                                        
                                        <a class="dropdown-item has-icon" id="deletebank" img="<?php echo $row['dimg']; ?>" bid="<?php echo $row['bid']; ?>" href="#"><i class="fas fa-trash"></i> Delete</a>
                                        
                                    </div>
                                </div>
                            </td>
                          </tr>
                          
                          <?php endwhile; }else{
                              echo "<tr><td colspan='4'>No bank recorded</td></tr> ";
                          } ?>

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
      <?php //include('modal-staff.php') ?>



 <!-- basic modal -->
 <div class="modal fade mergeMe" id="basicModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
            <form action="blog-process" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="pay">Title</label>
                  <input type="text" required id='pay' name="title" placeholder="Enter Title" class="form-control">                    
                </div>
                <div class="form-group">
                  <label for="pay">Description</label>
                    <textarea name="desc" class="form-control ckeditor"></textarea>                   
                </div>

                <div class="form-group">
                  <label for="pay">Cover Photo</label>
                    <input type="file" required name="img" id="" class="form-control-file">                   
                </div>
                <input type="hidden" name="by" value="<?php echo $crop['dname']; ?>">

        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary btn-lgs" data-dismiss="modal">cancel</button> 
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    </div>
</div>


<?php
    $sql = $conn->query("SELECT * FROM dblog ORDER BY id DESC") ;
    if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()):
        ?>


 <!-- basic modal -->
 <div class="modal fade mergeMe" id="basicModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

        
        <img style="max-width: 100%;" src="../cover/<?php echo $row['dimg']; ?>.jpg" alt="">
        
            <form action="blog-process" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['bid']; ?>">
            <input type="hidden" name="himg" value="<?php echo $row['himg']; ?>">
                <div class="form-group">
                  <label for="pay">Title</label>
                  <input type="text" required value="<?php echo $row['dtitle']; ?>" name="title" placeholder="Enter Title" class="form-control">                    
                </div>
                <div class="form-group">
                  <label for="pay">Description</label>
                    <textarea name="desc" class="form-control ckeditor"><?php echo $row['ddesc']; ?></textarea>                   
                </div>

                <div class="form-group">
                  <label for="pay">Cover Photo(Optional)</label>
                    <input type="file" name="img" id="" class="form-control-file">                   
                </div>


        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary btn-lgs" data-dismiss="modal">cancel</button> 
        <button type="submit" name="saves" class="btn btn-primary">Update</button>
        </form>
        </div>
    </div>
    </div>
</div>

        <?php endwhile; }?>





    </div>
  </div>
  
  
  <?php include('script.php') ?>
  
</body>


</html>