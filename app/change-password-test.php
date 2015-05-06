<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
</head>

<body>

    <form action="change-password.php" method="post" onsubmit="return checkForm(this);">
        <hr>
            Uuid: <input type="text" name="uuid"><br>
	    Password: <input type="password" name="password"><br>
            Password Confirm: <input type="password" name="passwordConfirm"><br>
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
