
            
            <?php if(in_array('Transactions', $explode)){?>

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Manage Transactions</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="pending-transactions">Pending Transactions</a></li>
                <li><a class="nav-link" href="confirmed-transactions">Confirmed Transactions</a></li>
                <li><a class="nav-link" href="cancelled-transactions">Cancelled Transactions</a></li>
              </ul>
            </li>

            <?php  } ?>

            <?php if(in_array('Withdrawals', $explode)){?>
            <li><a class="nav-link" href="withdrawals"><i class="fas fa-boxes"></i><span>Pending Withdrawals</span></a></li>
            <?php } ?>

            <?php if(in_array('Withdrawals History', $explode)){?>
            <li><a class="nav-link" href="withdrawals-history"><i class="fas fa-book"></i><span> Withdrawals History</span></a></li>
            <?php } ?>

            <?php if(in_array('Depositors', $explode)){?>
            <li><a class="nav-link" href="depositors"><i class="fas fa-boxes"></i><span>Pending Depositors</span></a></li>
            <?php } ?>

            <?php if(in_array('Depositor History', $explode)){?>
            <li><a class="nav-link" href="depositors-history"><i class="fas fa-book"></i><span> Depositors History</span></a></li>

            <?php } ?>

            <?php if(in_array('Users', $explode)){?>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Manage Users</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="users">Active Users</a></li>
                <li><a class="nav-link" href="banned">Banned Users</a></li>
                <!-- <li><a class="nav-link" href="blocked">blocked Users</a></li> -->
                <li><a class="nav-link" href="activate-users">Pending Activations</a></li>
                <li><a class="nav-link" href="pending-reactivations">Pending Reactivations</a></li>
                <li><a class="nav-link" href="social-media">Pending Upload media</a></li>
                <!-- <li><a class="nav-link" href="pending-confirmations">Pending Confirmations</a></li> -->
              </ul>
            </li>

            <?php } ?>

            <?php if(in_array('Activators', $explode)){?>
            <!-- <li><a class="nav-link" href="activate-users"><i class="fas fa-boxes"></i><span> Activate Users </span></a></li> -->
            <li><a cla ss="nav-link" href="activators"><i class="fas fa-boxes"></i><span>Manage Activators</span></a></li>
            <?php } ?>

            <?php if(in_array('Web Settings', $explode)){?>
            <li><a cla ss="nav-link" href="web-settings"><i class="fas fa-cog"></i><span>Web Settings</span></a></li>
            <?php } ?>

            <?php if(in_array('General', $explode)){?>
           
            <li><a class="nav-link" href="settings_web"><i class="fas fa-boxes"></i><span>General Settings</span></a></li>
            <?php } ?>

           
            