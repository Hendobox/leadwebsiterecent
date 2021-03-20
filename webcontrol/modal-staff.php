 <!-- basic modal -->
 <div class="modal fade" id="basicModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="staff-proccess" method="post">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" required placeholder="Username" id="user" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label for="email">Email</label>
                        <input type="email" name="email" required placeholder="Email" id="email" class="form-control form-control-sm">
                    </div>
                 </div>
               
                <div class="col-md-12">
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" required placeholder="Password" id="pass" class="form-control form-control-sm">
                </div>
                </div>
            </div>

            



        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="log" class="btn btn-primary">Create Staff</button>
        </form>
        </div>
    </div>
    </div>
</div>


<?php
    $sql = $conn->query("SELECT * FROM admin  ORDER BY id DESC") ;
    if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()):
        ?>
<!-- basic modal -->
<div class="modal fade" id="basicModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="staff-proccess-update" method="post">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" value="<?php echo $row['dname']; ?>" required placeholder="Username" id="user" class="form-control form-control-sm">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $row['demail']; ?>" required placeholder="Email" id="email" class="form-control form-control-sm">
                    </div>
                </div>
            </div>


        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="log" class="btn btn-primary">Update Staff</button>
        </form>
        </div>
    </div>
    </div>
</div>

        <?php endwhile; } ?>