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
    
    // Prevent xml injection
    $email = stripcslashes($email);
    $postcardBody = stripcslashes($postcardBody);
    $receiverAddress = stripcslashes($receiverAddress);
    $photoLocation = stripcslashes($photoLocation);
    $postcardQuotation = stripcslashes($postcardQuotation);
    
    // Connect to database
    include "connectDB.php";
    
    // find current user uuid
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT uuid FROM $tbl_name WHERE email = '$email'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $uuid = $row['uuid'];
    
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
    
    // Store all necessary information into database
    $tbl_name = "postcard";
    $sql = "INSERT INTO $tbl_name (`uuid`, `postcard_greeting`, `receiver_address`, `postcard_head`, `postcard_back`, `postcard_location`, `postcard_quotation`)"
    ." VALUES ('$uuid', '$postcardBody', '$receiverAddress', '$frontFolder', '$backFolder', '$photoLocation', '$postcardQuotation')";
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