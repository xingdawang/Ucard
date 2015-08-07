<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h2>欢迎
    <?php
        session_start();
        echo $_SESSION["user_name"];
    ?> 登陆
    </h2>
    <form action="../Controllers/UserController.php" method="post" >
        <div align="left">
            <ul>
                <li><input type="radio" name="type" value="user_release_order">下订单</li>
                <li><input type="radio" name="type" value="check_orders">查询订单</li>
                <li><input type="radio" name="type" value="user_update">个人资料管理</li>
                <li><input type="radio" name="type" value="logout">注销</li>
            </ul>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
        <input type="submit" value="提交">
    </form>
</body>
</html>