<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard">
              <!-- <img alt="image" style="max-width:100%" src="../assets/img/lion.png" class="header-logo" /> -->
              <span class="logo-name"><?php echo ucwords('leadwallet'); ?></span>
            </a>
          </div>
          <ul class="sidebar-menu">
          	<li class="dropdown active" style="display: block;">
          		 <div class="sidebar-profile">
	                 
	                 <div class="siderbar-profile-details">
                       <div class="siderbar-profile-name"> <?php 
                       
                        echo $crop['dname']; 
                       
                      ?></div>
	                     <div class="siderbar-profile-position">Manager </div>
	                 </div>
	                 
                 </div>
             </li>
            <li class="menu-header">Main</li>
            
            <li><a class="nav-link" href="dashboard"><i class="fas fa-cog"></i><span>Dashboard</span></a></li>
            
            <?php            
                require 'admin.php';             
            ?>
            
            <li class="menu-header">Pages</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-lock"></i><span>My Account</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="profile">Profile</a></li>                
                <li><a href="auth-reset-password">Change Password</a></li>
                <li><a class="nav-link" href="logout">Logout</a></li>
              </ul>
            </li>
            
            
            
          </ul>
        </aside>

        
      </div>