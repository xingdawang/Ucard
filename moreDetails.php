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
                if(!getimagesize($_FILES["imageToUpload"]["tmp_name"])) {
                        echo "please select an image";
                }
                else {
                        if($_FILES["imageToUpload"]["size"] > 500000){
                                echo "Image is biger than 500K";
                        }
                        else {
                                move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target);
                                echo "Update succeed";
                        }     
                }
        }
        //echo $target;
        /*
        if (move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target)) {
            print "Received {$_FILES['imageToUpload']['name']} - its size is {$_FILES['imageToUpload']['size']}"."<br>";
        } else {
            print "Upload failed!";
        }
        */
        
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
