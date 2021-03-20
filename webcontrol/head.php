
<?php
require '../clean.php';

$base = basename($_SERVER['REQUEST_URI']);
// findBaseName($base);
if($base !='login'){
  if(!isset($_SESSION["admin"])){
    header("Location:login");
  }
}


if(isset($_SESSION["admin"]) AND $_SESSION['admin']==true){
    $user = clean($_SESSION["userid"]);
    $crop = runQuery("SELECT * FROM admin WHERE userid='$user'")->fetch_assoc();
}
//include 'privilege.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo ucwords("Leadwallet"); ?> - Admin Dashboard </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/bundles/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <!-- Custom style CSS -->
  <link rel="icon" href="../img/lead/lead-icon.jpg">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

  <style>
    .work table, .work table td, .work table th{
      border:1px solid grey;
    }
  </style>

</head>
