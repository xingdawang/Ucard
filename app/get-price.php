<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 29th Apr 2015
     *  Return price based on different country
     */
    
    $original_country = $_POST['originalCountry'];
    $destination_country = $_POST['destinationCountry'];
    $payment_type = $_POST['paymentType'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Country selection
    if($original_country == "IE") {
        if ($destination_country == "IE") {
            $json_code = 1000;
            $json_message = "IE => IE, euros";
            $json_data['price'] = 229;
            $json_data['paypal_url'] = "/paypal-IE-IE.php";
        } else {
            $json_code = 1000;
            $json_message = "IE => Others, euros";
            $json_data['price'] = 299;
            $json_data['paypal_url'] = "/paypal-IE-OTR.php";
        }
        
    } elseif($original_country == "GB") {
        if($destination_country == "GB") {
            $json_code = 1000;
            $json_message = "GB => GB, pounds";
            $json_data['price'] = 199;
            $json_data['paypal_url'] = "/paypal-UK-UK.php";
        } else {
            $json_code = 1000;
            $json_message = "GB => Others, pounds";
            $json_data['price'] = 229;
            $json_data['paypal_url'] = "paypal-UK-OTR.php";
        }
    } elseif($original_country == "CN") {
        if($destination_country == "CN") {
            $json_code = 1000;
            $json_message = "CN => CN, rmb";
            $json_data['price'] = 699;
            $json_data['paypal_url'] = "paypal-CN-CN.php";
        } else {
            $json_code = 1000;
            $json_message = "CN => Others, rmb";
            $json_data['price'] = 1499;
            $json_data['paypal_url'] = "paypal-CN-OTR.php";
        }
    } else {
        $json_code = 21;
        $json_message = "Match failed";
        $json_data = 0;
    }
    if (strtolower($payment_type) == "alipay" || strtolower($payment_type) == "paymill") {
        $json_data = "";
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    
?>