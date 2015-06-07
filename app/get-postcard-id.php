<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 1st Jun 2015
     *  Return empty postcard id
     */
    
    $postcard_uid = uniqid();
    $uuid = $_POST['uuid'];
    // Connect to database
    include "connectDB.php";
    $tbl_name = "postcard";
    $sql = "INSERT INTO $tbl_name (postcard_uid, uuid) VALUES ('$postcard_uid', '$uuid')";
    mysql_query($sql);
    mysql_close();
    $json_code = 1000;
    $json_message = 'Empty postcard generated';
    $json_data = $postcard_uid;
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>