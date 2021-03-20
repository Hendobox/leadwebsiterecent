
<?php
// require '../clean.php';
require '../clean.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["save"])){
            $id = clean($_POST['userid']);
            $acc_name = clean($_POST['name']);
            $bank = clean($_POST['bank']);
            $number = clean($_POST['number']);

            $sql =$conn->query("UPDATE `dlogin` SET dacc_name='$acc_name', dacc_number='$number', dbank='$bank' WHERE userid='$id' ");
            if($sql){
                $_SESSION['msgs']="Updated successfully!";
            }else{
                $_SESSION["msg"] = "Oops!, try again later";
            }
            header("Location: users");
        }
    }

