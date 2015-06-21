<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 1st May 2015
     */
    
    // Read nickname from the session
    //session_start();
    
    
    // Get data from the form
    // Post method
    $uuid = $_POST['uuid'];
    $json_code = "";
    $json_message = "";
    $json_data = "";
    
    // Connect to database
    include "connectDB.php";
  
    // find current user uuid to store photo snail icon
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT uuid FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    if($number == 1){
        
        //Upload image to folder
        $target = "../user-photo-icon/";       //this folder must have 777 privilage
        //$target = $target . basename( $_FILES["imageToUpload"]["name"]);
        $target = $target.basename($uuid).time().basename(".jpeg");
        
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
                $tbl_name="userinfo"; // Table name
                $sql = "UPDATE $tbl_name SET user_icon = '$target' WHERE uuid = '$uuid'";
                $result = mysql_query($sql);
                $json_code = 1000;
                $json_message = "Upload user snail icon succeed";
                $json_data = $target;
            }     
        }
        
    } else{
        $json_code = 23;
        $json_message = "User id is not found";
    }
    mysql_close();  
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));

?>