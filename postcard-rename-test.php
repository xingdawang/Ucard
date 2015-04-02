<!DOCTYPE html>

<html>
<head>
    <title>Postcard Test</title>
</head>

<body>
    <p>
	<b> Test page:</b><br>
	<b><h1>DO NOT NEED TO REFINE THIS PAGE</h1></b>
    </p>
    <form action="postcard-test.php"  method="post" enctype="multipart/form-data">
        <hr>
        <?php
	//If user have already logged in, show user nickname use this script
	 session_start();
	if ($_SESSION["nickname"]){
	    echo "user nickname: ".$_SESSION["nickname"]."<br><br>";
	    //echo "<a href='personal-details-rename.php'>Clik here to add more personal data</a>"."<br>";
        } else {
	    echo "<a href='signin-rename.php'>Clik here to add more personal data</a>"."<br>";
	}
	?>
	    
	<p>  imitate the procedure of upload a postcard, for app and backgound testing. </p>
	    
	<font color="red">App must send the user email as the key to upload information</font><br>
	<font color="red"> Email: <input type="email" name="email" required></font>
	<p>Postcard greetings & receiver address:</p>
	<textarea rows="20" cols="80" name="postcardBody" placeholder="Greetings: If I have been able to see further, it was only because I stood on the shoulders of giants."></textarea>
	<textarea rows="20" cols="40" name="receiverAddress" placeholder="Brookfield, Castletroy, Limerick, Ireland"></textarea><br>
	<p> These 2 images below is just for testing purpose, and app will store the images in our database, and user cannot find this procedure </p>
	<p> Image store format: user's uuid + timestamp + 5 bites random string. e.g. 551d6a5c3cf7f1427996790jshtD </p>
	<p> gif & png & jpeg are all accepted</p>
	<P> Resolution: 1240 x 1748 </P>
	<p> Postcard front side will store in folder called "postcard-front" </p>
	<p> Postcard back side will store in folder called "postcard-back" </p>
	Postcard front side: <input type="file" name="postcardFront"> <br>
	Posrcard back side:  <input type="file" name="postcardBack"> <br>
	
	<p>Below are option attributes that leave for future use:</p>
	Photo location: <input type="text" name="photoLocation"> <br>
	Postcard quotation: <input type="text" name="postcardQuotation"> <br>
	<input type="submit" value="OK">
    </form>
	    
        <hr>
    </form>

</body>
</html>
