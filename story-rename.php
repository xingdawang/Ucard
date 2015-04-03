<!DOCTYPE html>

<html>
<head>
    <title>Story</title>
</head>

<body>
    <p>
	<b> Interface:</b><br>
	post-like.php <br>
	comment.php <br>
	
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
		include"connectDB.php";
		
		// Read from record table to find which postcard is shared
		$tble_name = "record";
		$sql = "SELECT * FROM $tble_name WHERE sharing_state = 2";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)) {
		    
		    // Find this postcard in the postcard table
		    $tble_name = "postcard";
		    $postcard_uid = $row['postcard_uid'];
		    //echo "$postcard_uid";
		    $sql = "SELECT * FROM $tble_name WHERE postcard_uid = $postcard_uid";
		    $tempResult = mysql_query($sql);
		    $tempRow = mysql_fetch_array($tempResult);
		    echo "<img src=".$tempRow['postcard_head']." width='350' height='175'>";
		    echo "<a href='postlike.php'>Like</a> &nbsp";
		    echo "<a href='comment.php'>Comment</a>";
		}
	    ?>
        <hr>
    </form>

</body>
</html>
