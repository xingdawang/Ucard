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
    echo $_SESSION["manager_name"];
    ?> 登陆
</h2>
<form action="../Controllers/UserController.php" method="post" >
    <div align="left">
        <ul>
            <li><input type="radio" name="type" value="staff_lists">添加或修改联系人</li>
            <li><input type="radio" name="type" value="#">修改订单</li>
            <li><input type="radio" name="type" value="release_orders">下订单</li>
            <li><input type="radio" name="type" value="check_orders">查询订单</li>
            <li><input type="radio" name="type" value="manager_update">个人资料管理</li>
            <li><input type="radio" name="type" value="logout">注销</li>
        </ul>
    </div>
    <input type="hidden" name="manager_id" value="<?php echo $_SESSION['manager_id'];?>">
    <input type="submit" value="提交">
</form>
</body>
</html>