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
    $item_number = $_GET['item_number']; // item name
    
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    $json_data['transaction_id'] = $transaction_id;
    $json_data['status'] = $status;
    $json_data['amount'] = $amount;
    $json_data['currency'] = $currency;
    $json_data['item_number'] = $item_number;
    
    // Connect to database
    include "connectDB.php";
    $tbl_name = "record";
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>