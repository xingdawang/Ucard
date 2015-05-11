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
    $tbl_name3 = "record";
    $tbl_name4 = "receiver";
    $tbl_name5 = "userinfo";
    $sql = "SELECT *,
    $tbl_name4.uuid AS receiver_uid
    FROM $tbl_name
    LEFT JOIN $tbl_name3 ON $tbl_name.postcard_uid = $tbl_name3.postcard_uid
    LEFT JOIN $tbl_name4 ON $tbl_name.postcard_uid = $tbl_name4.postcard_uid
    LEFT JOIN $tbl_name5 ON $tbl_name4.uuid = $tbl_name5.uuid
    WHERE $tbl_name3.sharing_state = 2
    GROUP BY $tbl_name.postcard_uid";
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_array($result)) {
        
        // Get each postcard comment number
        $tbl_name = "comment";
        $poscard_uid = $row['postcard_uid'];
        $sql_comment = "SELECT * FROM $tbl_name WHERE postcard_uid = '$poscard_uid'";
        $result_comment = mysql_query($sql_comment);
        $comment_number = mysql_num_rows($result_comment);
        
        $json_data[] = Array(
            'postcard_uid' => $row['postcard_uid'],
            'original_country' => $row['original_country'],
            'destination_country' => $row['destination_country'],
            'like_number' => $row['like_number'],
            'postcard_head' => $row['postcard_head'],
            'postcard_making_time' => $row['postcard_making_time'],
            'receiver_uid' => $row['receiver_uid'],
            'receiver_icon' => $row['user_icon'],
            'receiver_nickname' => $row['user_nickname'],
            'postcard_comment_number' => $comment_number
                           );
    }
    $json_code = 1000;
    $json_message = "Get postcard community list succeed";
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>