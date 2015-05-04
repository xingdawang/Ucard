<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 4th May 2015
     */
    
    $postcard_uid = $_GET['postcardID'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="record"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_uid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number == 1) {
        
        // Change postcard publication state
        $tbl_name = "record";
        $sql = "UPDATE $tbl_name SET sharing_state = 1 WHERE postcard_uid = '$postcard_uid'";
        $result = mysql_query($sql);
        $json_code = 1000;
        $json_message = "Sharing state changed succeed";
    }else {
        $json_code = 33;
        $json_message = "Postcard id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>