<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 5th May 2015
     */
    
    $postcard_uid = $_POST['postcardID'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="record"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number >= 1) {
        
        // Check postcard publication state
        $tbl_name="record"; // Table name
        $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid' AND sharing_state = 2";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if($row['sharing_state'] == 2){
            
            //update post-like number in the story table
            $tbl_name = "story";
            $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
            $result = mysql_query($sql);
            $number = mysql_num_rows($result);
            
            if($number == 0){   // If the postcard uid is not exist
                $sql = "INSERT INTO $tbl_name (postcard_uid, like_number) VALUES ('$postcard_uid', 1)";
                mysql_query($sql);
                $json_data = 1;
            }else { // If the postcard uid is exist, increase its like number
                $row = mysql_fetch_array($result);
                $like_number = $row['like_number'] + 1;
                $sql = "UPDATE $tbl_name SET like_number = $like_number WHERE postcard_uid = '$postcard_uid'";
                mysql_query($sql);
                $json_data = $like_number;
            }
            $json_code = 1000;
            $json_message = "Sharing state changed succeed";
        }else {
            $json_code = 40;
            $json_message = "This postcard is not public yet";
        }
    }else {
        $json_code = 39;
        $json_message = "Postcard id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>