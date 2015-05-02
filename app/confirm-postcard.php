<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 2nd May 2015
     *  Generate a record
     */
    
    $uuid = $_GET['uuid'];
    $postcard_confirm_code = $_GET['postcardConfirmCode'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Update sharing state in record table
    include"connectDB.php";
    $tbl_name = "record";
    $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_confirm_code'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    if($number == 1){
        $tbl_name = "record";
        $sql = "UPDATE $tbl_name SET sharing_state = 2 WHERE postcard_uid = '$postcard_confirm_code'";
        $result = mysql_query($sql);
        
        // Generate friend record
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_confirm_code'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        $postcard_sender = $row['uuid'];
        // If the sender and receiver is the same person, do not generate friend record
        if($uuid == $postcard_sender) {
            $json_code = 27;
            $json_data = 'Not generate friend record, sender and receiver is the same person';
            $json_message = '';
        } else {
            $tbl_name = "friend";
            $sql = "INSERT INTO $tbl_name (friend_uid, postcard_friend_uid) VALUES ('$uuid', '$postcard_sender')";
            mysql_query($sql);
            $sql = "INSERT INTO $tbl_name (postcard_friend_uid, friend_uid) VALUES ('$uuid', '$postcard_sender')";
            mysql_query($sql);
            $json_code = 1000;
            $json_data = 'Record generate success';
            $json_message = '';
        }
    }else {
        $json_code = 26;
        $json_data = 'postcard confirm code not match';
        $json_message = '';
    }
    
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    
?>