<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 3rd May 2015
     */
    
    $uuid = $_GET['uuid'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    $password = md5(md5($password));
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number == 1) {
        $tbl_name = "record";
        $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid' AND sending_state = 1";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)){
	    $json_data[] = $row['postcard_uid'];
	}
        $json_code = 1000;
        $json_message = "Sending list returned";
    }else {
        $json_code = 28;
        $json_message = "User id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>