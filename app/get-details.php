<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Get personal details
     */
    
    // Use for transfering json data
    $json_code = '';
    $json_message = '';
    $json_data = '';

    
    // Read all personal information
    include "connectDB.php";
    $tbl_name = "userinfo";
    $uuid = $_POST['uuid'];
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    if($rowNumber == 0) {
        $json_code = '9';
        $json_message = 'Cannot get user details, user not found';
	$json_data['nickname'] = '';
	$json_data['photo'] = '';
        $json_data['first_name'] = '';
        $json_data['middle_name'] = '';
        $json_data['last_name'] = '';
        $json_data['email'] = '';
        $json_data['house_number'] = '';
        $json_data['street'] = '';
        $json_data['city'] = '';
        $json_data['county'] = '';
        $json_data['postcode'] = '';
        $json_data['register_type'] = '';
        $json_data['third_party_uid'] = '';
        $json_data['date_of_birth'] = '';
        $json_data['sex'] = '';
        $json_data['country'] = '';
    }
    $row = mysql_fetch_array($result);
    mysql_close();
    
    
    if($json_code != 9) {
        $json_code = '1000';
        $json_message = 'Get personal info succeed';
	$json_data['nickname'] = $row['user_nickname'];
	$json_data['photo'] = $row['user_icon'];
        $json_data['first_name'] = $row['first_name'];
        $json_data['middle_name'] = $row['middle_name'];
        $json_data['last_name'] = $row['last_name'];
        $json_data['email'] = $row['email'];
        $json_data['house_number'] = $row['house_number'];
        $json_data['street'] = $row['street'];
        $json_data['city'] = $row['city'];
        $json_data['county'] = $row['county'];
        $json_data['postcode'] = $row['postcode'];
        $json_data['register_type'] = $row['register_type'];
        $json_data['third_party_uid'] = $row['third_party_uid'];
        $json_data['date_of_birth'] = $row['date_of_birth'];
        $json_data['sex'] = $row['sex'];
        $json_data['country'] = $row['country'];
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>