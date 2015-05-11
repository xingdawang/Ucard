<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 5th May 2015
     */

    $postcard_uid = $_POST['postcardId'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name = "comment";
    $tbl_name1 = "userinfo";
    $sql = "SELECT *,
    $tbl_name.uuid AS comment_uuid,
    $tbl_name.postcard_uid AS comment_postcard_uid,
    $tbl_name.comment_content AS content
    FROM $tbl_name
    LEFT JOIN $tbl_name1 ON $tbl_name.uuid = $tbl_name1.uuid
    WHERE $tbl_name.postcard_uid = '$postcard_uid'
    ORDER BY $tbl_name.comment_time DESC";
    $result = mysql_query($sql);

    while($row = mysql_fetch_array($result)){
        $json_data[] = array(
            'postcard_uid' => $row['comment_postcard_uid'],
            'uuid' => $row['comment_uuid'],
            'comment' => $row['content'],
            'time' => $row['comment_time'],
            'user_nickname' => $row['user_nickname'],
            'user_icon' => $row['user_icon']
        );
    }
    mysql_close();
    $json_code = 1000;
    $json_message = "Comment list get succeed";
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>