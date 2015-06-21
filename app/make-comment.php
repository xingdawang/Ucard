<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 5th May 2015
     */
    
    $uuid = $_POST['uuid'];
    $postcard_uid = $_POST['postcardID'];
    $comment = $_POST['comment'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    // Check whether the user is exist
    if($number == 1) {
        
        // Check whethter the postcard is exist
        $tbl_name="postcard"; // Table name
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
        $result = mysql_query($sql);
        $number = mysql_num_rows($result);
        if($number >= 1) {
            
            // Check whether this postcard is public
            $tbl_name="record"; // Table name
            $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid' AND sharing_state = 2";
            $result = mysql_query($sql);
            $number = mysql_num_rows($result);
            if($number == 1) {
                
                // Insert comment in the comment table
                $tbl_name = "comment";
                $sql = "INSERT INTO $tbl_name (postcard_uid, uuid, comment_content) VALUES ('$postcard_uid', '$uuid', '$comment')";
                mysql_query($sql);
                $json_code = 1000;
                $json_message = "Comment succeed";
            } else {
                $json_code = 43;
                $json_message = "Postcard is not public";
            }
            
        } else{
            $json_code = 42;
            $json_message = "Postcard id is not found";
        }
        
    } else {
        $json_code = 41;
        $json_message = "User id is not found";
    }
    

    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>