<?php
// require '../clean.php';
require '../clean.php';


//Ban users
if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="Ban"){
    // echo "yes";
    $userid = clean($_POST['id']);
    runQuery("UPDATE admin SET dstatus='inactive' WHERE userid='$userid' ");
}

//unBan users
if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="unBan"){
    // echo "yes";
    $userid = clean($_POST['id']);
    runQuery("UPDATE admin SET dstatus='active' WHERE userid='$userid' ");
}

//block users
if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="Blocked"){
    $userid = clean($_POST['id']);
    runQuery("UPDATE admin SET dstatus='blocked' WHERE userid='$userid' ");
}

//unblock users
if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="Unblock"){
    $userid = clean($_POST['id']);
    runQuery("UPDATE admin SET dstatus='active' WHERE userid='$userid' ");
}


//unblock users
if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="depDelete"){
    $userid = clean($_POST['id']);
    runQuery("DELETE FROM admin WHERE userid='$userid' ");
}

if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="approveTest"){
    $cid = clean($_POST['id']);
    runQuery("UPDATE dcomment SET  dstatus='active' WHERE cid='$cid' ");
}

if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="approveDel"){
    $cid = clean($_POST['id']);
    runQuery("DELETE FROM dcomment WHERE cid='$cid' ");
}

if(isset($_POST["dataPost"]) AND $_POST["dataPost"]=="bankDel"){
    $cid = clean($_POST['id']);
    $img = clean($_POST['img']);
    runQuery("DELETE FROM dblog WHERE bid='$cid' ");
    runQuery("DELETE FROM dcomment WHERE pid='$cid' ");
    @unlink("../cover/$img.jpg");
}

