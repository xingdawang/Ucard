<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Add more personal details
     */
    
    $json_code = "";
    $json_message = "";
    $json_data = "";
    
    
    // Get data from the form
    // Post method
    $uuid = $_POST['uuid'];
    $email = $_POST['email'];
    
    // Connect to database
    include "connectDB.php";
  
    // find current user uuid to store photo snail icon
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number == 1){
        
        //Deal with email
        include "connectDB.php";
        $row = mysql_fetch_array($result);
        $tbl_name="userinfo"; // Table name
        $sql = "SELECT * FROM $tbl_name WHERE email = '$email'";
        $result = mysql_query($sql);
        $email_number = mysql_num_rows($result);
        if ($email !="" && $row['email'] == "" && $email_number == 0) {
            writeToDatabase("email", $email, $uuid);
            $json_code = 1000;
            $json_message = "Email update succeed";
        } else {
            $json_code = 56;
            $json_message = "Email updated failed, duplicated email address";
        }
        
    }else {
        $json_code = 55;
        $json_message = "User id is not found";
    }
    
    mysql_close();

    function writeToDatabase($databaseItem,$varable, $uuid) {
        include "connectDB.php";
        $tbl_name="userinfo"; // Table name
        $sql = "UPDATE $tbl_name SET $databaseItem = '$varable' WHERE uuid = '$uuid'";
        mysql_query($sql);
        mysql_close();
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message );
    die(json_encode($array));

?><?php

?>