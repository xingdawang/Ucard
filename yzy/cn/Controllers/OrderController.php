<?php
echo "<meta charset='UTF-8'>";
/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/28/15
 * Time: 12:24 PM
 */
$array = $_POST;
$type = $array['type'];
require_once("../Model/OrderingModel.php");
$order = new Ordering();
if($type == "selectOrder"){
    //var_dump($array);
    $manager_id = $array['manager_id'];
    $user_id = $array['user_id'];
    if($manager_id == null ||$user_id == null){
        echo "sender or receiver is not selected<br>";
        echo "reset in 3 seconds"."<br>";
        echo '<meta content="3; ../Views/ordering.php" http-equiv="Refresh" />';
    } else{
        // Setup session
        session_start();
        $_SESSION['manager_id'] = $manager_id;
        $_SESSION['user_id'] = $user_id;
        header('Location: ../Views/ordering_peo_preview.php');
    }
} elseif($type == "people_confirm"){
    session_start();
    $_SESSION['confirmed_people'] = $array;
    //var_dump($array);
    header('Location: ../Views/add_box.php');
} elseif ($type == "order_preview"){
    session_start();
    $_SESSION['order_details'] = $array;
    //var_dump($array);
    //var_dump($_SESSION['confirmed_people']);
    header('Location: ../Views/confirm_order.php');
} elseif($type == "confirmed_order") {
    var_dump($array);

    $order_id = $order->addOrder($array);
    var_dump($order_id);
    if($array['box1_price'] != null && $array['box1_weight'] != null){
        $box_id = $order->addBox1($array, $order_id);
        //var_dump($box_id);
        $order->addContent1($array,$box_id);
    }
    if($array['box2_price'] != null && $array['box2_weight'] != null){
        $box_id = $order->addBox2($array, $order_id);
        //var_dump($box_id);
        $order->addContent2($array,$box_id);
    }
    if($array['box3_price'] != null && $array['box3_weight'] != null){
        $box_id = $order->addBox3($array, $order_id);
        //var_dump($box_id);
        $order->addContent3($array,$box_id);
    }

    echo "下单成功<br>";
    if($_SESSION['manager_id'] == null){
        echo '<meta content="3; ../Views/home.php" http-equiv="Refresh" />';
    }else {
        echo '<meta content="3; ../Views/manager_home.php" http-equiv="Refresh" />';
    }
} elseif($type == "check_orders") {
    session_start();
    $result = $order->checkManagerOrders($array);
    //var_dump($result);
    $_SESSION['manager_order_list'] = $result;
    header('Location: ../Views/orders_list.php');
} elseif($type == "print"){
    session_start();
    $_SESSION['print_order'] = $order->getOrderDetails($array);
    $_SESSION['print_order_box'] = $order->getBoxDetails($array);
    $_SESSION['weight'] = $order->getOrderWeight($array);
    $_SESSION['price'] = $order->getOrderPrice($array);
    header('Location: ../Views/print_order.php');
}