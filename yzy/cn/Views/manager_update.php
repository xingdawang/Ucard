<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人资料更新</title>
</head>
<body>
<div style="padding-left: 40%">
    <form action="../Controllers/UserController.php" method="post">
        <?php
        session_start();
        $user = $_SESSION['manager_details'];
        //var_dump($user);
        ?>
        <p>个人资料更新</p><br>
        用户名：<input type="text" name="name" value="<?php echo $user[0]['name']; ?>"><br>
        邮件地址:<input type="email" name="email" value="<?php echo $user[0]['email']; ?>" readonly>邮件不可更新<br>
        国家（英文）：<input type="text" name="country" value="<?php echo $user[0]['country']; ?>"><br>
        地区（英文）：<input type="text" name="district" value="<?php echo $user[0]['district']; ?>"><br>
        地址（英文）：<input type="text" name="address" value="<?php echo $user[0]['address']; ?>"><br>
        邮编：<input type="text" name="postcode" value="<?php echo $user[0]['postcode']; ?>"><br>
        电话：<input type="tel" name="tel" value="<?php echo $user[0]['tel']; ?>"><br>
        <input type="hidden" name="type" value="manager_update_confirmed">
        <input type="hidden" name="manager_id" value="<?php echo $_SESSION['manager_id'];?>">
        <input type="submit" value="更新"> &nbsp;
        <input type="button" value="返回主页" onclick="window.location.href='../Views/manager_home.php'">
    </form>
</div>
</body>
</html>