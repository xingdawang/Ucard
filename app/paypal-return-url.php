<?php
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
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>