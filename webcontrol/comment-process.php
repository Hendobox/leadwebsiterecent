
<?php
// require '../clean.php';
require '../clean.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["save"])){
            $id = clean($_POST['id']);
            $text = clean($_POST['text']);

            $sql =$conn->query("UPDATE `dcomment` SET dcomment='$text' WHERE cid='$id' ");
            if($sql){
                $_SESSION['msgs']="Updated successfully!";
            }else{
                $_SESSION["msg"] = "Oops!, try again later";
            }
            header("Location: comments");
        }
    }

