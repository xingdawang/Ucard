<?php
    /*
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    #$txt =$_POST;
    $txt = json_encode($_POST);
    fwrite($myfile, $txt);
    fclose($myfile);
    */
    
    /**
     * @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *  @date 20st Jul 2015
     *  Generate a record
     */
    
    $subjects = $_POST['subject'];
    $subject = explode("-", $subjects);
    $uuid = $subject[1];
    $record_id = $subject[2];
    $postcard_uid = $subject[3];
    $currency = "RMB";
    $transaction_id = $_POST['out_trade_no'];
    
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    #$txt =$_POST;
    $txt = $transaction_id;
    fwrite($myfile, $txt);
    fclose($myfile);
    
    $json_code = '';
    $json_message = '';
    $json_data = '';
    
    // Connect to database
    include "connectDB.php";
    $tbl_name = "record";
    $sql="SELECT * FROM $tbl_name WHERE record_uid = '$record_id'";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    
    if($num == 1){
        
        $sql = "UPDATE $tbl_name SET
        swift_number = '$transaction_id',
        payment_state = 1,
        currency = '$currency'
        WHERE record_uid = '$record_id'";
        mysql_query($sql);
        $json_code = 1000;
        $json_message = 'Transaction id updated succeed';
        
    } else {
        $json_code = 54;
        $json_message = 'Record id is not found';
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message, 'data'=>$json_data);
    die(json_encode($array));
?>