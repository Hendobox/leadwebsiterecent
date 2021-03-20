<?php
// require '../clean.php';
require '../clean.php';
include '../image_php/class.upload.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $title = clean($_POST["title"]);
        $desc = $_POST["desc"];
        $title = clean($_POST["title"]);
        $bid = date("ymdhis");
        $date = date("Y-m-d H:i:s");

    if(isset($_POST["save"])){  
        $by = clean($_POST["by"]);
        $up = $conn->query("INSERT INTO dblog SET dtitle='$title', ddesc='$desc', dby='Admin', dby1='$by', ddate='$date', bid='$bid'");
        if($up){
            insertImages($bid, $bid);
            $_SESSION['msgs']="Submited successfully";
        }else{
            $_SESSION['msg']="Oops! try again";
        }
        
        
    }elseif(isset($_POST["saves"])){ 
        $id = clean($_POST["id"]);
        $himg = clean($_POST["himg"]);
        $up = $conn->query("UPDATE dblog SET dtitle='$title', ddesc='$desc' where bid='$id'");
        if($up){
            if(!empty($_FILES['img']['name'])){ 
                insertImages($id, $id);
                @unlink("../cover/$himg.jpg");
            }
            $_SESSION['msgs']="Submited successfully";
        }else{
            $_SESSION['msg']="Oops! try again";
        }
        }


    }


    header("Location: blog");

    
function insertImages($transid, $rowId){
    GLOBAL $conn;
    @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
    if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
    $picid=$transid.'-1';
    $foo = new Upload($_FILES['img']);  
    include("../image_php/image_cover.php");     
    $conn->query("UPDATE dblog SET dimg='$picid' WHERE bid='$rowId'");
    }
    
}