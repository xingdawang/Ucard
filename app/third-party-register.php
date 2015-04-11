<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Third party registration
     */
    
    $thirdPartyUid = $_GET['thirdPartyUid'];
    $registerType = $_GET['registerType'];
    $nickname = $_GET['nickname'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    
    if($nickname == ""){
        $json_code = 11;
        $json_message = "Third party registration failed, nickname is empty";
    }elseif($registerType == ""){
        $json_code = 12;
        $json_message = "Third party registration failed, register type is empty";
    }elseif($thirdPartyUid == ""){
        $json_code = 13;
        $json_message = "Third party registration failed, thirdparty uid is empty";
    }else {
        
        // Connect to server and select databse.
        include"connectDB.php";
        $tbl_name="userinfo"; // Table name
        
        $uuid = uniqid();
        $sql = "INSERT INTO $tbl_name (uuid, user_nickname, register_type, third_party_uid) VALUES ('$uuid', '$nickname', '$registerType', '$thirdPartyUid');";
        $result = mysql_query($sql);
        mysql_close();
        
        $json_code = 1000;
        $json_message = "Third party registration complete";
    }
    $array = Array('code'=>$json_code, 'message'=>$json_message);
    die(json_encode($array));
?>