<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Test pages for uploading postcard into the database
     */
    
    $email = $_POST['email'];
    $postcardBody = $_POST['postcardBody'];
    $receiverAddress = $_POST['receiverAddress'];
    $photoLocation = $_POST['photoLocation'];
    $postcardQuotation = $_POST['postcardQuotation'];
    $originalCountry = $_POST['originalCountry'];
    $destinationCountry = $_POST['destinationCountry'];
    
    // Prevent xml injection
    $email = stripcslashes($email);
    $postcardBody = stripcslashes($postcardBody);
    $receiverAddress = stripcslashes($receiverAddress);
    $photoLocation = stripcslashes($photoLocation);
    $postcardQuotation = stripcslashes($postcardQuotation);
    $originalCountry = stripcslashes($originalCountry);
    $destinationCountry = stripcslashes($destinationCountry);
    
    
    // Connect to database
    include "connectDB.php";
    
    // find current user uuid
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT uuid FROM $tbl_name WHERE email = '$email'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $uuid = $row['uuid'];
    //echo "$uuid";
    
    // Upload postcard two sides
    // Generate photo path and name
    $postcardName = $uuid . time() . generateRandomString();
    $frontFolder = "postcard-front/".$postcardName;
    $backFolder = "postcard-back/".$postcardName;
            
    $postcardFrontImage = $_FILES["postcardFront"]["type"];
    $postcardBackImage = $_FILES["postcardBack"]["type"];
    
    // Check image format
    if( ($postcardFrontImage == "image/jpeg"  && $postcardBackImage == "image/jpeg") ||
        ($postcardFrontImage == "image/png" && $postcardBackImage == "image/png") ||
        ($postcardFrontImage == "image/gif" && $postcardBackImage == "image/gif")) {
        
        // Check Image size 1240 x 1748 
        $frontInfo = getimagesize($_FILES["postcardFront"]["tmp_name"]);
        $backInfo = getimagesize($_FILES["postcardBack"]["tmp_name"]);
        $widthFront = $frontInfo[0];
        $heightFront = $frontInfo[1];
        $widthBack = $backInfo[0];
        $heightBack = $backInfo[1];
        
        if($widthFront == $widthBack && $widthFront == "1748" && $heightFront == $heightBack && $heightFront == "1240") {
            
            move_uploaded_file($_FILES['postcardFront']['tmp_name'], $frontFolder);
            move_uploaded_file($_FILES['postcardBack']['tmp_name'], $backFolder);
            echo "Update succeed";
        } else {
            echo "Please enter 1240 x 1748 images photos";
        }   
    }
    else {
        echo "please select an image (jpg / png / gif)";
    }
    
    //echo "<br>".$uuid."<br>";
    // Store all necessary information into  postcard table
    $tbl_name = "postcard";
    $sql = "INSERT INTO $tbl_name (`uuid`, `postcard_greeting`, `receiver_address`, `postcard_head`, `postcard_back`, `postcard_location`, `postcard_quotation`)"
    ." VALUES ('$uuid', '$postcardBody', '$receiverAddress', '$frontFolder', '$backFolder', '$photoLocation', '$postcardQuotation')";
    mysql_query($sql);
    
    // Get this postcard_uid
    $sql = "SELECT postcard_uid FROM $tbl_name WHERE postcard_head = '$frontFolder'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $postcard_uid = $row['postcard_uid'];
    //echo $postcard_uid;
    
    // Calculate postcard_confirm_code and add it to the postcard table
    // Calculate postcard_confirm_code
    $temp1 = md5($postcard_uid);
    $temp2 = substr($temp1,1,8);    // substring from char 1 - 9
    $postcard_confirm_code = md5($temp2);
    // Add it into postcard table
    $sql = "UPDATE $tbl_name SET postcard_confirm_code = '$postcard_confirm_code' WHERE postcard_uid = $postcard_uid";
    mysql_query($sql);
    
    // Generate corresponding consumption record in record table
    $tbl_name = "record";
    $record_uid = $uuid.generateRandomString();
    $payment_state = 1; // 1 paid, 2 unpaid
    $total_price = 299;
    $sending_state = 1;
    $sql = "INSERT INTO $tbl_name (`record_uid`, `uuid`, `postcard_uid`, `payment_state`, `total_price`, `sending_state`, `original_country`, `destination_country`)" // , `payment_state`, `total_price`, `sending_state`, `original_country`, `destination_country`
    ." VALUES ('$record_uid', '$uuid', $postcard_uid, $payment_state, $total_price, $sending_state, '$originalCountry', '$destinationCountry')"; // , $payment_state, $total_price, $sending_state, '$originalCountry', '$destinationCountry'
    mysql_query($sql);
    
    // Update story information in story table
    $tble_name = "story";
    $sql = "INSERT INTO $tble_name (`postcard_uid`) VALUES ($postcard_uid)";
    mysql_query($sql);
    
    mysql_close();
    
    
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
?>