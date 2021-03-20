
<?php
// require '../clean.php';
require '../clean.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["save"])){
            $id = clean($_POST['id']);
            $min = clean($_POST['min']);
            $max = clean($_POST['max']);
            $day = clean($_POST['day']);
            $olduser = clean($_POST['old']);
            $hours = clean($_POST['hours']);
            $per = clean($_POST['percent']);
            $upg = clean($_POST['upgrade']);
            $open = clean($_POST['open']);
            $with_bonus = clean($_POST['with_bonus']);

            $sql =$conn->query("UPDATE `dpercentage` SET dpercent='$per', dmin='$min', dmax='$max', dday='$day', olduser='$olduser', dhours='$hours', dupgrade_time='$upg', with_bonus='$with_bonus', reopen_fee='$open' WHERE id='$id' ");
            if($sql){
                $_SESSION['msgs']="Updated successfully!";
            }else{
                $_SESSION["msg"] = "Oops!, try again later";
            }
            header("Location: settings_web");
        }
    }

