
<?php
// require '../clean.php';
require '../clean.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["save"])){
            $id = clean($_POST['id']);
            $name = clean($_POST['name']);
            $web = clean($_POST['web']);
            $email = clean($_POST['email']);
            $phone = clean($_POST['phone']);
            $address = clean($_POST['address']);

            $sql =$conn->query("UPDATE `dsetting` SET dname='$name', dweb_name='$web', demail='$email', dphone='$phone', daddress='$address' WHERE id='$id' ");
            if($sql){
                $_SESSION['msgs']="Updated successfully!";
            }else{
                $_SESSION["msg"] = "Oops!, try again later";
            }
            header("Location: web-settings");
        }
    }

