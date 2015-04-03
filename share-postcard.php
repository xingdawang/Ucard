<?php
    /**
     *
     */
    
    // Set session to receive postcard_uid
    session_start();
    $postcard_uid = $_SESSION['postcard_uid'];
    $postcard_receiver_id = $_SESSION['postcard_receiver_id'];
    echo $postcard_uid."<br>";
    echo $postcard_receiver_id;
    
    // Connect database
    include "connectDB.php";
    
    // Update postcard sharing_state in record table
    $tble_name = "record";
    $sql = "UPDATE $tble_name SET sharing_state = 2 WHERE postcard_uid = '$postcard_uid' AND uuid = '$postcard_receiver_id'";
    mysql_query($sql);
    
    mysql_close();
    echo '<meta content="0;/story-rename.php" http-equiv="Refresh" />';
?>