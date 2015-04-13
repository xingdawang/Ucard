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
        
        // Check whether email has been registered
        $sql = "SELECT * FROM $tbl_name WHERE third_party_uid = '$thirdPartyUid' AND register_type = '$registerType'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        $rowNumber0 = mysql_num_rows($result);
        $tempEmail = $row['email'];
        $tempNickname = $row['user_nickname'];
        //echo $tempEmail;
        //echo $tempNickname;
        
        $sql1 = "SELECT * FROM $tbl_name WHERE email = '$tempEmail'";
        $tempResult = mysql_query($sql1);
        $rowNumber = mysql_num_rows($tempResult);
        
        $sql2 = "SELECT * FROM $tbl_name WHERE user_nickname = '$nickname'";
        $tempResult = mysql_query($sql2);
        $rowNumber2 = mysql_num_rows($tempResult);
        
        //echo $rowNumber;
        //echo $rowNumber2;
        if($rowNumber0 == 1){
            $json_code = 20;
            $json_message = "Third party registration failed, ID of this type has already registered";
        }elseif($rowNumber > 1) {
            $json_code = 17;
            $json_message = "Third party registration failed, email has registered";
        }elseif($rowNumber2 == 1){
            $json_code = 19;
            $json_message = "Third party registration failed, nickname has registered";
        }else {
            
            $uuid = uniqid();
            $sql = "INSERT INTO $tbl_name (uuid, user_nickname, register_type, third_party_uid) VALUES ('$uuid', '$nickname', '$registerType', '$thirdPartyUid');";
            $result = mysql_query($sql);
            mysql_close();
            
            $json_code = 1000;
            $json_message = "Third party registration complete";   
        }
    }
    $array = Array('code'=>$json_code, 'message'=>$json_message);
    die(json_encode($array));
?>