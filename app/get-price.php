<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 29th Apr 2015
     *  Return price based on different country
     */
    
    $original_country = $_GET['originalCountry'];
    $destination_country = $_GET['destinationCountry'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Country selection
    if($original_country == "IE") {
        if ($destination_country == "IE") {
            $json_code = 1000;
            $json_message = "IE => IE, euros";
            $json_data = 229;
        } else {
            $json_code = 1000;
            $json_message = "IE => Others, euros";
            $json_data = 299;
        }
        
    } elseif($original_country == "GB") {
        if($destination_country == "GB") {
            $json_code = 1000;
            $json_message = "GB => GB, pounds";
            $json_data = 229;
        } else {
            $json_code = 1000;
            $json_message = "GB => Others, pounds";
            $json_data = 299;
        }
    } elseif($original_country == "CN") {
        if($destination_country == "CN") {
            $json_code = 1000;
            $json_message = "CN => CN, rmb";
            $json_data = 699;
        } else {
            $json_code = 1000;
            $json_message = "CN => Others, rmb";
            $json_data = 1499;
        }
    } else {
        $json_code = 21;
        $json_message = "Match failed";
        $json_data = 0;
    }
    
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    
?>