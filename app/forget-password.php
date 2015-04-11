<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  User login
     */
    
    // Show user the link that can reset password
    // Post method
    //$email=$_POST['email'];
    // Get method
    $email = $_GET(email);
    
    //Setup session to temporary store user email
    $_SESSION['temp_email'] = $email;
    
    // Send user Email
    include "send-email.php";
    $subject = "Ucard Find Password";
    $body = "Use the link below to find password:"."<br> <br>". "10.211.55.5/reset-password-rename.php";
    sendEmail($email, $subject, $body);
    
    header('Location: signin-rename.php');
    
?>