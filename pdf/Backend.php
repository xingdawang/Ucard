<!DOCTYPE html>
<meta charset="utf-8" /> 
<html>
<head>
    <title>Page Title</title>
</head>

<body>
    <?php
    
        /**
         *  @author Xingda Wang <wxd598113636@gmail.com>
         *  @since 1.0
         *  @date 20th May 2015
         *  Generate a record
         */
        
        include"connectDB.php";
        $tbl_name = "postcard";
        $tbl_name1 = "record";
        $tbl_name2 = "userinfo";
        $sql = "SELECT * FROM $tbl_name
        LEFT JOIN $tbl_name1
        ON $tbl_name.postcard_uid = $tbl_name1.postcard_uid
        LEFT JOIN $tbl_name2
        ON $tbl_name.uuid = $tbl_name2.uuid
        WHERE $tbl_name1.payment_state = 1
        GROUP BY postcard_making_time
        ORDER BY postcard_making_time DESC";
        $result = mysql_query($sql);
        $i = 1;
        while($row = mysql_fetch_array($result)){
            
            #####################################
            echo "<hr>";
            echo $i++."<br>";
            echo "用户昵称: ".$row['user_nickname']."<br>";
            echo "用户邮箱 :".$row['email']."<br>";
            echo "明信片ID: ".$row['postcard_uid']."<br>";
            echo "祝福: ".$row['postcard_greeting']."<br>";
            echo "制作时间: ". $row['postcard_making_time']."<br>";
            echo "消费金额: ".$row['total_price']." ".$row['currency']."<br>";
            echo "寄出国家: ".$row['original_country']."<br>";
            echo "目的国家: ".$row['destination_country']."<br>";
            ?>
            <form action="Backend_process.php" method="post">
                <input type="hidden" name="photo_head_url" value="<?php echo $row['postcard_head']; ?>">
                <input type="hidden" name="photo_back_url" value="<?php echo $row['postcard_back']; ?>">
                <input type="hidden" name="postcard_making_time" value="<?php echo $row['postcard_making_time']; ?>">
                <input type="hidden" name="postcard_uid" value="<?php echo $row['postcard_uid']; ?>">
                <input type="submit">
            </form>
            <?php
            
            ######################################
        }
        mysql_close();    
    ?>
</body>
</html>

