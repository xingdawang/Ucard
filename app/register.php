<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  User signup
     */
    
    // username and password sent from form
    $uuid=uniqid();
    // Post Method
    //$password=$_POST['password'];
    //$email=$_POST['email'];
    //$nickname=$_POST['nickname'];
    // Get Method
    $password=$_GET['password'];
    $email=$_GET['email'];
    $nickname=$_GET['nickname'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';

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
        $json_code = 1;
        $json_message = 'Email has been registered';
    }
    // Check nickname
    $sql = "select * from $tbl_name where user_nickname='$nickname'";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    if($rowNumber != 0) {
        $json_code = 2;
        $json_message = 'Nickname has been registered';
    }
    else {
        $sql = "INSERT INTO $tbl_name (uuid, email, password, user_nickname) VALUES ('$uuid', '$email', '$password', '$nickname')";
        $retreve = mysql_query("$sql");
        $json_code = 3;
        $json_message = 'Registration complete';
    }
    $array = Array('message'=>$json_message, 'code'=>$json_code, 'data'=>$json_data);
    die(json_encode($array));
    mysql_close();
?>