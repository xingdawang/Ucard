<?php
        session_start();
        $nickname = $_SESSION["nickname"];
        //echo $nickname;
        $db_host="localhost"; // Host name 
        $db_username="root"; // Mysql username 
        $db_password="jingwen"; // Mysql password 
        $db_name="ucard"; // Database name 
        $tbl_name="userinfo"; // Table name

        // Connect to server and select databse.
        mysql_connect("$db_host", "$db_username", "$db_password")or die("cannot connect"); 
        mysql_select_db("$db_name")or die("cannot select DB");
        
        // find current user uuid
        $sql = "SELECT uuid FROM $tbl_name WHERE user_nickname = '$nickname'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        $uuid = $row['uuid'];
    
        //Upload image to folder
        $target = "user_photo_icon/";       //this folder must have 777 privilage
        //$target = $target . basename( $_FILES["imageToUpload"]["name"]);
        $target = $target.basename($uuid);
        //echo "$target";
        if($target == "user_photo_icon/"){
                echo "Please login again"; 
        }
        else {
                $filetype = $_FILES["imageToUpload"]["type"];
                if($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif") {
                        echo "please select an image (jpg / png / gif)";
                }
                else {
                        if($_FILES["imageToUpload"]["size"] > 600000){
                                echo "Image is biger than 500K";
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
        
        // Write link into the database
        $sql = "UPDATE $tbl_name SET user_icon = '$target' WHERE uuid = '$uuid'";
        mysql_query($sql);
        
        // Display image from the stored path
        echo "<br>Display image <br>";
        $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        echo "<img src=".$row['user_icon'].">";
        mysql_close();
?>
