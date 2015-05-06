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
        if( $postcard_sending_state == 1 || $postcard_sending_state == 2) {
            
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
            
            $json_code = 1000;
            $json_message = "Fetch postcard information succeed";
        } else {
            $json_code = 35;
            $json_message = "Postcard status is not 1(sent)";
        }
    }else {
        $json_code = 34;
        $json_message = "Postcard id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>