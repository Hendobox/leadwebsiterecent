<?php
// session_start();
require '../clean.php';

        
if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['log'])){

    $user=clean($_POST['user']);
    $email=clean($_POST['email']);
    $pass=md5(clean($_POST['pass']));

    $userid = gmdate("ymdhis").rand(1000,10000);
    $date=gmdate('Y-m-d h:i:s');
    $query=$conn->query(" INSERT INTO `admin` SET userid='$userid', dname='$user', demail='$email', dpass='$pass'");
    if($query){         
        $_SESSION['msgs']="Staff created successfully";
        header("location: staffs"); 
    }else{
      $_SESSION['msg']="Oops! try again later...";
      header("location: staffs");
    }
}else{
    header("Location:dashboard");
}

endif;

?>