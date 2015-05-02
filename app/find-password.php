<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  After third party register, if user does not have the nickname, add one
     */
    
    $user_email = $_GET['email'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    
    $sql = "SELECT * FROM $tbl_name WHERE email = '$user_email'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $email = $row['email'];
    mysql_close();
    
    if($email == "") {
        $json_code = 18;
        $json_message = 'User does not add email'; 
    }else {
        //Send email to the user
        require "send-email.php";
        $emailTopic = "Find Password";
        /*********************************************************
        *UPDATE URL
        *********************************************************/
        $emailContent = "Hi click this link to change the password: http://212.111.43.104/app/new-password-test.html";
        sendEmail($email, $emailTopic, $emailContent);
        //echo "email has send";
        $json_code = 1000;
        $json_message = 'Find password email has send';
    }
    $array = Array('code'=>$json_code, 'message'=>$json_message);
    die(json_encode($array));
    
?>