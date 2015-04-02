<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  User login
     */
    

    // Username and password sent from form 
    $nicknameOrEmail=$_POST['nicknameOrEmail']; 
    $password=$_POST['password'];

    // To protect MySQL injection (more detail about MySQL injection)
    $nicknameOrEmail = stripslashes($nicknameOrEmail);
    $password = stripslashes($password);

    $password = md5(md5($password));

    // Connect database
    include "connectDB.php";

    // Check email and nickname
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE email = '$nicknameOrEmail' OR user_nickname = '$nicknameOrEmail'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) != 1) {
        echo "User not exist";
	echo '<meta content="3;/signin-rename.php" http-equiv="Refresh" />';
    }
    else {
        while($row = mysql_fetch_array($result)) {
            if($row['password'] == $password) {
                echo "Succeed";
            
		// Start Session
		session_start();
		$nickname = $row['user_nickname'];
		$_SESSION["nickname"] = "$nickname";
		$_SESSION["password"] = "$password";
		//header('Location: /Login/login.php');
		
		// Setup cookie
		// user name cookie
		$cookie_username = "ucard_user";
		$cookie_value = "$nickname";
		setcookie($cookie_username, $cookie_value, time() + (86400 * 30 * 6)); //86400 = 1 day
		// user password cookie
		$cookie_password = "ucard_password";
		$cookie_value = "$password";
		setcookie($cookie_password, $cookie_value, time() + (86400 * 30 * 6)); //86400 = 1 day
		
		//echo "Read From Cookie:";
		//echo $_COOKIE["$cookie_username"];
		
		// Redirect to Story page
		header('Location: http://www.baidu.com');
	    }
	    else {
		echo "Password is wrong";
		echo '<meta content="3;/signin-rename.php" http-equiv="Refresh" />';
	    }
    }
}
mysql_close();
?>