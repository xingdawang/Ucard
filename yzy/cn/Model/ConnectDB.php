<?php

/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/27/15
 * Time: 1:13 PM
 */
$connect = new ConnectDB();
class ConnectDB
{
    public function connectDB(){
        $mysqli = new mysqli("localhost", "root", "jingwen");
        $mysqli->select_db("yzy");
        if($mysqli->connect_errno) {
            die("Connect error: ". $mysqli->connect_error);
        }
        $mysqli->set_charset("utf8mb4");
        return $mysqli;
    }
}