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
        $tbl_name = "receiver";
        $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
        $result = mysql_query($sql);
        $number = mysql_num_rows($result);
        $json_code = 1000;
        $json_message = "Receiving list returned";
        while($row = mysql_fetch_array($result)){
            $json_data[] = array(
                'postcard_uid' => $row['postcard_uid']
            );
        }
    }else {
        $json_code = 31;
        $json_message = "User id is not found";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>