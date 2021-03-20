<?php

require '../clean.php';

$search = clean($_POST['search']);
if(isset($_POST['depo'])){
    header("Location: depositors?search=$search");
}elseif(isset($_POST['depoh'])){
    header("Location: depositors-history?search=$search");
}elseif(isset($_POST['with'])){
    header("Location: withdrawals?search=$search");

}elseif(isset($_POST['withh'])){
    header("Location: withdrawals-history?search=$search");

}elseif(isset($_POST['pen'])){
    header("Location: pending-transactions?search=$search");

}elseif(isset($_POST['con'])){
    header("Location: pending-confirmations?search=$search");

}elseif(isset($_POST['can'])){
    header("Location: cancelled-transactions?search=$search");

}elseif(isset($_POST['firm'])){
    header("Location: confirmed-transactions?search=$search");

}elseif(isset($_POST['user'])){
    header("Location: users?search=$search");

}elseif(isset($_POST['block'])){
    header("Location: blocked?search=$search");

}elseif(isset($_POST['ban'])){
    header("Location: banned?search=$search");

}elseif(isset($_POST['active'])){
    header("Location: activate-users?search=$search");

}elseif(isset($_POST['ractive'])){
    header("Location: pending-reactivations?search=$search");

}elseif(isset($_POST['merge'])){
    header("Location: merge-to-depositor?search=$search");

}elseif(isset($_POST['dwith'])){
    header("Location: depositor-to-withdrawal?search=$search");

}elseif(isset($_POST['report'])){
    header("Location: reports?search=$search");

}elseif(isset($_POST['test'])){
    header("Location: testimonies?search=$search");

}elseif(isset($_POST['comment'])){
    header("Location: comments?search=$search");

}