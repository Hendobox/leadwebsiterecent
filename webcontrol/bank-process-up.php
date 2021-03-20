<?php
// require '../clean.php';
require '../clean.php';


if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST["save"])){
        

        $bank = clean($_POST["bank"]);
        $bid =  clean($_POST["id"]);
        
        $up = $conn->query("UPDATE dbank SET dname='$bank' WHERE bid='$bid'");
        if($up){
            $_SESSION['msgs']="Updated successfully";
        }else{
            $_SESSION['msg']="Oops! try again";
        }
        header("Location: banks");
        }
        
    }
