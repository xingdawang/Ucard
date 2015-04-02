<!doctype html>

<html lang="en">
<head>
    <title>Find Password</title>
</head>
<body>
    <p>
	<b> Interface:</b><br>
	form action: forget-password.php <br>
	input Email  name: email / type: email<br>
	
	After user enter the email, send an email with the link to assis the user find password,<br>
	and re-direct to login page in forget-password.php line 12. <br>
        This page use the line in signin-rename.php line 31.
	
    </p>
    <form action="forget-password.php" method="post">
        <hr>
            Email: <input type="email" name="email" required><br>
	    <input type="submit">
        <hr>
    </form>
</body>
</html>
