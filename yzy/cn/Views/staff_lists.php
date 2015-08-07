<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单</title>
</head>
<body>
<div align="center">
    <h2>在线下单</h2>
    <hr>
    <form action="../Controllers/UserController.php" method="post">
        <table style="width:60%">
            <td width="49%" valign="top">
                <table width="99%" border="0" align="left"cellpadding="3" cellspacing="0" bgcolor="#ffffff" >
                    <tr>
                        <td height="30" align="left" bgcolor="#f1f1f1" class="Font0">我的发货人信息</td>
                    </tr>
                    <?php
                    require_once("../Model/UserModel.php");
                    $users = new User();
                    $all_managers = $users->loadManagers();
                    foreach($all_managers as $manager){

                        echo "<tr>";
                        echo "<td>";
                        echo $manager['name'] ." (". $manager['tel']. ")";
                        $manager_id = $manager['id'];
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <input type="radio" name="manager_id" value="<?php echo $manager_id['id']?>">
                        <?php

                        echo "</td>";
                        echo "</tr>";

                    }
                    ?>
                </table>
            </td>
            <td width="49%" valign="top">
                <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#ffffff">
                    <tr>
                        <td height="30" align="left" bgcolor="#f1f1f1" class="Font0">我的收货人信息</td>
                    </tr>
                    <?php
                    require_once("../Model/UserModel.php");
                    $users = new User();
                    $all_users = $users->loadUsers();
                    foreach($all_users as $user){

                        echo "<tr>";
                        echo "<td>";
                        echo $user['name'] ." (". $user['tel']. ")";
                        echo "</td>";
                        echo "<td>";
                        $user_id = $user["id"];
                        ?>
                        <input type="radio" name="user_id" value="<?php echo $user_id['id']?>">
                        <?php
                        echo "</td>";
                        echo "</tr>";

                    }
                    ?>
                </table>
            </td>
        </table>
        <hr>
        <input type="hidden" name="type" value="update_clerk_details">
        请勿双选<br><br><br>
        <input type="submit" value = "预览"> &nbsp;
        <input type="reset" value = "重选"> &nbsp;
    </form>
    <br>
    <a href="add_manager.html">添加发货人</a><br>
    <a href="add_user.html">添加收货人</a>
</div>
</body>
</html>