<?php
    $db_host="localhost"; // Host name 
    $db_username="root"; // Mysql username 
    $db_password="jingwen"; // Mysql password
    
    mysql_connect("$db_host", "$db_username", "$db_password")or die("cannot connect"); 
    mysql_select_db("$db_name")or die("cannot select DB");

?>