
<?php include 'head.php' ?>

<body class="background-image-body">
  <!-- <div class="loader"></div> -->
  <div id="app">
    <section class="section">
      <div class="container mt-5s" style="margin-top:10px">
        <div class="row">
          <div class="col-12 col-sm-12 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand login-brand-color">
            	<img alt="image" src="../img/part/transparent.png" style="max-width:100%" />
            </div>
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Login to Admin Account</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="login-proccess" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      
                    </div>
                    <input id="password" type="password" class="form-control" name="pass" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-lg btn-block btn-auth-color" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="register">Create One</a>
            </div> -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <?php if(isset($_SESSION["msg"])): ?>
  <script>
      (function() {
      iziToast.error({
        title: 'Error!',
        message: '<?php echo $_SESSION["msg"]; ?>',
        position: 'topRight'
      });
    })();
  </script>
  <?php endif; unset($_SESSION["msg"]); ?>

  <?php if(isset($_SESSION["msgs"])): ?>
  <script>
      (function() {
      iziToast.success({
        title: 'Successful!',
        message: '<?php echo $_SESSION["msgs"]; ?>',
        position: 'topRight'
      });
    })();
  </script>
  <?php endif; unset($_SESSION["msgs"]); ?>
</body>

</html>