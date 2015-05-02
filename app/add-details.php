<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Add more personal details
     */
    
    $json_code = "";
    $json_message = "";
    $json_data = "";
    
    
    // Get data from the form
    // Post method
    $uuid = $_GET['uuid'];
    $nickname = $_GET['nickname'];
    $firstName = $_GET['firstName'];
    $middleName = $_GET['middleName'];
    $lastName = $_GET['lastName'];
    $houseNumber = $_GET['houseNumber'];
    $street = $_GET['street'];
    $city = $_GET['city'];
    $county = $_GET['county'];
    $postcode = $_GET['postcode'];
    $registerType = $_GET['registerType'];
    $thirdPartyUid = $_GET['thirdPartyUid'];
    $dateOfBirth = $_GET['dateOfBirth'];   // need time validation
    $sex = $_GET['sex'];
    $country = $_GET['country'];

    // To protect MySQL injection (more detail about MySQL injection)
    $firstName = stripslashes($firstName);
    $middleName = stripslashes($middleName);
    $lastName = stripslashes($lastName);
    $houseNumber = stripcslashes($houseNumber);
    $street = stripslashes($street);
    $city = stripslashes($city);
    $county = stripslashes($county);
    $postcode = stripslashes($postcode);
    $registerType = stripslashes($registerType);
    $thirdPartyUid = stripslashes($thirdPartyUid);
    $dateOfBirth = stripslashes($dateOfBirth);
    $sex = stripslashes($sex);
    $country = stripcslashes($country);
    
    // Connect to database
    include "connectDB.php";

       
    // find current user uuid to store photo snail icon
    $tbl_name="userinfo"; // Table name
    $sql = "SELECT * FROM $tbl_name WHERE uuid = '$uuid'";
    $result = mysql_query($sql);
    $number = mysql_num_rows($result);
    
    if($number == 1){
        
        //User nickname is unique
        $tbl_name = "userinfo";
        $sql = "SELECT * FROM $tbl_name WHERE user_nickname = $nickname";
        $result_nickname = mysql_query($sql);
        $number_nickname = mysql_num_rows($result_nickname);
        if($number_nickname == 0) {
            //echo $number_nickname;
            $sql = "UPDATE $tbl_name SET user_nickname = $nickname WHERE uuid = '$uuid'";
            mysql_query($sql);
        } else {
            $json_code = 8;
            $json_message = "Nickname is exist, other info can be updated";    
        }
        
        // Sex 0 for girl, 1 for boy
        if($sex == "girl")
            $sex = 0;           //girl
        else
            $sex = 1;           //boy
        $sql = "UPDATE $tbl_name SET sex = $sex WHERE uuid = '$uuid'";
        mysql_query($sql);

        // Update other info except nickname, sex
        if($firstName != "") writeToDatabase('first_name', $firstName, $uuid);
        if($lastName != "") writeToDatabase('last_name', $lastName, $uuid);
        if($middleName != "") writeToDatabase('middle_name', $middleName, $uuid);
        if($houseNumber != "") writeToDatabase('house_number', $houseNumber, $uuid);
        if($street != "") writeToDatabase('street', $street, $uuid);
        if($city != "") writeToDatabase('city', $city, $uuid);
        if($county != "") writeToDatabase('county', $county, $uuid);
        if($country != "") writeToDatabase('country', $country, $uuid);
        if($postcode != "") writeToDatabase('postcode', $postcode, $uuid);
        if($registerType != "") writeToDatabase('register_type', $registerType, $uuid);
        if($thirdPartyUid != "") writeToDatabase('third_party_uid', $thirdPartyUid, $uuid);
        if($dateOfBirth != "") writeToDatabase("date_of_birth", $dateOfBirth, $uuid);
        if($json_code != 8) {
            $json_code = 1000;
            $json_message = "Update personal information(include nickname)";
        }
        
    }else {
        $json_code = 5;
        $json_message = "User id is not found";
    }
    mysql_close();

    function writeToDatabase($databaseItem,$varable, $uuid) {
        include "connectDB.php";
        $tbl_name="userinfo"; // Table name
        $sql = "UPDATE $tbl_name SET $databaseItem = '$varable' WHERE uuid = '$uuid'";
        mysql_query($sql);
        mysql_close();
    }
    
    $array = Array('code'=>$json_code, 'message'=>$json_message );
    die(json_encode($array));

?>