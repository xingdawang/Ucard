<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 10th May 2015
     */
    $postcard_uid = $_POST['postcardId'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name = "postcard";
    $tbl_name2 = "story";
    $tbl_name3 = "record";
    $tbl_name4 = "receiver";
    $tbl_name5 = "userinfo";
    $sql = "SELECT *,
    $tbl_name4.uuid AS receiver_uid
    FROM $tbl_name
    LEFT JOIN $tbl_name2 ON $tbl_name.postcard_uid = $tbl_name2.postcard_uid
    LEFT JOIN $tbl_name3 ON $tbl_name.postcard_uid = $tbl_name3.postcard_uid
    LEFT JOIN $tbl_name4 ON $tbl_name.postcard_uid = $tbl_name4.postcard_uid
    LEFT JOIN $tbl_name5 ON $tbl_name4.uuid = $tbl_name5.uuid
    WHERE $tbl_name3.payment_state = 1 AND $tbl_name.postcard_uid = '$postcard_uid'
    GROUP BY $tbl_name.postcard_uid";
    
    $result = mysql_query($sql);
    if(mysql_num_rows($result) == 1) {
        
        // Get each postcard comment number
        $tbl_name = "comment";
        $sql_comment = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result_comment = mysql_query($sql_comment);
        $comment_number = mysql_num_rows($result_comment);
        
        $row = mysql_fetch_array($result);
        $json_data['original_country'] = $row['original_country'];
        $json_data['destination_country'] = $row['destination_country'];
        $json_data['like_number'] = ($row['like_number'] == "" ? 0 :$row['like_number']);
        $json_data['postcard_head'] = $row['postcard_head'];
        $json_data['postcard_making_time'] = $row['postcard_making_time'];
        $json_data['user_icon'] = $row['user_icon'];
        $json_data['user_nickname'] = $row['user_nickname'];
        $json_data['comment_number'] = $comment_number;
        $json_code = 1000;
        $json_message = "Get postcard community details succeed";
        
    } else{
        $json_code = 51;
        $json_message = "Postcard is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>