

<?php include 'head.php' ?>


<body class="background-image-body">
  <!-- <div class="loader"></div> -->
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- <div class="login-brand login-brand-color">
            	<img alt="image" src="assets/img/logo.png" />
              Grexsan
            </div> -->
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Forgot Password</h4>
              </div>
              <!-- <center>
              <div class="logo-auth">
              	<img alt="image" src="assets/img/logo.png" />
          	  </div>
          	  <div>
          	  	<span class="logo-name-auth">Grexsan</span>
          	  </div>
          	  </center> -->
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block btn-auth-color" tabindex="4">
                      Forgot Password
                    </button>
                  </div>
                </form>
                <div class="mt-5 text-muted text-center">
                  Don't have an account? <a href="register">Create One</a>
                </div>
              </div>
            </div>
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
  
</body>


<!-- Mirrored from radixtouch.in/templates/snkthemes/grexsan/source/light/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jul 2020 13:54:43 GMT -->
</html>