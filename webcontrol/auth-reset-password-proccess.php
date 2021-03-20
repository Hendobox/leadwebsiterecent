<?php
require '../clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['passed'])){
    $bname=clean(md5($_POST['old']));
    $anum=clean(md5($_POST['pass']));
    $accname=clean(md5($_POST['cpass']));
    
    $hide=clean($_SESSION['userid']);

    if($anum == $accname){

    $check = $conn->query("SELECT userid, dpass FROM `admin` WHERE dpass='$bname' AND userid='$hide'");
    if($check->num_rows>0){
    $up=$conn->query("UPDATE `admin` SET dpass='$anum' WHERE userid='$hide' ");
        if($up){
        $_SESSION['msgs']="Password changed successfully";
        header("location: auth-reset-password"); 
        }else{
        $_SESSION['msg']="Failed!..try again later";
        header("location: auth-reset-password");
        }
    }else{
        $_SESSION['msg']="Old Password is incorrect";
        header("location: auth-reset-password");
    }




}else{
    $_SESSION['msg']="Password do not match!..try again later";
    header("location: auth-reset-password");
}
}




}







?>