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
    $sql = "SELECT * FROM $tbl_name
    LEFT JOIN $tbl_name1 ON $tbl_name.uuid = $tbl_name1.uuid
    WHERE postcard_uid = '$postcard_uid'";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)) {
        $json_data_array[] = array(
            'postcard_uid' => $row['postcard_uid'],
            'uuid' => $row['uuid'],
            'comment' => $row['comment_content'],
            'time' => $row['comment_time'],
            'user_nickname' => $row['user_nickname'],
            'user_icon' => $row['user_icon']
        );
    }
    mysql_close();
    $json_code = 1000;
    $json_message = "Comment list get succeed";
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data_array);
    die(json_encode($array));

?>