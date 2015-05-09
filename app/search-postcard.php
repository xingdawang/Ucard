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
    
    // Check whether ths postcard is exist
    if($number == 1) {
        
        // Check whether there is a record on this postcard id
        $tbl_name = "record";
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result = mysql_query($sql);
        $number = mysql_num_rows($result);
        
        if($number !== 0) {
            
            // Check whether this postcard is paid
            $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid' AND payment_state = 1";
            $result = mysql_query($sql);
            $number= mysql_num_rows($result);

            if($number == 1){
                
                // Check whether this postcard is confirmed by others
                $tbl_name = "receiver";
                $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid' AND uuid = '$uuid'";
                $result = mysql_query($sql);
                $number = mysql_num_rows($result);
                
                if($number == 0){
                    
                    // Check user validation
                    $tbl_name = "userinfo";
                    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
                    $result = mysql_query($sql);
                    $number = mysql_num_rows($result);
                    if($number == 1) {
                        
                        //fetch this postcard details
                        $tbl_name = "postcard";
                        $tbl_name1 = "userinfo";
                        $tbl_name2 = "record";
                        $sql = "SELECT * FROM $tbl_name
                        LEFT JOIN $tbl_name1 ON $tbl_name.uuid = $tbl_name1.uuid
                        LEFT JOIN $tbl_name2 ON $tbl_name.uuid = $tbl_name2.uuid
                        WHERE $tbl_name.postcard_uid = '$postcard_uid' AND $tbl_name2.uuid = '$uuid' AND $tbl_name2.payment_state = 1";
                        $result = mysql_query($sql);
                        $row = mysql_fetch_array($result);
                        $uuid = $row['uuid'];
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
                        $json_data['sender_image'] = $row['user_icon'];
                        $json_data['sender_nickname'] = $row['user_nickname'];
                        $json_code = 1000;
                        $json_message = "Get postcard information succeed";
                    } else {
                        $json_code = 50;
                        $json_message = "User id is not found";
                    } 
                } else {
                    $json_code = 48;
                    $json_message = "This postcard is confirmed by other user";
                }
            } else {
                $json_code = 46;
                $json_message = "This postcard is not paid";
            }
        } else {
            $json_code = 49;
            $json_message = "Postcard id is not found in the record";
        }
    }else {
            $json_code = 38;
            $json_message = "Postcard id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>