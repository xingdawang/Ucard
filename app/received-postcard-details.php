<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 4th May 2015
     */
    
    $postcard_uid = $_POST['postcardID'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="record"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number == 1) {
        
        // Check postcard state
        $row = mysql_fetch_array($result);
        $postcard_sending_state = $row['sending_state'];
        if( $postcard_sending_state == 2) {
            
            //get this postcard details
            $tbl_name = "postcard";
            $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
            $json_data['sender_id'] = $row['uuid'];
            $json_data['postcard_head'] = $row['postcard_head'];
            $json_data['postcard_back'] = $row['postcard_back'];
            $json_data['postcard_greeting'] = $row['postcard_greeting'];
            $json_data['receiver_house_number'] = $row['receiver_house_number'];
            $json_data['receiver_street'] = $row['receiver_street'];
            $json_data['receiver_city'] = $row['receiver_city'];
            $json_data['receiver_county'] = $row['receiver_county'];
            $json_data['receiver_postcode'] = $row['receiver_postcode'];
            $json_data['receiver_country'] = $row['receiver_country'];
            $json_data['postcard_making_time'] = $row['postcard_making_time'];
            $json_data['postcard_location'] = $row['postcard_location'];
            
            // get sharing state in the record table
            $tbl_name = "record";
            $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
            $result_record = mysql_query($sql);
            $row_record = mysql_fetch_array($result_record);
            $json_data['sharing_state'] = $row_record['sharing_state'];
            $json_data['original_country'] = $row_record['original_country'];
            $uuid = $row_record['uuid'];
            
            // get user nickname and photo
            $tbl_name = "userinfo";
            $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
            $result_userinfo = mysql_query($sql);
            $row_userinfo = mysql_fetch_array($result_userinfo);
            $json_data['user_nickname'] = $row_userinfo['user_nickname'];
            $json_data['user_icon'] = $row_userinfo['user_icon'];
            
            $json_code = 1000;
            $json_message = "Fetch postcard information succeed";
        } else {
            $json_code = 37;
            $json_message = "Postcard status is not 2(received)";
        }
    }else {
        $json_code = 36;
        $json_message = "Postcard id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>