<!DOCTYPE html>

<html>
<head>
    <title>My account</title>
</head>

<body>
    <p>
	<b> Interface:</b><br>
        Two scripts to show all personal infermation.
	
    </p>
    <form action="signin.php" method="post">
        <hr>
            
            <?php
	    //If user have already logged in, show user nickname use this script
	    session_start();
	    if ($_SESSION["nickname"]){
		echo "user nickname: ".$_SESSION["nickname"]."<br>";
		echo "<a href='personal-details-rename.php'>Add more personal data</a>"."<br>";
		echo "<a href='my-account-rename.php'>See my account</a>"."<br>";
		echo "<a href='confirm-postcard-rename.php'>Confirm postcard</a>"."<br>";
		echo "<a href='signout.php'>Sign out</a>"."<br>";
	    }
	    ?>
            
	    <?php
                // Read all personal information
                include "connectDB.php";
                $tbl_name = "userinfo";
                $nickname = $_SESSION["nickname"];
                $sql = "SELECT * FROM $tbl_name WHERE user_nickname = '$nickname'";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);
                
                echo "<p> <font color='red'> All personal information: </font></p>";
                echo "Nickname: $nickname"."<br>";
                echo "Email: ".$row['email']."<br>";
                if($row['first_name'] != "") echo "First name: ".$row['first_name']."<br>";
                if($row['middle_name'] != "") echo "Middle name: ".$row['middle_name']."<br>";
                if($row['last_name'] != "") echo "Last name: ".$row['last_name']."<br>";
                if($row['date_of_birth'] != "") echo "Date of birth: ".$row['date_of_birth']."<br>";
                if($row['sex'] == "0") echo "Sex: girl"; else echo "Sex: boy"; echo "<br>";//0 girl; 1 boy
                echo "Registration time: ".$row['register_time']."<br>";
                if($row['user_icon'] != "") echo "User icon: <img src=".$row['user_icon']."><br>";
                
                mysql_close();
            ?>
            
            <?php
                // List all postcard
                include "connectDB.php";
                $tbl_name1 = "userinfo";
                $tbl_name2 = "postcard";
                $nickname = $_SESSION["nickname"];
                $sql = "SELECT * FROM $tbl_name2
                    INNER JOIN `$tbl_name1` WHERE `$tbl_name2`.`uuid` = `$tbl_name1`. `uuid` AND `$tbl_name1`. `user_nickname` = '$nickname'";
                $result = mysql_query($sql);
                echo "<p> <font color='red'> All Postcards: </font></p>";
                while($row = mysql_fetch_array($result)) {
                    echo "<img src=".$row['postcard_head']." width='400' height='200'><br>";
                    echo "Sender: ".$row['user_nickname']."<br>";
                    echo "Postcard ID:".$row['postcard_uid']."<br>";
                    
                    // get this postcard details
                    $tbl_name3 = "record";
                    $postcard_uid = $row['postcard_uid'];
                    $tempSql = "SELECT * FROM $tbl_name3 WHERE postcard_uid = $postcard_uid";
                    $tempResult = mysql_query($tempSql);
                    $tempRow = mysql_fetch_array($tempResult);
                    echo "Total Price: ".$tempRow['total_price']." cents <br>";
                    echo "From: ".$tempRow['original_country']." to ".$tempRow['destination_country']."<br>";
                    echo "Record time: ".$tempRow['record_time']."<br>";
                    if($tempRow['sharing_state'] == 1)
                        echo "Sharing state: Unshared <br>";
                    elseif($tempRow['sharing_state'] == 2)
                        echo "Sharing state: Receiver shared <br>";
                    
                }
                
            ?>
        <hr>
    </form>

</body>
</html>
