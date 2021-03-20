<?php
require '../clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['passed'])){
    $bname=clean(md5($_POST['old']));
    $anum=clean(md5($_POST['pass']));
    $accname=clean(md5($_POST['cpass']));
    
    $user = clean($_SESSION["admin"]);
    $crop = $conn->query("SELECT * FROM dlogin WHERE userid='$user'");
    if($crop->num_rows>0){

    if($anum == $accname){
    $check = $conn->query("SELECT userid, dpass FROM `dlogin` WHERE dpass='$bname' AND userid='$user'");
    if($check->num_rows>0){
    $up=$conn->query("UPDATE `dstaff` SET dpass='$anum' WHERE userid='$user' ");
    if($up){
    $_SESSION['msgs']="Password changed successfully";
    header("location: auth-change-password"); 
    }else{
    $_SESSION['msg']="Failed!..try again later";
    header("location: auth-change-password");
    }
    }else{
        $_SESSION['msg']="Old Password is incorrect";
        header("location: auth-change-password");
    }

}else{
    $_SESSION['msg']="Password do not match!..try again later";
    header("location: auth-change-password");
}
    }else{

        if($anum == $accname){
            $check = $conn->query("SELECT userid, dpass FROM `dlogin` WHERE dpass='$bname' AND userid='$user'");
            if($check->num_rows>0){
            $up=$conn->query("UPDATE `dstaff` SET dpass='$anum' WHERE userid='$user' ");
            if($up){
            $_SESSION['msgs']="Password changed successfully";
            header("location: auth-change-password"); 
            }else{
            $_SESSION['msg']="Failed!..try again later";
            header("location: auth-change-password");
            }
            }else{
                $_SESSION['msg']="Old Password is incorrect";
                header("location: auth-change-password");
            }
        
        }else{
            $_SESSION['msg']="Password do not match!..try again later";
            header("location: auth-change-password");
        }


    }
}




}







?>