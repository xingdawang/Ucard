<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div align="center">
    <form action="../Controllers/OrderController.php" method="post">
        <p>查询订单</p><br>
        起始时间:<input type="date" name="start_date"><br>
        截止时间:<input type="date" name="end_date"><br>
        <br>
        <p>
            留空查询所有订单
        </p>
        <input type="hidden" name="type" value="check_orders">
        <input type="hidden" name="user_id" value="<?php session_start(); echo $_SESSION['user_id']; ?>">
        <input type="submit" value="确定"><br>
    </form>
</div>
</body>
</html>