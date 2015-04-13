<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  After third party register, if user does not have the nickname, add one
     */
    
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $password = md5(md5($password));
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    
    $sql = "UPDATE $tbl_name SET password = '$password' WHERE email = '$email'";
    $result = mysql_query($sql);
    mysql_close();
    
    require"send-email.php";
    $emailTopic = "New password set";
    $emailContent="Operation succeed";
    sendEmail($email,$emailTopic,$emailContent);
?>