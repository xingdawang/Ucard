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
    $tbl_name="comment"; // Table name
    $sql = "SELECT * FROM $tbl_name";
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_array($result)) {
        $json_data_array[] = array(
            'postcard_uid' => $row['postcard_uid'],
            'uuid' => $row['uuid'],
            'comment' => $row['comment_content'],
            'time' => $row['comment_time'],
        );
    }
    $json_code = 1000;
    $json_message = "Comment list get succeed";
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data_array);
    die(json_encode($array));

?>