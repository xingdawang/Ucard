<?php
$db_host="localhost"; // Host name 
$db_username="root"; // Mysql username 
$db_password="jingwen"; // Mysql password 
$db_name="ucard"; // Database name 
$tbl_name="userinfo"; // Table name

// username and password sent from form 
$nicknameOrEmail=$_POST['nicknameOrEmail']; 
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$nicknameOrEmail = stripslashes($nicknameOrEmail);
$password = stripslashes($password);

$password = md5(md5($password));

// Connect to server and select databse.
//mysql_connect("$db_host", "$db_username", "$db_password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");

include "connectDB.php";
mysql_select_db("$db_name")or die("cannot select DB");

//Check email and nickname
$sql = "SELECT * FROM $tbl_name WHERE email = '$nicknameOrEmail' OR user_nickname = '$nicknameOrEmail'";
$result = mysql_query($sql);
if(mysql_num_rows($result) != 1)
    echo "User not exist";
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
            
            echo "Read From Cookie:";
            echo $_COOKIE["$cookie_username"];
        }
        else
            echo "Password is wrong";
    }
}
mysql_close();
?>