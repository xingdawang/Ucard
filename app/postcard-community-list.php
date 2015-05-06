<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 5th May 2015
     */
    
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="record"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE sharing_state = 2";//2
    $result = mysql_query($sql);
    $i = 0;
    while($row = mysql_fetch_array($result)) {
        
        // Get postcard id, original country & destination country in record table
        $postcard_uid = $row['postcard_uid'];
        $json_data[$i]['postcard_uid'] = $row['postcard_uid'];
        $json_data[$i]['original_country'] = $row['original_country'];
        $json_data[$i]['destination_country'] = $row['destination_country'];
        
        // Get like number in story table
        $tbl_name = "story";
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result_story = mysql_query($sql);
        $row_like_number = mysql_fetch_array($result_story);
        $json_data[$i]['like_number'] = $row_like_number['like_number'];
        
        // Get comment number in comment table
        $tbl_name = "comment";
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result_comment = mysql_query($sql);
        $number = mysql_num_rows($result_comment);
        $json_data[$i]['comment_number'] = $number;
        
        // Get postcard head image, release time in postcard table
        $tbl_name = "postcard";
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result_postcard = mysql_query($sql);
        $row_postcard_details = mysql_fetch_array($result_postcard);
        $json_data[$i]['postcard_head'] = $row_postcard_details['postcard_head'];
        $json_data[$i]['postcard_making_time'] = $row_postcard_details['postcard_making_time'];
        
        // Get sender photo image and nickname
        // Get receiver id from receiver table
        $tbl_name = "receiver";
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result_receiver = mysql_query($sql);
        $row_receiver = mysql_fetch_array($result_receiver);
        $receiver_id = $row_receiver['uuid'];
        // Get sender photo image and nickname in userinfo table
        $tbl_name = "userinfo";
        $sql = "SELECT * FROM $tbl_name WHERE uuid = '$receiver_id'";
        $result_userinfo = mysql_query($sql);
        $row_receiver = mysql_fetch_array($result_userinfo);
        $json_data[$i]['receiver_image'] = $row_receiver['user_icon'];
        $json_data[$i]['receiver_nickname'] = $row_receiver['user_nickname'];
        $i += 1;
    }
    $json_code = 1000;
    $json_message = "Get postcard community list succeed";
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>