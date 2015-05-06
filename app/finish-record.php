<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 5th May 2015
     */
    
    $record_id = $_POST['recordID'];
    $swift_number = $_POST['swiftNumber'];

    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="record"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE record_uid = '$record_id'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    // Check whether the user is exist
    if($number == 1) {
        
        // Check whethter the postcard is exist
        $tbl_name="record"; // Table name
        $sql = "UPDATE $tbl_name SET swift_number = '$swift_number', payment_state = 1 WHERE record_uid = '$record_id'";
        $result = mysql_query($sql);
        $json_code = 1000;
        $json_message = "Swift number added, payment state changed to 1 (Paid)";
        
    } else {
        $json_code = 44;
        $json_message = "Record id is not found";
    }
    

    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>