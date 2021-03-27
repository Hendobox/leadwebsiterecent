<?php
// session_start();

// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     $name = htmlentities($_POST['name']);
//     $email = htmlentities($_POST['email']);
//     $message = htmlentities($_POST['message']);
//     $code = htmlentities($_POST['code']);
//     $hide = htmlentities($_POST['hide']);
//     $subject = "Message From Lead Website";

//     // if($hide ==$code){
        
//         $to = "contact@leadwallet.io";
//         $head = "Good day! my name is $name and my email is $email. \n";
//         $head .= $message;

//     if(!empty($_POST['g-recaptcha-response'])) {
//           $secret = '6Lf1b3caAAAAAEbJrXO2j1Sl4KTsDRsojRzRfzqx';
//           $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
//           $responseData = json_decode($verifyResponse);
//           if($responseData->success){             
//             mail($to, $subject, $head);
//             $_SESSION['sms']="<p class='text-success'> <b>Congratulations!</b>  Message received, We will get back to you soon.</p>";
        
//           }else{
//           $_SESSION['sms']="<p class='text-success'> <b>Sorry!</b> Anti-spam code do not match.</p>";
//           }
//      }


    
//     header("Location: contact#live");
// }


session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);
    $code = htmlentities($_POST['code']);
    $hide = htmlentities($_POST['hide']);
    $subject = "Message From Lead Website";

    if($hide ==$code){
        $to = "contact@leadwallet.io";
        $head = "Good day! my name is $name and my email is $email. \n";
        $head .= $message;
        mail($to, $subject, $head);
            $_SESSION['sms']="<p class='text-success'> <b>Congratulations!</b>  Message received, We will get back to you soon.</p>";
        
    }else{
        $_SESSION['sms']="<p class='text-success'> <b>Sorry!</b> Anti-spam code do not match.</p>";
    }



    
    header("Location: contact#live");
}