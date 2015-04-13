<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Check third party uid and type status
     */
    
    $thirdPartyUid = $_GET['thirdPartyUid'];
    $registerType = $_GET['registerType'];
    //echo $registerType;
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    if($thirdPartyUid == ""){
        $json_code = 15;
        $json_message = "Third party uid is empty";
    } elseif($registerType == "") {
        $json_code = 16;
        $json_message = "Registration type is empty";
    } else {
        // Connect to server and select databse.
        include"connectDB.php";
        $tbl_name="userinfo"; // Table name
        
        $sql = "SELECT * FROM $tbl_name WHERE register_type = '$registerType' AND third_party_uid = '$thirdPartyUid' AND register_type != '' AND third_party_uid != ''";
        $result = mysql_query($sql);
        $rowNumber = mysql_num_rows($result);
        mysql_close();
        if($rowNumber == 1){
            $json_code = 10;
            $json_message = "User have already registered";
        } else {
            $json_code = 1000;
            $json_message = "User can use this uid";
        }
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message);
    die(json_encode($array));
?>