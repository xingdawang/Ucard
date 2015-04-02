<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  User signup
     */
    
    // username and password sent from form
    $uuid=uniqid();
    $password=$_POST['password'];
    $email=$_POST['email'];
    $nickname=$_POST['nickname'];

    // To protect MySQL injection (more detail about MySQL injection)
    $password = stripslashes($password);
    $email = stripslashes($email);
    $nickname = stripcslashes($nickname);

    // Encrypt password
    $password = md5(md5($password));
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    mysql_select_db("$db_name")or die("cannot select DB");
    
    // Check email
    $sql = "select * from $tbl_name where email='$email'";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    if($rowNumber != 0) {
        echo "Email has been registered"."<br>";
        echo '<meta content="3;/signup-rename.php" http-equiv="Refresh" />';
    }
    // Check nickname
    $sql = "select * from $tbl_name where user_nickname='$nickname'";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    if($rowNumber != 0) {
        echo "Nick name has been registered"."<br>";
        echo '<meta content="3;/signup-rename.php" http-equiv="Refresh" />';
    }
    else {
        $sql = "INSERT INTO $tbl_name (uuid, email, password, user_nickname) VALUES ('$uuid', '$email', '$password', '$nickname')";
        $retreve = mysql_query("$sql");
        echo "Register complete!";
        
        // Send user "register succeeed"
        $subject = "Ucard Registration Successful";
        $body = "Ucard account registration successful";
        include"send-email.php";
        sendEmail($email, $subject, $body);
        header('Location: http://www.baidu.com');
    }
    mysql_close();
?>