<!DOCTYPE html>

<html>
<head>
    <title>Sign in</title>
</head>

<body>
    <p>
	<b> Interface:</b><br>
	form action: signin.php <br>
	input Email / Nickname name: nicknameOrEmail / type: text<br>
	input password name: password / type: password<br><br>
	
	Add more personal details, this page, line 27. <br>
	After user successful login, re-direct to Story page, link is in signin.php line 58. <br>
	If failed re-direct to this page again in signin.php line 30 & 62. <br>
	
    </p>
    <form action="signin.php" method="post">
        <hr>
            <?php
	    //If user have already logged in, show user nickname use this script
	    session_start();
	    if ($_SESSION["nickname"]){
		echo "user nickname: ".$_SESSION["nickname"]."<br>";
		echo "<a href='personal-details-rename.php'>Add more personal data</a>"."<br>";
		echo "<a href='#'>See my account</a>"."<br>";
		echo "<a href='signout.php'>Sign out</a>"."<br>";
	    }
	    ?>
	    
	    <a href="#">Clike here to login with facebook (Wenqian's part)</a><br>
            Email / Nickname: <input type="text" name="nicknameOrEmail" required><br>
	    Password: <input type="password" name="password" required> <br>
	    <a href="forget-password-rename.php"><font color="red">Forget Password</font></a><br>
	    <a href="signup-rename.php"><font color="red">Do not have account</font></a><br>
	    <input type="submit">
        <hr>
    </form>

</body>
</html>
