<!doctype html>

<html lang="en">
<head>
    <title>Sign up</title>
</head>
<body>
    <p>
	<b> Interface:</b><br>
	form action: signup.php <br>
        input E-mail name: email / type: email<br>
	input Nickname name: nickname / type: text<br>
	input Password name: password / type: password<br>
        input Password Confirm: name: passwordConfirm / type: password<br>
	input submit name: submit / type: submit<br><br>
        
	After user Register, re-direct to Story page, link is in signin.php line 55.<br>
        If failed re-direct to this page again in signin.php line 35 & 43. <br>
        page signin-rename.php line 32 link to this page <br>
        use script to check user input in this page between &lt;script&gt; and &lt;/script&gt;
	
    </p>
    <form action="signup.php" method="post" onsubmit="return checkForm(this);">
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
	    
            E-mail: <input type="email" name="email"><font color="red"> * </font><br />
            Nickname: <input type="text" name="nickname" placeholder="John"><font color="red"> * </font><br />
            Password: <input type="password" name="password" ><font color="red"> (6 digit with uppper and lower characters) * </font><br />
            Password Confirm: <input type="password" name="passwordConfirm"> <font color="red"> (Should be same as above) * </font><br />
            <input type="submit" name="submit" value="Ready"><br />
        <hr>
            
        <script type="text/javascript">
            
            // Password must be at least 6 length with upper and lower charaters
            function checkPassword(str) {
                var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
                return re.test(str);
            }
            
            function checkForm(form) {
                // Nickname should not be empty
                if(form.nickname.value == "") {
                    alert("Error: nickname cannot be blank!");
                    form.nickname.focus();
                    return false;
                  }
                
                // Nickname should be letters
                re = /^\w+$/;
                if(!re.test(form.nickname.value)) {
                    alert("Error: nickname must contain only letters, numbers and underscores!");
                    form.nickname.focus();
                    return false;
                }
                
                // Password & PasswordConfirm should be same
                if(form.password.value != "" && form.password.value == form.passwordConfirm.value) {
                    if(!checkPassword(form.password.value)) {
                        alert("Error: The password must contain 6 number, upper & lower characters!");
                        form.password.focus();
                        return false;
                    }
                } else {
                    alert("Error: Password do not match");
                    form.passwordConfirm.focus();
                    return false;
                }
                return true;
            }
        </script>
    </form>
   
</body>
</html>
