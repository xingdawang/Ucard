<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Add more personal details
     */
    
    // Read nickname from the session
    //session_start();
    
    
    // Get data from the form
    // Post method
    $uuid = $_POST['uuid'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $houseNumber = $_POST['houseNumber'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];
    $registerType = $_POST['registerType'];
    $thirdPartyUid = $_POST['thirdPartyUid'];
    $dateOfBirth = $_POST['dateOfBirth'];   // need time validation
    $sex = $_POST['sex'];
    $country = $_POST['country'];
    /* Get method
    $firstName = $_GET['firstName'];
    $middleName = $_GET['middleName'];
    $lastName = $_GET['lastName'];
    $houseNumber = $_GET['houseNumber'];
    $street = $_GET['street'];
    $city = $_GET['city'];
    $county = $_GET['county'];
    $postcode = $_GET['postcode'];
    $registerType = $_GET['registerType'];
    $thirdPartyUid = $_GET['thirdPartyUid'];
    $dateOfBirth = $_GET['dateOfBirth'];   // need time validation
    $sex = $_GET['sex'];
    $country = $_GET['country'];
    */
    // To protect MySQL injection (more detail about MySQL injection)
    $firstName = stripslashes($firstName);
    $middleName = stripslashes($middleName);
    $lastName = stripslashes($lastName);
    $houseNumber = stripcslashes($houseNumber);
    $street = stripslashes($street);
    $city = stripslashes($city);
    $county = stripslashes($county);
    $postcode = stripslashes($postcode);
    $registerType = stripslashes($registerType);
    $thirdPartyUid = stripslashes($thirdPartyUid);
    $dateOfBirth = stripslashes($dateOfBirth);
    $sex = stripslashes($sex);
    $country = stripcslashes($country);
    
    // Connect to database
    include "connectDB.php";

    /*    
    // find current user uuid to store photo snail icon
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT uuid FROM $tbl_name WHERE user_nickname = '$nickname'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $uuid = $row['uuid'];
    mysql_close();
    */
    
    //Upload image to folder
    $target = "../user-photo-icon/";       //this folder must have 777 privilage
    //$target = $target . basename( $_FILES["imageToUpload"]["name"]);
    $target = $target.basename($uuid).basename(".jpeg");

    // Image Checking
    if($target == "../user-photo-icon/"){
            //echo "Please login again";
            $json_code = 5;
            $json_message = "Cannot add personal details, user has logout";
    }
    else {
        $filetype = $_FILES["imageToUpload"]["type"];
        //echo $filetype."<br>";
        if($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif") {
            //echo "please select an image (jpg / png / gif)";
            $json_code = 6;
            $json_message = "Cannot add personal details, not select image (jpg or png or gif)";
            //echo '<meta content="3;/personal-details-rename.php" http-equiv="Refresh" />';
        }
        else {
            if($_FILES["imageToUpload"]["size"] > 500000){
                //echo "Image is biger than 500K";
                $json_code = 7;
                $json_message = "Cannot add personal details, image is biger than 500K";
                //echo '<meta content="3;/personal-details-rename.php" http-equiv="Refresh" />';
            }
            else {
                // create photo thumb instead the real size
                // Check phpinfo(), all the gd function should be supported.
                
                // Create image from file
                switch(strtolower($_FILES['imageToUpload']['type']))
                {
                     case 'image/jpeg':
                         $img = imagecreatefromjpeg($_FILES['imageToUpload']['tmp_name']);
                         break;
                     case 'image/png':
                         $img = imagecreatefrompng($_FILES['imageToUpload']['tmp_name']);
                         break;
                     case 'image/gif':
                         $img = imagecreatefromgif($_FILES['imageToUpload']['tmp_name']);
                         break;
                     default:
                         exit('Unsupported type: '.$_FILES['imageToUpload']['type']);
                }

                //$img = imagecreatefromjpeg($_FILES['imageToUpload']['tmp_name']);
                
                // get privous image size
                $size = GetImageSize($_FILES['imageToUpload']['tmp_name']);
                $previous_icon_width = $size[0];
                $previous_icon_height = $size[1];
          
                // set thumbnail size
                $new_width = "200";
                $new_height = "200";
          
                // create a new temporary image $tep_img is the canvas, $img is the old image
                $tmp_img = imagecreatetruecolor( $new_width, $new_height );
          
                // copy and resize old image into new image 
                imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $previous_icon_width, $previous_icon_height );
                
                // save thumbnail into a file
                imagejpeg( $tmp_img, $target);

                //image without conpression
                //move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target);
                //echo "Upload user snail icon succeed";
                $json_code = 8;
                $json_message = "Upload user snail icon succeed, but no further details";
            }     
        }
    }
    
    // Connect to database
    include "connectDB.php";
    $tbl_name="userinfo"; // Table name
    
    if($sex == "girl")
        $sex = 0;           //girl
    else
        $sex = 1;           //boy
        
    // Upadate data
    $sql = "UPDATE $tbl_name SET ".
    "first_name = '$firstName', ".
    "middle_name = '$middleName', ".
    "last_name = '$lastName', ".
    "house_number = '$houseNumber', ".
    "street = '$street', ".
    "city = '$city', ".
    "county = '$county', ".
    "postcode = '$postcode', ".
    "register_type = '$registerType', ".
    "third_party_uid = '$thirdPartyUid', ".
    "date_of_birth = '$dateOfBirth', ".
    "sex = '$sex', ".
    "country = '$country', ".
    "user_icon = '$target' ".
    "WHERE uuid = '$uuid'";
    mysql_query($sql);
    mysql_close();
    
    if($json_code == 8) {
        $json_code = 1000;
        $json_message = "Update personal information and icon complete";    
    }
    
    $array = Array('message'=>$json_message, 'code'=>$json_code);
    die(json_encode($array));

?>