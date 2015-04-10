<?php
	$code;
	$data;
	$message;
	
	$user_nickname = $_POST['user'];
	$password = $_POST['password'];
	
	if ($user_nickname == 'aaa' && $password == 'bbb') {
		$code = 0;
		$data = 'Connection Succeed';
	} else {
		$code = 10001;
		$message = '用户名或密码错误';
	}
	$array = Array('message'=>$message, 'code'=>$code, 'data'=>$data);
	//die(json_encode($array);
	json_encode($array);
?>
