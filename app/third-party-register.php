<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Third party registration
     */
    
    $thirdPartyUid = $_POST['thirdPartyUid'];
    $registerType = $_POST['registerType'];
    $nickname = $_POST['nickname'];
    
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
        
        // Check whether email has been registered
        $sql = "SELECT * FROM $tbl_name WHERE third_party_uid = '$thirdPartyUid' AND register_type = '$registerType'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        $rowNumber0 = mysql_num_rows($result);
        $tempEmail = $row['email'];
 
        if($rowNumber0 == 1){
            $json_code = 20;
            $json_message = "Third party registration failed, ID of this type has already registered";
        }elseif($tempEmail != "") {
            $json_code = 17;
            $json_message = "Third party registration failed, email has registered";
        }else {
            
            $uuid = uniqid();
            $sql = "INSERT INTO $tbl_name (uuid, user_nickname, register_type, third_party_uid) VALUES ('$uuid', '$nickname', '$registerType', '$thirdPartyUid');";
            $result = mysql_query($sql);
            mysql_close();
            
            $json_code = 1000;
            $json_data = $uuid;
            $json_message = "Third party registration complete";   
        }
    }
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>