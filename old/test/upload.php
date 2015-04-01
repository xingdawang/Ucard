<?php
$db_host="localhost"; // Host name 
$db_username="root"; // Mysql username 
$db_password="jingwen"; // Mysql password 
$db_name="ucard"; // Database name 
$tbl_name="UserInfo"; // Table name 


// Connect to server and select databse.
mysql_connect("$db_host", "$db_username", "$db_password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// username and password sent from form
$uuid=uniqid();
$email=$_POST['email'];
echo "1";
if(isset($_POST["submit"]))
{
echo "2";
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
	echo "3";
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            }
            //displayimage();
            function saveimage($name,$image)
            {
		echo "4";
                $con = mysql_connect("localhost","root","jingwen");
    mysql_select_db("ucard",$con);
    $sql = "INSERT INTO UserInfo (UUID, email, photo) VALUES ('$uuid','$uuid','$image');";
    $result = mysql_query($sql, $con);
    if($result) {
        echo "<br /> Image is uploaded";
    } else {
        echo "<br /> Image is  not uploaded";
    }
            }


?>
