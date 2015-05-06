<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 3rd May 2015
     */
    
    $password = $_POST['password'];
    $uuid = $_POST['uuid'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    $password = md5(md5($password));
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);

    
    if($number == 1) {
        $sql = "UPDATE $tbl_name SET password = '$password' WHERE uuid = '$uuid'";
        $result = mysql_query($sql);
        $json_code = 1000;
        $json_message = "Password change succeed";
    }else {
        $json_code = 28;
        $json_message = "User id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>