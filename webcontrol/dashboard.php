<?php include 'head.php' ?>
<body>
  <!-- <div class="loader"></div> -->

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        <?php include  'header.php'; ?>

      <?php include 'aside.php'; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <?php include 'home-top.php'; ?>
           
          <p>
          <h5>Welcome to Lead wallet Admin Dashboard, </h5>
            <?php echo date("D j M Y  H:i:s"); ?>
          </p>

          

        </section>


      </div>
      
      <?php include('footer.php') ?>

    </div>
  </div>
  
  <?php include('script.php') ?>
  
</body>



</html>