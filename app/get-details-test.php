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
    <form action="get-details.php" method="get">
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
            
	    Uuid: <input type="text" name="uuid"><br>
	    <input type="submit">
        <hr>
    </form>

</body>
</html>
