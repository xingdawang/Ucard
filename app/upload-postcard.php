<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 29th Apr 2015
     *  Upload postcard
     */
    
    // Get all the given data
    $uuid = $_POST['uuid'];
    $postcard_greetings = $_POST['postcardGreetings'];
    $house_number = $_POST['houseNumber'];
    $street_number = $_POST['streetNumber'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];
    $postcard_location = $_POST['postcardLocation'];
    
    // Generate postcard_uid
    $postcard_uid = uniqid();
    
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Upload postcard two sides
    // Generate photo path and name
    $postcardName = $uuid . time() . generateRandomString().".png";//jpg
    $frontFolder = "../postcard-front/".$postcardName;
    $backFolder = "../postcard-back/".$postcardName;
            
    $postcardFrontImage = $_FILES["postcardFront"]["type"];
    $postcardBackImage = $_FILES["postcardBack"]["type"];
    
    //echo $postcardFrontImage . "1<br>";
    //echo $postcardBackImage . "2<br>";
    
    // Check image format
    if($postcardFrontImage == "image/png" && $postcardBackImage == "image/png") {
        
        // Check Image size 1748 x 1240 
        $frontInfo = getimagesize($_FILES["postcardFront"]["tmp_name"]);
        $backInfo = getimagesize($_FILES["postcardBack"]["tmp_name"]);
        $widthFront = $frontInfo[0];
        $heightFront = $frontInfo[1];
        $widthBack = $backInfo[0];
        $heightBack = $backInfo[1];
        
        if($widthFront == $widthBack && $widthFront == "1748" && $heightFront == $heightBack && $heightFront == "1240") {
            
            move_uploaded_file($_FILES['postcardFront']['tmp_name'], $frontFolder);
            move_uploaded_file($_FILES['postcardBack']['tmp_name'], $backFolder);
            //echo "Update succeed";
            
            // Connect to database
            include "connectDB.php";
            $tbl_name = "postcard";
            $sql = "INSERT INTO $tbl_name (`postcard_uid`, `uuid`, `postcard_head`, `postcard_back`, `postcard_greeting`,
            `receiver_house_number`, `receiver_street`, `receiver_city`, `receiver_county`, `receiver_postcode`, `receiver_country`,
            `postcard_location`, `postcard_confirm_code`) VALUES ('$postcard_uid', '$uuid',
            '$frontFolder', '$backFolder', '$postcard_greetings', '$house_number', '$street_number', '$city', '$county', '$postcode',
            '$country', '$postcard_location', '$postcard_uid')";
            mysql_query($sql);
            $json_code = 1000;
            $json_message = 'Upload Successful, image & data';
            $json_data = $postcard_uid;
            
        } else {
            //echo "Please enter 1748 x 1240 images photos";
            $json_code = 23;
            $json_message = 'size is not 1748 x 1240';
            $json_data = '';
        }   
    }
    else {
        //echo "please select an image (jpg / png / gif)";
        $json_code = 22;
        $json_message = 'Only one side is chosen, or not png format';
        $json_data = '';
    }
    
    // Generate 5 length random string
    function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    
?>