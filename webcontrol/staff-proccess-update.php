<?php
// session_start();
require '../clean.php';

        
if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['log'])){

    $user=clean($_POST['user']);
    $email=clean($_POST['email']);
    $userid = clean($_POST['id']);
    
    $query=runQuery("UPDATE `admin` SET  dname='$user', demail='$email' WHERE userid='$userid' ");
    if($query){         
        $_SESSION['msgs']="Updated successfully";
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