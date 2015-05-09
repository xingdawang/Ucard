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
    $tbl_name = "postcard";
    $tbl_name1 = "story";
    $tbl_name2 = "comment";
    $tbl_name3 = "record";
    $tbl_name4 = "receiver";
    $tbl_name5 = "userinfo";
    $sql = "SELECT *,
    $tbl_name4.uuid AS receiver_uid
    FROM $tbl_name
    LEFT JOIN $tbl_name1 ON $tbl_name.postcard_uid = $tbl_name1.postcard_uid
    LEFT JOIN $tbl_name2 ON $tbl_name.postcard_uid = $tbl_name2.postcard_uid
    LEFT JOIN $tbl_name3 ON $tbl_name.postcard_uid = $tbl_name3.postcard_uid
    LEFT JOIN $tbl_name4 ON $tbl_name.postcard_uid = $tbl_name4.postcard_uid
    LEFT JOIN $tbl_name5 ON $tbl_name4.uuid = $tbl_name5.uuid
    WHERE $tbl_name3.sharing_state = 2
    GROUP BY $tbl_name.postcard_uid";
    $result = mysql_query($sql);
    echo mysql_num_rows($result);
    while($row = mysql_fetch_array($result)) {
        
        $json_data[] = Array(
            'postcard_uid' => $row['postcard_uid'],
            'original_country' => $row['original_country'],
            'destination_country' => $row['destination_country'],
            'like_number' => $row['like_number'],
            'postcard_head' => $row['postcard_head'],
            'postcard_making_time' => $row['postcard_making_time'],
            'receiver_uid' => $row['receiver_uid'],
            'receiver_icon' => $row['user_icon'],
            'receiver_nickname' => $row['user_nickname']
                           );
        /*
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
        */
    }
    $json_code = 1000;
    $json_message = "Get postcard community list succeed";
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>