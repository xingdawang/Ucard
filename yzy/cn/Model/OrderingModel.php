<?php

/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/28/15
 * Time: 10:33 AM
 */
class Ordering
{
    private $db;
    private $mysqli;

    function __construct() {
        require_once("ConnectDB.php");
        $this->db = new ConnectDB();
        $this->mysqli = $this->db->connectDB();
    }

    public function addOrder($array){
        $manager_id= $array['manager_id'];
        $manager_name = $array['manager_name'];
        $manager_tel = $array['manager_address'];
        $manager_postcode = $array['manager_postcode'];
        $manager_email = $array['manager_email'];
        $user_id = $array['user_id'];
        $user_name = $array['user_name'];
        $user_tel = $array['user_tel'];
        $user_chinese_address = $array['user_chinese_address'];
        $user_address = $array['user_address'];
        $user_postcode = $array['user_postcode'];
        $user_email = $array['user_email'];
        $CNV = $array['CNV'];
        $card_no = $array['card_no'];
        $get_time = $array['get_time'];
        $box_name = $array['box_name'];
        $content = $array['content'];
        $transaction_id = uniqid();
        $sql = "INSERT INTO orders (manager_id, manager_name,manager_tel, manager_postcode, manager_email,
          user_id, user_name, user_tel, user_chinese_address, user_address, user_postcode, user_email, CNV,
          card_no, get_time, box_name, transaction_id, content ) VALUES
          ('$manager_id', '$manager_name','$manager_tel','$manager_postcode', '$manager_email', '$user_id',
          '$user_name', '$user_tel', '$user_chinese_address', '$user_address', '$user_postcode', '$user_email',
          '$CNV', '$card_no', '$get_time', '$box_name', '$transaction_id', '$content')";
        //var_dump($array);
        $result = $this->mysqli->query($sql);
        //var_dump($result);
        mysqli_close();
        return $this->mysqli->insert_id;
    }

    public function addBox1($array, $order_id)
    {
        if ($array['box1_price'] != null && $array['box1_weight'] != null) {
            $box_price = $array['box1_price'];
            $box_weight = $array['box1_weight'];
            $box_type = $array['box1_type'];
            $box_length = $array['boxC1'];
            $box_width = $array['boxK1'];
            $box_height = $array['boxG1'];
            $insurance_type = $array['BxType'];
            $insurance_money = $array['BxMoney'];
            $sql = "INSERT INTO box (order_id, price, weight, length, width, height, type, insurance_type, insurance_money)
                VALUES ('$order_id', '$box_price','$box_weight','$box_length','$box_width', '$box_height','$box_type',
                '$insurance_type', '$insurance_money')";
            $this->mysqli->query($sql);
            mysqli_close();
            return $this->mysqli->insert_id;
        }
    }

    public function addBox2($array, $order_id)
    {
        if ($array['box2_price'] != null && $array['box2_weight'] != null) {
            $box_price = $array['box2_price'];
            $box_weight = $array['box2_weight'];
            $box_type = $array['box2_type'];
            $box_length = $array['boxC2'];
            $box_width = $array['boxK2'];
            $box_height = $array['boxG2'];
            $insurance_type = $array['BxType'];
            $insurance_money = $array['BxMoney'];
            $sql = "INSERT INTO box (order_id, price, weight, length, width, height, type, insurance_type, insurance_money)
                VALUES ('$order_id', '$box_price','$box_weight','$box_length','$box_width', '$box_height','$box_type',
                '$insurance_type', '$insurance_money')";
            $this->mysqli->query($sql);
            mysqli_close();
            return $this->mysqli->insert_id;
        }
    }
    public function addBox3($array, $order_id){
        if($array['box3_price'] != null && $array['box3_weight'] != null) {
            $box_price = $array['box3_price'];
            $box_weight = $array['box3_weight'];
            $box_type = $array['box3_type'];
            $box_length = $array['boxC3'];
            $box_width = $array['boxK3'];
            $box_height = $array['boxG3'];
            $insurance_type = $array['BxType'];
            $insurance_money = $array['BxMoney'];
            $sql = "INSERT INTO box (order_id, price, weight, length, width, height, type, insurance_type, insurance_money)
                VALUES ('$order_id', '$box_price','$box_weight','$box_length','$box_width', '$box_height','$box_type',
                '$insurance_type', '$insurance_money')";
            $this->mysqli->query($sql);
            mysqli_close();
            return $this->mysqli->insert_id;
        }
    }

    public function addContent1($array, $box_id)
    {
        if ($array['box1_price'] != null && $array['box1_weight'] != null) {
            //box content
            $box11 = $array['Box1N1'];
            $box12 = $array['Box1S1'];
            $box13 = $array['Box1K1'];
            $box14 = $array['Box1J1'];
            $box21 = $array['Box1N2'];
            $box22 = $array['Box1S2'];
            $box23 = $array['Box1K2'];
            $box24 = $array['Box1J2'];
            $box31 = $array['Box1N3'];
            $box32 = $array['Box1S3'];
            $box33 = $array['Box1K3'];
            $box34 = $array['Box1J3'];
            $box41 = $array['Box1N4'];
            $box42 = $array['Box1S4'];
            $box43 = $array['Box1K4'];
            $box44 = $array['Box1J4'];
            $box51 = $array['Box1N5'];
            $box52 = $array['Box1S5'];
            $box53 = $array['Box1K5'];
            $box54 = $array['Box1J5'];
            if ($box11 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box11', '$box12', '$box13','$box14')";
                $this->mysqli->query($sql);
            }
            if ($box21 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box21', '$box22', '$box23','$box24')";
                $this->mysqli->query($sql);
            }
            if ($box31 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box31', '$box32', '$box33','$box34')";
                $this->mysqli->query($sql);
            }
            if ($box41 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box41', '$box42', '$box43','$box44')";
                $this->mysqli->query($sql);
            }
            if ($box51 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box51', '$box52', '$box53','$box54')";
                $this->mysqli->query($sql);
            }
        }
    }
    public function addContent2($array, $box_id)
    {
        if ($array['box2_price'] != null && $array['box2_weight'] != null) {
            //box content
            $box11 = $array['Box2N1'];
            $box12 = $array['Box2S1'];
            $box13 = $array['Box2K1'];
            $box14 = $array['Box2J1'];
            $box21 = $array['Box2N2'];
            $box22 = $array['Box2S2'];
            $box23 = $array['Box2K2'];
            $box24 = $array['Box2J2'];
            $box31 = $array['Box2N3'];
            $box32 = $array['Box2S3'];
            $box33 = $array['Box2K3'];
            $box34 = $array['Box2J3'];
            $box41 = $array['Box2N4'];
            $box42 = $array['Box2S4'];
            $box43 = $array['Box2K4'];
            $box44 = $array['Box2J4'];
            $box51 = $array['Box2N5'];
            $box52 = $array['Box2S5'];
            $box53 = $array['Box2K5'];
            $box54 = $array['Box2J5'];
            if ($box11 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box11', '$box12', '$box13','$box14')";
                $this->mysqli->query($sql);
            }
            if ($box21 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box21', '$box22', '$box23','$box24')";
                $this->mysqli->query($sql);
            }
            if ($box31 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box31', '$box32', '$box33','$box34')";
                $this->mysqli->query($sql);
            }
            if ($box41 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box41', '$box42', '$box43','$box44')";
                $this->mysqli->query($sql);
            }
            if ($box51 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box51', '$box52', '$box53','$box54')";
                $this->mysqli->query($sql);
            }
        }
    }
    public function addContent3($array, $box_id)
    {
        if ($array['box3_price'] != null && $array['box3_weight'] != null) {
            //box content
            $box11 = $array['Box3N1'];
            $box12 = $array['Box3S1'];
            $box13 = $array['Box3K1'];
            $box14 = $array['Box3J1'];
            $box21 = $array['Box3N2'];
            $box22 = $array['Box3S2'];
            $box23 = $array['Box3K2'];
            $box24 = $array['Box3J2'];
            $box31 = $array['Box3N3'];
            $box32 = $array['Box3S3'];
            $box33 = $array['Box3K3'];
            $box34 = $array['Box3J3'];
            $box41 = $array['Box3N4'];
            $box42 = $array['Box3S4'];
            $box43 = $array['Box3K4'];
            $box44 = $array['Box3J4'];
            $box51 = $array['Box3N5'];
            $box52 = $array['Box3S5'];
            $box53 = $array['Box3K5'];
            $box54 = $array['Box3J5'];
            if ($box11 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box11', '$box12', '$box13','$box14')";
                $this->mysqli->query($sql);
            }
            if ($box21 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box21', '$box22', '$box23','$box24')";
                $this->mysqli->query($sql);
            }
            if ($box31 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box31', '$box32', '$box33','$box34')";
                $this->mysqli->query($sql);
            }
            if ($box41 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box41', '$box42', '$box43','$box44')";
                $this->mysqli->query($sql);
            }
            if ($box51 != "") {
                $sql = "INSERT INTO content (box_id, name, number, weight, price) VALUES
              ('$box_id', '$box51', '$box52', '$box53','$box54')";
                $this->mysqli->query($sql);
            }
        }
        mysqli_close();
    }

    public function checkManagerOrders($array){
        $start_date = $array['start_date'];
        $end_date = $array['end_date'];
        if($start_date == "")
            $start_date = "1000-01-01";
        if($end_date == "")
            $end_date = "5000-01-01";
        $manager_id = $_SESSION['manager_id'];
        $sql = "SELECT * FROM orders WHERE order_time
                BETWEEN '$start_date' AND '$end_date'
                AND manager_id = '$manager_id' OR manager_id = 0";
        $result_set = $this->mysqli->query($sql);
        while($result = $result_set->fetch_assoc())
            $results[] = $result;
        //var_dump($results);
        return $results;
    }

    public function getOrderDetails($array){
        $order_id = $array['print_id'];
        $sql = "SELECT * FROM orders WHERE id = '$order_id'";
        $result = $this->mysqli->query($sql);
        return $result->fetch_assoc();
    }

    public function getBoxDetails($array){
        $order_id = $array['print_id'];
        $sql = "SELECT * FROM box WHERE order_id = '$order_id'";
        $result = $this->mysqli->query($sql);
        return $result->fetch_assoc();
    }

    public function getOrderWeight($array){
        $order_id = $array['print_id'];
        $sql = "SELECT SUM(content.weight) FROM orders
                LEFT JOIN box ON box.order_id = orders.id
                LEFT JOIN content ON box.id = content.box_id
                WHERE orders.id = '$order_id'";
        $result = $this->mysqli->query($sql);
        $weight = $result->fetch_array();
        return $weight['SUM(content.weight)'];
    }

    public function getOrderPrice($array){
        $order_id = $array['print_id'];
        $sql = "SELECT SUM(content.price) FROM orders
                LEFT JOIN box ON box.order_id = orders.id
                LEFT JOIN content ON box.id = content.box_id
                WHERE orders.id = '$order_id'";
        $result = $this->mysqli->query($sql);
        $price = $result->fetch_array();
        return $price['SUM(content.price)'];
    }
}