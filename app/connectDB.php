<?php

    /**
     *  @author Xingda Wang <wxd598113636@gmail.com>
     *  @since 1.0
     *
     *  Connect to databse
     */
    
    $db_host="localhost"; // Host name 
    $db_username="root"; // Mysql username 
    $db_password="jingwen"; // Mysql password
    $db_name="ucard"; // Database name
    
    mysql_connect("$db_host", "$db_username", "$db_password")or die("cannot connect");
    mysql_query("SET NAMES 'UTF8MB4'");
    mysql_select_db("$db_name")or die("cannot select DB");

?>