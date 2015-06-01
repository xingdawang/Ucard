<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 1th Jun 2015
     *  Update postcard
     */
    
    // Get all the given data
    $postcard_uid = $_POST['postcardId'];
    $uuid = $_POST['uuid'];
    $postcard_greetings = $_POST['postcardGreetings'];
    $house_number = $_POST['houseNumber'];
    $street_number = $_POST['streetNumber'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];
    $postcard_location = $_POST['postcardLocation'];
    
    // Use for transfering json data
    $json_code = '';
    $json_data = '';
    $json_message = '';
    
    // Upload postcard two sides
    // Generate photo path and name
    $random_string = generateRandomString();
    $time = time();
    $postcardName = $uuid . $time . $random_string .".png";//jpg
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
            
            // Generate head image snail image
            $img = imagecreatefrompng($_FILES['postcardFront']['tmp_name']);

            // set thumbnail size
            $new_width = "640";
            $new_height = "454";
            
            // get privous image size
            $size = GetImageSize($_FILES['postcardFront']['tmp_name']);
            $previous_icon_width = $size[0];
            $previous_icon_height = $size[1];
          
            // create a new temporary image $tep_img is the canvas, $img is the old image
            $tmp_img = imagecreatetruecolor( $new_width, $new_height );
            
            // copy and resize old image into new image 
            imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $previous_icon_width, $previous_icon_height);
            
            // save thumbnail into a file
            $new_image_url = "../postcard-front/".$uuid. $time. $random_string. "-small.png";
            imagepng($tmp_img, $new_image_url);
            
            
            // Generate back image snail image
            $img = imagecreatefrompng($_FILES['postcardBack']['tmp_name']);

            // set thumbnail size
            $new_width = "640";
            $new_height = "454";
            
            // get privous image size
            $size = GetImageSize($_FILES['postcardBack']['tmp_name']);
            $previous_icon_width = $size[0];
            $previous_icon_height = $size[1];
          
            // create a new temporary image $tep_img is the canvas, $img is the old image
            $tmp_img = imagecreatetruecolor( $new_width, $new_height );
            
            // copy and resize old image into new image 
            imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $previous_icon_width, $previous_icon_height);
            
            // save thumbnail into a file
            $new_image_url = "../postcard-back/".$uuid. $time. $random_string. "-small.png";
            imagepng($tmp_img, $new_image_url);
            
            
            // Upload images to the given folder !!!IMPORTANT!!! Do not put this operation before thumb operation
            move_uploaded_file($_FILES['postcardFront']['tmp_name'], $frontFolder);
            move_uploaded_file($_FILES['postcardBack']['tmp_name'], $backFolder);
            
            // Connect to database
            include "connectDB.php";
            $tbl_name = "postcard";
            $sql = "UPDATE $tbl_name SET
            uuid = '$uuid',
            postcard_head = '$frontFolder',
            postcard_back = '$backFolder',
            postcard_greeting = '$postcard_greetings',
            receiver_house_number = '$house_number',
            receiver_street = '$street_number',
            receiver_city = '$city',
            receiver_county = '$county',
            receiver_postcode = '$postcode',
            receiver_country = '$country',
            postcard_location = '$postcard_location',
            postcard_confirm_code = '$postcard_uid'
            WHERE postcard_uid = '$postcard_uid'
            ";
            mysql_query($sql);
            $json_code = 1000;
            $json_message = 'Upload Successful, image & data';
            $json_data = $postcard_uid;
            
        } else {
            //echo "Please enter 1748 x 1240 images photos";
            $json_code = 53;
            $json_message = 'size is not 1748 x 1240';
            $json_data = '';
        }   
    }
    else {
        //echo "please select an image (jpg / png / gif)";
        $json_code = 52;
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