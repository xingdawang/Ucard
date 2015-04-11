<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Get personal details
     */
    
    // Use for transfering json data
    $json_code = '';
    $json_message = '';
    $json_first_name = '';
    $json_middle_name = '';
    $json_last_name = '';
    $json_email = '';
    $json_house_number = '';
    $json_street = '';
    $json_city = '';
    $json_county = '';
    $json_postcode = '';
    $json_register_type = '';
    $json_third_party_uid = '';
    $json_date_of_birth = '';
    $json_sex = '';
    $json_country = '';
    
    // Read all personal information
    include "connectDB.php";
    $tbl_name = "userinfo";
    $nickname = $_GET['nickname'];
    $sql = "SELECT * FROM $tbl_name WHERE user_nickname = '$nickname'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    mysql_close();
    
    // Feedback result
    $json_first_name = $row['first_name'];
    $json_middle_name = $row['middle_name'];
    $json_last_name = $row['last_name'];
    $json_email = $row['email'];
    $json_house_number = $row['house_number'];
    $json_street = $row['street'];
    $json_city = $row['city'];
    $json_county = $row['county'];
    $json_postcode = $row['postcode'];
    $json_register_type = $row['register_type'];
    $json_third_party_uid = $row['third_party_uid'];
    $json_date_of_birth = $row['date_of_birth'];
    $json_sex = $row['sex'];
    $json_country = $row['country'];
    
    $array = Array('first_name'=>$json_first_name,
                   'middle_name'=>$json_middle_name,
                   'last_name'=>$json_last_name,
                   'email'=>$json_email,
                   'house_number'=>$json_house_number,
                   'street'=>$json_street,
                   'city'=>$json_city,
                   'county'=>$json_county,
                   'postcode'=>$json_postcode,
                   'register_type'=>$json_register_type,
                   'third_party_uid'=>$json_third_party_uid,
                   'date_of_birth'=>$json_date_of_birth,
                   'sex'=>$json_sex,
                   'country'=>$json_country
                   );
    die(json_encode($array));
?>