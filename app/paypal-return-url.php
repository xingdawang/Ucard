<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 2nd May 2015
     *  Generate a record
     */
    
    $transaction_id = $_GET['tx'];
    $status = $_GET['st'];
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $item_name = $_GET['item_number']; // item name
    $record_id = $_GET['cm'];
    
    $json_code = '';
    $json_message = '';
    $json_data = '';
    
    // Connect to database
    include "connectDB.php";
    $tbl_name = "record";
    $sql="SELECT * FROM $tbl_name WHERE record_uid = '$record_id'";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    
    if($num == 1){
        
        $sql = "UPDATE $tbl_name SET swift_number = '$transaction_id', payment_state = 1 WHERE record_uid = '$record_id'";
        mysql_query($sql);
        $json_code = 1000;
        $json_message = 'Transaction id updated succeed';
        $json_data['transaction_id'] = $transaction_id;
        $json_data['status'] = $status;
        $json_data['amount'] = $amount;
        $json_data['currency'] = $currency;
        $json_data['item_name'] = $item_name;
        $json_data['record_id'] = $record_id;
        
    } else {
        $json_code = 47;
        $json_message = 'Record id is not found';
        $json_data = '';  
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>