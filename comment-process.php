<?php

include 'clean.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['post'])){
        $name = clean($_POST['name']);
        $comment = $conn->real_escape_string($_POST['desc']);
        $bid = clean($_POST['pid']);
        $cid = date("Ymdhis");

        $sql = runQuery("INSERT INTO dcomment SET cid='$cid', pid='$bid', dname='$name', dcomment='$comment' ");
        if($sql){
            $_SESSION['sms']="<p class='text-success'> <b>Congratulations!</b>  Comment post successfully.</p>";
        
        }else{
            $_SESSION['sms']="<p class='text-success'> <b>Sorry!</b> try again later.</p>";
        }
        header("Location:read-post?pid=$bid#comment");
    }
}