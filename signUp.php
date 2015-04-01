<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Connect to databse
     */
    $tbl_name="userinfo"; // Table name
    
    // username and password sent from form
    $uuid=uniqid();
    $firstName=$_POST['firstName']; 
    $lastName=$_POST['lastName'];
    $middleName=$_POST['middleName'];
    $password=$_POST['signUp_password_input'];
    $email=$_POST['signUp_email_input'];
    $birthOfDate=$_POST['birthOfDate'];
    $country=$_POST['country'];
    $nickname=$_POST['signUp_name_input'];

    // To protect MySQL injection (more detail about MySQL injection)
    $firstName = stripslashes($firstName);
    $lastName = stripslashes($lastName);
    $middleName = stripslashes($middleName);
    $password = stripslashes($password);
    $email = stripslashes($email);
    $birthOfDate = stripslashes($birthOfDate);
    $nickname = stripcslashes($nickname);

    // Encrypt password
    $password = md5(md5($password));
    
    // Connect to server and select databse.
    include"connectDB.php";
    mysql_select_db("$db_name")or die("cannot select DB");
    
    // Check email
    $sql = "select * from $tbl_name where email='$email'";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    if($rowNumber != 0)
        echo "Email has been registered"."<br>";
    // Check nickname
    $sql = "select * from $tbl_name where user_nickname='$nickname'";
    $result = mysql_query($sql);
    $rowNumber = mysql_num_rows($result);
    if($rowNumber != 0)
        echo "Nick name has been registered"."<br>";
    else {
        $sql = "INSERT INTO $tbl_name (uuid, email, password, user_nickname) VALUES ('$uuid', '$email', '$password', '$nickname')";
        $retreve = mysql_query("$sql");
        echo "Register complete!";
        
    }
    mysql_close();


/**
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        
        $uploadOk = 1;
        // Store image into the image
        $imageName = mysql_real_escape_string($_FILES["imageToUpload"]["name"]);
        $imageData = mysql_real_escape_string(file_get_contents($_FILES["imageToUpload"]["tmp_name"]));
        $imageType = mysql_real_escape_string($_FILES["imageToUpload"]["type"]);
        //$sql="INSERT INTO $tbl_name (UUID, firstName, email, country, photo) VALUES ('$uuid','$firstName','$email', '$country', '$imageData')";
        $sql = "INSERT INTO $tbl_name (UUID, email, photo) VALUES ('$uuid','$uuid','$imageData');";
        $retval = mysql_query("$sql");
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// display all images
$sql = "SELECT * FROM $tbl_name";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    echo '<img height="300" weight="300" src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
}

// Limit image size below 5M, see more at: http://www.w3schools.com/php/php_file_upload.asp
if ($_FILES["imageToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
}

//$sql="INSERT INTO $tbl_name (UUID, firstName, email, country) VALUES ('$uuid','$firstName','$email', '$country')";


if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
*/
?>
<meta http-equiv="Refresh" content="3; index.php" />