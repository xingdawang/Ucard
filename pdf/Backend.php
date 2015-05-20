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
        $sql = "SELECT * FROM $tbl_name
        GROUP BY postcard_making_time
        ORDER BY postcard_making_time DESC";
        $result = mysql_query($sql);
        $i = 1;
        while($row = mysql_fetch_array($result)){
            
            #####################################
            echo "<hr>";
            echo $i++."<br>";
            echo "祝福:".$row['postcard_greeting']."<br>";
            echo "制作时间: ". $row['postcard_making_time']."<br>";
            ?>
            <form action="Backend_process.php" method="post">
                <input type="hidden" name="photo_head_url" value="<?php echo $row['postcard_head']; ?>">
                <input type="hidden" name="photo_back_url" value="<?php echo $row['postcard_back']; ?>">
                <input type="hidden" name="postcard_making_time" value="<?php echo $row['postcard_making_time']; ?>">
                <input type="submit">
            </form>
            <?php
            
            ######################################
        }
        mysql_close();    
    ?>
</body>
</html>

