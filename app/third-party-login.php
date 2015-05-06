<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Third party login
     */
    
    $thirdPartyUid = $_POST['thirdPartyUid'];
    $registerType = $_POST['registerType'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    
    $sql = "SELECT * FROM $tbl_name WHERE register_type = '$registerType' AND third_party_uid = '$thirdPartyUid' AND register_type != '' AND third_party_uid != ''";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    
    if($rowNumber == 0){
        $json_code = 14;
        $json_message = "Third party login failded.";
    } else {
        $row = mysql_fetch_array($result);
        $json_code = 1000;
        $json_message = "Third party login succeed";
        $json_data = $row['uuid'];
    }
    mysql_close();
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>