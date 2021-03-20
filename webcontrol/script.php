<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
  <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
  <script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/echart/echarts.js"></script>
  
  <script src="assets/bundles/chartjs/chart.min.js"></script>
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <script src="assets/js/page/lion.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/sea.js"></script>
  <script src="assets/bundles/jquery.sparkline.min.js"></script>

  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
  <!-- Template JS File -->
  
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