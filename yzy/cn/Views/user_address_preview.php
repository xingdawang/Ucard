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
                <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#ffffff">
                    <td height="30" colspan="2" align="center" bgcolor="#f1f1f1" class="Font0">收货人信息</td>
                    </tr>
                    <?php
                    require_once("../Model/UserModel.php");
                    $user = new User();
                    session_start();
                    $user = $user->getUserDetails($_SESSION['user_id']);
                    ?>
                    <tr>
                        <td width="19%" height="26" align="right" bgcolor="#FFFFFF">姓名：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_name" type="text" id="SName" value="<?php echo $user[0]['name'] ?>" required>
                            <font color="red">*(中英文填写)</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">电话：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_tel" type="text" id="STel" value="<?php echo $user[0]['tel'] ?>" required>
                            <font color="red">*</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">中文地址：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_chinese_address" type="text" id="SAddress2" value="<?php echo $user[0]['chinese_address'] ?>" size="40">
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">英文地址：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_address" type="text" id="SAddress" value="<?php echo $user[0]['address'] ?>" size="40" required>
                            <font color="red">*</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">邮编：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_postcode" type="text" id="SZip" value="<?php echo $user[0]['postcode'] ?>" required>
                            <font color="red">*</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">E-mail：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_email" type="text" id="SEmail" value="<?php echo $user[0]['email'] ?>" size="30"></td>
                    </tr>

                </table>
            </td>
        </table>
        <hr>
        <input type="hidden" name="manager_id" value="<?php echo $_SESSION['manager_id'] ?>">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
        <input type="hidden" name="type" value="people_confirm">
        <input type="submit" value = "确定">
    </form>
</div>
</body>
</html>
