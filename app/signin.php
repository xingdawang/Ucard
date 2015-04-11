<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  app user login
     */
    

    // Username and password sent from form
    // Post method
    //$nicknameOrEmail=$_POST['nicknameOrEmail'];
    //$password=$_POST['password'];
    // Get Method
    $nicknameOrEmail = $_GET['nicknameOrEmail'];
    $password=$_GET['password'];

    // To protect MySQL injection (more detail about MySQL injection)
    $nicknameOrEmail = stripslashes($nicknameOrEmail);
    $password = stripslashes($password);
    $password = md5(md5($password));
    
    // Use for transfering json data
    $json_code = '';
    $json_message = '';
    $json_data = '';

    // Connect database
    include "connectDB.php";

    // Check email and nickname
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE email = '$nicknameOrEmail' OR user_nickname = '$nicknameOrEmail'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) != 1) {
        //echo "User not exist";
	$json_code = 1;
	$json_message = 'User not exist';
	$json_data['uuid'] = '';
    }
    else {
        while($row = mysql_fetch_array($result)) {
            if($row['password'] == $password) {
                //echo "Succeed";
		$json_code = 1000;
		$json_message = 'Signin succeed';
		$json_data['uuid'] = $row['uuid'];
	    }
	    else {
		//echo "Password is wrong";
		$json_code = 2;
		$json_message = 'Password is wrong';
		$json_data['uuid'] = '';
	    }
	}
    }
    $array = Array('message'=>$json_message, 'code'=>$json_code, 'data'=>$json_data);
    die(json_encode($array));
    mysql_close();

?>