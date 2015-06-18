<?php
    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 3rd May 2015
     */
    
    $uuid = $_POST['uuid'];
    $json_data = "";
    $json_message = "";
    $json_code = "";
    
    $password = md5(md5($password));
    // Connect to server and select databse.
    include"connectDB.php";
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    // Check whether this user is exist
    if($number == 1) {
	
	$tbl_name = "postcard";
        $tbl_name1 = "record";
        $sql = "SELECT * FROM $tbl_name
	LEFT JOIN $tbl_name1 ON $tbl_name.postcard_uid = $tbl_name1.postcard_uid
	WHERE $tbl_name1.uuid = '$uuid'";
        $result = mysql_query($sql);
	$number_postcard = mysql_num_rows($result);
	
	// Check whether this user has post a postcard
	if($number_postcard != 0){
		
	    // Get postcard head image
	    $tbl_name = "postcard";
	    $tbl_name1 = "record";
	    //$postcard_uid = $row['postcard_uid'];
	    $sql = "SELECT *
	    FROM $tbl_name
	    LEFT JOIN $tbl_name1 ON $tbl_name.postcard_uid = $tbl_name1.postcard_uid
	    WHERE $tbl_name.uuid = '$uuid' AND $tbl_name1.payment_state = 1
	    ORDER BY $tbl_name.postcard_making_time DESC";
	    $result_postcard = mysql_query($sql);
	    while($row = mysql_fetch_array($result_postcard)) {
		$json_data_array[] = array(
		    'postcard_id' => $row[0],
		    'postcard_head' => $row['postcard_head']
		);
	    }
	    $json_code = 1000;
	    $json_message = "Sending list returned";
	} else{
	    $json_code = 45;
	    $json_message = "This user has not posted a postcard ";
	}
    }else {
        $json_code = 28;
        $json_message = "User id is not exist";
    }
    mysql_close();
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data_array);
    die(json_encode($array));

?>