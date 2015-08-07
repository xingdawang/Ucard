<?php

/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/31/15
 * Time: 12:46 PM
 */

$product = new Product();
$product->getParam($_POST);
$result = $product->updateProduct();
$product->JSONfy($result);
class Product {

    private $upc;
    private $price;
    private $status;
    private $name;
    private $stock_status_id;
    private $weight_class_id;
    private $db;
    private $connect;

    function __construct(){
        require_once("mysqli.php");
        $this->db = new ConnectDB();
        $this->connect = $this->db->connectBD();
    }

    public function getParam($array){
        $this->upc = $array['upc'];
        $this->price = $array['price'];
        $this->status = $array['status'];
        $this->name = $array['name'];
        $this->stock_status_id = $array['stock_status_id'];
        $this->weight_class_id = $array['weight_class_id'];
    }

    public function updateProduct(){
        $sql = "SELECT count(*) FROM oc_product WHERE upc = $this->upc";
        $result = $this->connect->query($sql);
        $number = $result->fetch_assoc();
        if(!($number['count(*)'] == "1")){
            $result = false;
        }
        else {
            $sql = "UPDATE oc_product, oc_product_description SET
                oc_product.price = $this->price,
                oc_product.status = $this->status,
                oc_product.stock_status_id = $this->stock_status_id,
                oc_product.weight_class_id = $this->weight_class_id,
                oc_product_description.name = '$this->name'
                WHERE oc_product.product_id = oc_product_description.product_id
                AND oc_product.upc = $this->upc";
            $result = $this->connect->query($sql);
        }
        return $result;
    }

    public function JSONfy($result){
        if($result){
            $array = Array('code'=>1000, 'message'=>"user info update succeed", 'data'=>$this->upc);
            die(json_encode($array));
        } else{
            $array = Array('code'=>1, 'message'=>"user info update failed, upc match failed", 'data'=>$this->upc);
            die(json_encode($array));
        }
    }
}