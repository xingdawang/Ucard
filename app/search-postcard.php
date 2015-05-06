<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 5th May 2015
     */
    
    $postcard_uid = $_POST['postcardID'];
    $uuid = $_POST['uuid'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="postcard"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number == 1) {
        
        // If this postcard is not confirmed received, return postcard details
        $tbl_name = "record";
        $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid' AND postcard_uid = '$postcard_uid' AND sending_state = 2";
        $result = mysql_query($sql);
        $number = mysql_num_rows($result);
        
        if($number == 1) {
        
            //fetch this postcard details
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
            
             // Get sender photo image and nickname in userinfo table
            $tbl_name = "userinfo";
            $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
            $result_userinfo = mysql_query($sql);
            $row_receiver = mysql_fetch_array($result_userinfo);
            $json_data['receiver_image'] = $row_receiver['user_icon'];
            $json_data['receiver_nickname'] = $row_receiver['user_nickname'];
            
            $json_code = 1000;
            $json_message = "Fetch postcard information succeed"; 
        } else {
            $json_code = 38;
            $json_message = "This user has already confirmed this postcard";
        }
    
    }else {
        $json_code = 38;
        $json_message = "Postcard id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>