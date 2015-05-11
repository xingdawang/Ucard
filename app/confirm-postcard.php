<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 2nd May 2015
     *  Generate a record
     */
    
    $uuid = $_POST['uuid'];
    $postcard_confirm_code = $_POST['postcardConfirmCode'];
    
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
        
        // Changing sending state
        $tbl_name = "record";
        $sql = "UPDATE $tbl_name SET sending_state = 2 WHERE postcard_uid = '$postcard_confirm_code'";
        $result = mysql_query($sql);
        
        // Get postcard sender id
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_confirm_code'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        $postcard_sender = $row['uuid'];
        
        // Generate receiving record in the receiver table
        $tbl_name = "receiver";
        $sql = "INSERT INTO $tbl_name (uuid, postcard_uid) VALUES('$uuid', '$postcard_confirm_code')";
        mysql_query($sql);
        
        // If the sender and receiver is the same person, do not generate friend record
        if($uuid == $postcard_sender) {
            $json_code = 27;
            $json_data = '';
            $json_message = 'Sending state changed, receiver record generated, not generate friend record, sender and receiver is the same person';
        } else {
            
            // Check wheter friend record exist
            $tbl_name = "friend";
            $sql = "SELECT * FROM $tbl_name WHERE friend_uid = '$uuid' AND postcard_friend_uid = '$postcard_sender'";
            $result = mysql_query($sql);
            $number = mysql_num_rows($result);
            if($number == 0){
                $sql = "INSERT INTO $tbl_name (friend_uid, postcard_friend_uid) VALUES ('$uuid', '$postcard_sender')";
                mysql_query($sql);
                $sql = "INSERT INTO $tbl_name (postcard_friend_uid, friend_uid) VALUES ('$uuid', '$postcard_sender')";
                mysql_query($sql);
                $json_code = 1000;
                $json_data = '';
                $json_message = 'Sending state changed, receiver record generated, friend record generation succeed';
            } else {
                $json_code = 1000;
                $json_data = '';
                $json_message = 'Sending state changed, receiver record generated, friend generation failed, friend record has exist'; 
            }
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