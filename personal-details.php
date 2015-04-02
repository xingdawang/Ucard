<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Add more personal details
     */
    
    // Read nickname from the session
    session_start();
    $nickname = $_SESSION["nickname"];
    
    // Get data from the form
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];   // need time validation
    $sex = $_POST['sex'];
    $country = $_POST['country'];
    
    // To protect MySQL injection (more detail about MySQL injection)
    $firstName = stripslashes($firstName);
    $middleName = stripslashes($middleName);
    $lastName = stripslashes($lastName);
    $dateOfBirth = stripslashes($dateOfBirth);
    $sex = stripslashes($sex);
    $country = stripcslashes($country);
    
    // Connect to database
    include "connectDB.php";
    
    // find current user uuid
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT uuid FROM $tbl_name WHERE user_nickname = '$nickname'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $uuid = $row['uuid'];
    mysql_close();
    
    //Upload image to folder
    $target = "user-photo-icon/";       //this folder must have 777 privilage
    //$target = $target . basename( $_FILES["imageToUpload"]["name"]);
    $target = $target.basename($uuid);

    // Image Checking
    if($target == "user-photo-icon/"){
            echo "Please login again";
            echo '<meta content="3;/signin-rename.php" http-equiv="Refresh" />';
    }
    else {
        $filetype = $_FILES["imageToUpload"]["type"];
        if($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif") {
            echo "please select an image (jpg / png / gif)";
            echo '<meta content="3;/personal-details-rename.php" http-equiv="Refresh" />';
        }
        else {
            if($_FILES["imageToUpload"]["size"] > 500000){
                echo "Image is biger than 500K";
                echo '<meta content="3;/personal-details-rename.php" http-equiv="Refresh" />';
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
                echo "Update succeed";
            }     
        }
    }
    
    // Connect to database
    include "connectDB.php";
    $tbl_name="userinfo"; // Table name
    
    // Upadate data
    $sql = "UPDATE $tbl_name SET ".
    "first_name = '$firstName', ".
    "middle_name = '$middleName', ".
    "last_name = '$lastName', ".
    "date_of_birth = '$dateOfBirth', ".
    "sex = '$sex', ".
    "country = '$country', ".
    "user_icon = '$target'".
    "WHERE user_nickname = '$nickname'";
    mysql_query($sql);
    
    // After update the personal details, redirect to the Story page
    header('Location: http://www.baidu.com');
    mysql_close();

?>