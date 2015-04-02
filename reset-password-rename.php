<!DOCTYPE html>

<html>
<head>
    <title>Reset Password</title>
</head>

<body>
    <b> Interface:</b><br>
	form action: reset-password.php <br>
	input Email name: email / type: email <br>
	input Password name: password / type: password<br>
        input Password Confirm: name: passwordConfirm / type: password<br>
	input submit name: submit / type: submit<br><br>
	
	After user successful changed password, re-direct to Story page, link is in signin.php line XX. <br>
        use script to check user input in this page between &lt;script&gt; and &lt;/script&gt;
	
    </p>
    <form action="reset-password.php" method="post" onsubmit="return checkForm(this);">
        <hr>
	    Email: <input type="email" name="email"><br>
            Password: <input type="password" name="password" ><font color="red"> (6 digit with uppper and lower characters) * </font><br />
            Password Confirm: <input type="password" name="passwordConfirm"> <font color="red"> (Should be same as above) * </font><br />
	    <input type="submit">
        <hr>
        
        <script type="text/javascript">
            
            // Password must be at least 6 length with upper and lower charaters
            function checkPassword(str) {
                var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
                return re.test(str);
            }
            
            function checkForm(form) {
                
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
