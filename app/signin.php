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
    $email = $_POST['email'];
    $password=$_POST['password'];

    $password = md5(md5($password));
    //echo $password;
    
    // Use for transfering json data
    $json_code = '';
    $json_message = '';
    $json_data = '';

    // Connect database
    include "connectDB.php";
    // Check email and nickname
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE email = '$email'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) != 1) {
        //echo "User not exist";
	$json_code = 1;
	$json_message = 'Cannot signin, user not exist';
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
		$json_message = 'Cannot signin, password is wrong';
		$json_data['uuid'] = '';
	    }
	}
    }
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
    mysql_close();

?>