<?php

    /*
     *
     */
    // set session to transfer value
    session_start();
    
    $postcard_uid = $_POST['postcard_uid'];
    
    // Prevent xml injection
    $postcard_uid = stripcslashes($postcard_uid);
    
    // Calculate postcard_confirm_code
    $temp1 = md5($postcard_uid);
    $temp2 = substr($temp1,1,8);    // substring from char 1 - 9
    $postcard_confirm_code = md5($temp2);
    
    //Connect database
    include "connectDB.php";
    
    //Check postcard_confirm_code, if matched, go to my account page, else go to confirm postcard page
    $tble_name = "postcard";
    $sql = "SELECT * FROM $tble_name WHERE postcard_uid = $postcard_uid";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    if($row['postcard_confirm_code'] == $postcard_confirm_code) {
        echo "<p> Share this postcard? ";
        
        $_SESSION["postcard_uid"] = $postcard_uid;
        $_SESSION['postcard_receiver_id'] = $row['uuid'];
        echo "<a href='share-postcard.php'>Share</a>";
        echo "<a href='my-account-rename.php'> No </a>";
    } else {
        echo "Postcard ID do not find, please check it again";
        echo '<meta content="3;/confirm-postcard-rename.php" http-equiv="Refresh" />';
    }
    mysql_closed();
?>