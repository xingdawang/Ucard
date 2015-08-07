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
        <form action="../Controllers/OrderController.php" method="post">
            <table style="width:60%">
                <td width="49%" valign="top">
                    <table width="99%" border="0" align="left"cellpadding="3" cellspacing="0" bgcolor="#ffffff" >
                        <tr>
                            <td height="30" align="left" bgcolor="#f1f1f1" class="Font0">我的发货人信息</td>
                        </tr>
                        <?php
                        require_once("../Model/UserModel.php");
                        $users = new User();
                        $all_users = $users->loadManagers();
                        $i = 0;
                        foreach($all_users as $user){

                            echo "<tr>";
                            echo "<td>";
                            echo $user['name'] ." (". $user['tel']. ")";
                            $user_id = $user['id'];
                            echo "</td>";
                            echo "<td>";
                            ?>
                            <input type="radio" name="manager_id"  value="<?php echo $user['id']?>">
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
            <input type="hidden" name="type" value="selectOrder">
            <input type="submit" value = "信息预览">
        </form>
    </div>
</body>
</html>
<script>
    function setValue(at){
        document.getElementById("manager_id").value=at;
    }
</script>