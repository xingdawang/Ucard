<?php

/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/30/15
 * Time: 11:09 AM
 */

/*
$string = '\u65e5\u672c\u5272\u70f9\u5473\u564c-500g';

$foo = 'This is my test string \u03b50';
echo unicode2html($string);

function unicode2html($string) {
    return preg_replace('/\\\\u([0-9a-z]{4})/', '&#x$1;', $string);
}
*/

class ConnectDB
{
    public function connectBD (){
        $mysqli = new mysqli("77.245.78.162", "pdause", "Chinesh8_xiaohua951@");
        $mysqli->select_db("superopencart2015");
        //$mysqli = new mysqli("localhost", "root", "jingwen");
        //$mysqli->select_db("sandbox");
        $mysqli->set_charset("utf8");
        if($mysqli->connect_errno) {
            die("Connect error: ". $mysqli->connect_error);
        }
        return $mysqli;
    }
}
