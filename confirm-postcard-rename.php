<!DOCTYPE html>

<html>
<head>
    <title>Confrim Postcard</title>
</head>

<body>
    <p>
	<b> Interface:</b><br>
	form action: confirm-postcard.php <br>
        input Postcard ID: name: postcard_uid / type: text
        
        If the given postcard ID is not matched, to to this page again <br>
        If the given postcard ID is matched, give user the ability to shoose share postcard <br>
        if user shares the postcard successfully, go to story-rename.php on share-postcard.php line 21 <br>
        if user does not want to share this postcard, go to my-account-rename.php on confirm-postcard-rename.php line X <br>
        
	
    </p>
    <form action="confirm-postcard.php" method="post">
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
	    <p> Please enter the postcard ID </p>
	    Postcard ID: <input type="text" name="postcard_uid">
	    <input type="submit">
        <hr>
    </form>

</body>
</html>
