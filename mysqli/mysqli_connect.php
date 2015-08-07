<?php
    header('content-type:text/html; charset=utf-8');
    # 1.setup connection
    $mysqli = new mysqli("localhost", "root", "jingwen");
    $mysqli->select_db("sandbox");
    #$mysqli = new mysqli("localhost","host", "jingwen", "ucard");
    if($mysqli->connect_errno){
        die("Connect error: ". $mysqli->connect_error);
    }
    
    # 2. set charset
    $mysqli->set_charset("utf8");
    
    # 3. execute sql
    // Turn off autocommit
    $mysqli->autocommit(FALSE);
    
    $sql = "UPDATE account SET money=money-200 WHERE username='xingda'";
    $res1 = $mysqli->query($sql);
    $res1_affect = $mysqli->affected_rows;
    
    $sql = "UPDATE account SET money=money+200 WHERE username='wang'";
    $res2 = $mysqli->query($sql);
    $res2_affect = $mysqli->affected_rows;
    
    if($res1 && $res1_affect > 0 && $res2 && $res2_affect > 0){
        $mysqli->commit();
        echo "transfer succeed";
        $mysqli->autocommit(TRUE);
    } else {
        $mysqli->rollback();
        echo "transfer failed";
    }
    
    # 4. close database
    $mysqli->close();
?>