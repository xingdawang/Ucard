<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 2nd May 2015
     *  Generate a record
     */
    
    $uuid = $_GET['uuid'];
    $postcard_id = $_GET['postId'];
    $payment_type = $_GET['paymentType'];
    $price = $_GET['price'];
    $product_name = $_GET['productName'];
    $currency = $_GET['currency'];
    $original_country = $_GET['originalCountry'];
    $destination_country = $_GET['destinationCountry'];
    $record_uid = uniqid();
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Connect to database
    include "connectDB.php";
    $tbl_name = "postcard";
    $sql = "SELECT * FROM $tbl_name WHERE postcard_uid = '$postcard_id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    //echo $row['uuid'];
    
    if($row['uuid'] == $uuid) {
        $tbl_name = "record";
        $sql = "INSERT INTO $tbl_name (record_uid, payment_type, uuid, postcard_uid,
        total_price, currency, item_name, original_country, destination_country) VALUES
        ('$record_uid', '$payment_type', '$uuid', '$postcard_id', '$price', '$currency',
        '$product_name', '$original_country', '$destination_country')";
        mysql_query($sql);
        $json_code = 1000;
        $json_data = 'Information updates succeed';
        $json_message = $record_uid;
    } else {
        $json_code = 25;
        $json_data = "Generate record failed, postcard_uid and uuid not fatch";
        $json_message = $record_uid;
    }
    mysql_close();
    
    
    
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    
?>