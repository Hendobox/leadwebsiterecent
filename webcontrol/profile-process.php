<?php
// session_start();
require '../clean.php';

        
if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['log'])){

    $user=clean($_POST['user']);
    $email=clean($_POST['email']);
    $userid = clean($_SESSION["userid"]);

    $sql = $conn->query("UPDATE admin SET  dname='$user', demail='$email' WHERE userid='$userid'");
    if($sql){
        $_SESSION['msgs']="Updated Successfully";
        header("Location: profile");
    }else{
        $_SESSION['msg']="Oops! Try again later";
        header("Location: profile");
    }

}

endif;