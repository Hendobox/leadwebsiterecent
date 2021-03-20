<?php
include '../clean.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['login'])){
        $email = clean($_POST['email']);
        $pass = clean($_POST['pass']);
        loginUsers($email, $pass);
    }
}