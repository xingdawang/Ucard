<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="../Controllers/OrderController.php" method="post">
    <div align="center">
        <p>订单列表</p><br>
        <?php
        session_start();
        $lists = $_SESSION['user_order_list'];
        //var_dump($lists);
        ?>
        <table align="center" cellpadding="5" border="1">
            <tr>
                <td>订单号号</td>
                <td>货运单号</td>
                <td>寄出人姓名</td>
                <td>运输方式</td>
                <td>物品总称</td>
                <td>下单时间</td>
                <td>收件人</td>
                <td>目的地</td>
                <td>订单详情</td>
            </tr>
            <?php
            foreach($lists as $item){
                echo "<tr>";
                echo "<td>".$item['transaction_id']."</td>";
                echo "<td>".$item['transport_id']."</td>";
                echo "<td>".$item['manager_name']."</td>";
                echo "<td>".$item['CNV']."</td>";
                echo "<td>".$item['box_name']."</td>";
                echo "<td>".$item['order_time']."</td>";
                echo "<td>".$item['user_name']."</td>";
                echo "<td>".$item['user_chinese_address']."</td>";
                ?>
                <td>
                    <input type='radio' name='print_id' value='<?php echo $item['id'];?>'>
                    <input type='hidden' name='type' value='print'>
                </td>
                <?php
                echo "</tr>";
            }
            ?>
        </table>
        <hr>
        <?php
            if($lists != null)
                echo "<input type='submit' value='查看订单详情'>";
        ?>
    </div>
</form>
</body>
</html>