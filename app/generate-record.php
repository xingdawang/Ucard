<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 2nd May 2015
     *  Generate a record
     */
    
    $uuid = $_POST['uuid'];
    $postcard_id = $_POST['postId'];
    $payment_type = $_POST['paymentType'];
    $price = $_POST['price'];
    $product_name = $_POST['productName'];
    $currency = $_POST['currency'];
    $original_country = $_POST['originalCountry'];
    $destination_country = $_POST['destinationCountry'];
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
        $json_message = 'Information updates succeed';
        $json_data = $record_uid;
    } else {
        $json_code = 25;
        $json_message = "Generate record failed, postcard_uid and uuid not match";
        $json_data = $record_uid;
    }
    mysql_close();
    
    
    
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    
?>