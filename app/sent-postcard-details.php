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
    $tbl_name1 = "record";
    $tbl_name2 = "postcard";
    $sql = "SELECT * FROM $tbl_name2 LEFT JOIN $tbl_name1 ON $tbl_name1.postcard_uid = $tbl_name2.postcard_uid
    WHERE $tbl_name2.postcard_uid = '$postcard_uid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    
    if($number == 1) {
        
        // Check postcard state
        $json_data['sender_id'] = $row[1];
        $json_data['postcard_head'] = $row['postcard_head'];
        $json_data['postcard_back'] = $row['postcard_back'];
        $json_data['postcard_greeting'] = $row['postcard_greeting'];
        $json_data['receiver_house_number'] = $row['receiver_house_number'];
        $json_data['sending_state'] = $row['sending_state'];
        $json_data['receiver_street'] = $row['receiver_street'];
        $json_data['receiver_city'] = $row['receiver_city'];
        $json_data['receiver_county'] = $row['receiver_county'];
        $json_data['receiver_postcode'] = $row['receiver_postcode'];
        $json_data['receiver_country'] = $row['receiver_country'];
        $json_data['postcard_making_time'] = $row['postcard_making_time'];
        $json_data['postcard_location'] = $row['postcard_location'];
        
        $json_code = 1000;
        $json_message = "Fetch postcard information succeed";

    }else {
        $json_code = 34;
        $json_message = "Postcard is not exist";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>