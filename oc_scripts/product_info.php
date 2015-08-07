<?php
header('Content-type: text/html; charset=utf-8');
/**
 * Get product info by checking upc field in oc_product table
 * User: xingda
 * Date: 7/30/15
 * Time: 10:55 AM
 */
//0369922829
$product_info = new product_info();
$product_info->getUPC($_POST['upc']);
$result = $product_info->getProductInfo();
$product_info->JSONfy($result);

class product_info
{
    private $upc;
    private $db;
    private $connect;

    function __construct(){
        require_once("mysqli.php");
        $this->db = new ConnectDB();
        $this->connect = $this->db->connectBD();
    }

    public function getProductInfo(){
        $sql = "SELECT
                       oc_product.upc,
                       oc_product.status,
                       oc_product.price,
                       oc_product.weight_class_id,
                       oc_product.stock_status_id,
                       oc_product_description.name
                FROM oc_product
                LEFT JOIN oc_product_description
                ON oc_product.product_id = oc_product_description.product_id
                WHERE oc_product.upc LIKE '%$this->upc%'";
        $result = $this->connect->query($sql);
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        //return mb_detect_encoding($rows, "auto");
        return $rows;
    }

    public function getUPC($upc){
        $this->upc = $upc;
    }

    public function JSONfy($result){
        $array = Array('code'=>1000, 'message'=>"information get succeed", 'data'=>$result);
        die(json_encode($array));
    }
}