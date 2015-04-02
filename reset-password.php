<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Reset password
     */
    
    // Email and password send from form
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // To protect MySQL injection (more detail about MySQL injection)
    $email = stripslashes($email);
    $password = stripslashes($password);
    
    // Encrypt password
    $password = md5(md5($password));
    
    // Connect database
    include "connectDB.php";
    
    // Check email
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE email = '$email'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) != 1) {
        echo "Email not exist";
	echo '<meta content="3;/reset-password-rename.php" http-equiv="Refresh" />';
    }
    else {
        while($row = mysql_fetch_array($result)) {
            
            // Update password
            $sql = "UPDATE $tbl_name SET password = '$password' WHERE email = '$email'";
            mysql_query($sql);
                
            // Send user email and announce the operation is succeeed.
            include "send-email.php";
            $subject = "Password has changed";
            $body = "Password changed.";
            sendEmail($email, $subject, $body);
            
	    // Redirect to Story page
	    header('Location: http://www.baidu.com');

        }
    }
    mysql_close();
?>