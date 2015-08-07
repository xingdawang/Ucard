<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单</title>
</head>
<body>
<div align="center">
    <h2>在线下单预览</h2>
    <hr>
    <form action="../Controllers/OrderController.php" method="post">
        <table style="width:60%">
            <td width="49%" valign="top">
                <table width="99%" border="0" align="left"cellpadding="3" cellspacing="0" bgcolor="#ffffff" >
                    <td height="30" colspan="2" align="center" bgcolor="#f1f1f1" class="Font0">发货人信息</td>
                    </tr>
                    <?php
                    require_once("../Model/UserModel.php");
                    $user = new User();
                    session_start();
                    $manager = $user->getManagerDetails($_SESSION['manager_id']);
                    ?>
                    <tr>
                        <td width="17%" height="26" align="right" bgcolor="#FFFFFF">姓名：</td>
                        <td width="83%" bgcolor="#FFFFFF">
                            <input name="manager_name" type="text" id="FName"
                                   value="<?php echo $manager[0]['name'];?>"
                                <?php echo "readonly"?>>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">电话：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="manager_tel" type="text" id="FTel"
                                   value="<?php echo $manager[0]['tel'] ?>"
                                <?php echo "readonly"?>>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">地址：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="manager_address" type="text" id="FAddress"
                                   value="<?php echo $manager[0]['address'] ?>" size="40"
                                <?php echo "readonly"?>>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">邮编：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="manager_postcode" type="text" id="FZip"
                                   value="<?php echo $manager[0]['postcode'] ?>"
                                <?php echo "readonly"?>>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">E-mail：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="manager_email" type="text" id="FEmail"
                                   value="<?php echo $manager[0]['email'] ?>" size="30"
                                <?php echo "readonly"?>>
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">状态：</td>
                        <td bgcolor="#FFFFFF">
                            <?php
                                if($manager == null){
                                    echo "待管理员编辑后，发货。";
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
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
                            (中英文填写)
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">电话：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_tel" type="text" id="STel" value="<?php echo $user[0]['tel'] ?>" required>
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
                        </td>
                    </tr>
                    <tr>
                        <td height="26" align="right" bgcolor="#FFFFFF">邮编：</td>
                        <td bgcolor="#FFFFFF">
                            <input name="user_postcode" type="text" id="SZip" value="<?php echo $user[0]['postcode'] ?>" required>
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
        <table border="0" cellpadding="5" align="center">
            <?php
                session_start();
                $order = $_SESSION['order_details'];
            ?>
            <tr>
                <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">物流信息</span></td>
            </tr>
            <tr>
                <td width="10%">运输方式：</td>
                <td width="55%">
                    <input type="hidden" name="CNV" value="<?php echo $order['CNV']?>">
                    <input type="hidden" name="card_no" value="<?php echo $order['card_no']?>">
                    <?php
                        echo $order['CNV'];
                        if($order['CNV'] == "E2G保税专线")
                            echo "<br>身份证号：".$order['card_no']."<br>";
                    ?>
                </td>
            </tr>
            <tr>
                <td width="10%">取货时间：</td>
                <td width="55%">
                    <input type="hidden" name="get_time" value="<?php echo $order['get_time']?>">
                    <?php echo $order['get_time']; ?>
                </td>
            </tr>
            <tr>
                <td height="26"> 物品总称：</td>
                <td>
                    <input type="hidden" name="box_name" value="<?php echo $order['box_name']?>">
                    <?php echo $order['box_name']; ?>
                </td>
            </tr>
            <tr>
                <td height="26"> 备注信息：</td>
                <td>
                    <input type="hidden" name="content" value="<?php echo $order['content']?>">
                    <?php echo $order['content']; ?>
                </td>
            </tr>
        </table>
        <hr>
        <!-- box1 begins -->
        <table align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
                <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">箱子1</span></td>
            </tr>
            <tr>
                <td height="30" bgcolor="#FFFFFF"> 总价格：</td>
                <td height="30" bgcolor="#FFFFFF">
                    <input type="hidden" name="box1_price" value="<?php echo $order['box1_price']?>">
                    <?php echo $order['box1_price']; ?>
                </td>
            </tr>
            <tr>
                <td height="30" bgcolor="#FFFFFF"> 总质量：</td>
                <td height="30" bgcolor="#FFFFFF">
                    <input type="hidden" name="box1_weight" value="<?php echo $order['box1_weight']?>">
                    <?php echo $order['box1_weight']; ?>
                </td>
            </tr>
            <tr>
                <td width="10%" height="30" bgcolor="#FFFFFF">包装类型：</td>
                <td width="90%" bgcolor="#FFFFFF">
                    <input type="hidden" name="box1_type" value="<?php echo $order['BoxType1']; ?>">
                    <?php echo $order['BoxType1']; ?>
                </td>
            </tr>
            <tr>
                <td height="30" bgcolor="#FFFFFF">包装尺寸：</td>
                <td bgcolor="#FFFFFF">
                    <input type="hidden" name="boxC1" value="<?php echo $order['BoxC1']; ?>">
                    <input type="hidden" name="boxK1" value="<?php echo $order['BoxK1']; ?>">
                    <input type="hidden" name="boxG1" value="<?php echo $order['BoxG1']; ?>">
                    长：<?php echo $order['BoxC1']; ?> CM
                    宽：<?php echo $order['BoxK1']; ?> CM
                    高：<?php echo $order['BoxG1']; ?> CM
                </td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">物品列表：</td>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                        <tr>
                            <td width="25%" height="22" align="center" class="Font0">品名</td>
                            <td width="25%" align="center" class="Font0">数量</td>
                            <td width="25%" align="center" class="Font0">重量(KG)</td>
                            <td width="25%" align="center" class="Font0">价值(&euro;)</td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box1N1" type="text" id="Box1N1" style="text-align:center" value="<?php echo $order['Box1N1']; ?>"></td>
                            <td align="center"><input name="Box1S1" type="text" id="Box1S1" style="text-align:center" value="<?php echo $order['Box1S1']; ?>"></td>
                            <td align="center"><input name="Box1K1" type="text" id="Box1K1" style="text-align:center" value="<?php echo $order['Box1K1']; ?>"></td>
                            <td align="center"><input name="Box1J1" type="text" id="Box1J1" style="text-align:center" value="<?php echo $order['Box1J1']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box1N2" type="text" id="Box1N2" style="text-align:center" value="<?php echo $order['Box1N2']; ?>"></td>
                            <td align="center"><input name="Box1S2" type="text" id="Box1S2" style="text-align:center" value="<?php echo $order['Box1S2']; ?>"></td>
                            <td align="center"><input name="Box1K2" type="text" id="Box1K2" style="text-align:center" value="<?php echo $order['Box1K2']; ?>"></td>
                            <td align="center"><input name="Box1J2" type="text" id="Box1J2" style="text-align:center" value="<?php echo $order['Box1J2']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box1N3" type="text" id="Box1N3" style="text-align:center" value="<?php echo $order['Box1N3']; ?>"></td>
                            <td align="center"><input name="Box1S3" type="text" id="Box1S3" style="text-align:center" value="<?php echo $order['Box1N3']; ?>"></td>
                            <td align="center"><input name="Box1K3" type="text" id="Box1K3" style="text-align:center" value="<?php echo $order['Box1N3']; ?>"></td>
                            <td align="center"><input name="Box1J3" type="text" id="Box1J3" style="text-align:center" value="<?php echo $order['Box1N3']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box1N4" type="text" id="Box1N4" style="text-align:center" value="<?php echo $order['Box1N4']; ?>"></td>
                            <td align="center"><input name="Box1S4" type="text" id="Box1S4" style="text-align:center" value="<?php echo $order['Box1N4']; ?>"></td>
                            <td align="center"><input name="Box1K4" type="text" id="Box1K4" style="text-align:center" value="<?php echo $order['Box1N4']; ?>"></td>
                            <td align="center"><input name="Box1J4" type="text" id="Box1J4" style="text-align:center" value="<?php echo $order['Box1N4']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box1N5" type="text" id="Box1N5" style="text-align:center" value="<?php echo $order['Box1N5']; ?>"></td>
                            <td align="center"><input name="Box1S5" type="text" id="Box1S5" style="text-align:center" value="<?php echo $order['Box1N5']; ?>"></td>
                            <td align="center"><input name="Box1K5" type="text" id="Box1K5" style="text-align:center" value="<?php echo $order['Box1N5']; ?>"></td>
                            <td align="center"><input name="Box1J5" type="text" id="Box1J5" style="text-align:center" value="<?php echo $order['Box1N5']; ?>"></td>
                        </tr>

                    </table>
                </td>
            </tr>
            </table>
        <hr>
        <!-- box1 ends -->
        <!-- box2 begins -->
        <?php
        if($order['box2_price'] == null && $order['box2_weight'] == null)
            echo "<!-- box2 begins here";
        ?>
        <table align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
                <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">箱子2</span></td>
            </tr>
            <tr>
                <td  height="30" bgcolor="#FFFFFF"> 总价格：</td>
                <td height="30" bgcolor="#FFFFFF">
                    <input type="hidden" name="box2_price" value="<?php echo $order['box2_price']?>">
                    <?php echo $order['box2_price']; ?>
                </td>
            </tr>
            <tr>
                <td height="30" bgcolor="#FFFFFF"> 总质量：</td>
                <td height="30" bgcolor="#FFFFFF">
                    <input type="hidden" name="box2_weight" value="<?php echo $order['box2_weight']?>">
                    <?php echo $order['box2_weight']; ?>
                </td>
            </tr>
            <tr>
                <td width="10%" height="30" bgcolor="#FFFFFF">包装类型：</td>
                <td width="90%" bgcolor="#FFFFFF">
                    <input type="hidden" name="box2_type" value="<?php echo $order['BoxType2']; ?>">
                    <?php echo $order['BoxType2']; ?>
                </td>
            </tr>
            <tr>
                <td height="30" bgcolor="#FFFFFF">包装尺寸：</td>
                <td bgcolor="#FFFFFF">
                    <input type="hidden" name="boxC2" value="<?php echo $order['BoxC2']; ?>">
                    <input type="hidden" name="boxK2" value="<?php echo $order['BoxK2']; ?>">
                    <input type="hidden" name="boxG2" value="<?php echo $order['BoxG2']; ?>">
                    长：<?php echo $order['BoxC2']; ?> CM
                    宽：<?php echo $order['BoxK2']; ?> CM
                    高：<?php echo $order['BoxG2']; ?> CM
                </td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">物品列表：</td>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                        <tr>
                            <td width="25%" height="22" align="center" class="Font0">品名</td>
                            <td width="25%" align="center" class="Font0">数量</td>
                            <td width="25%" align="center" class="Font0">重量(KG)</td>
                            <td width="25%" align="center" class="Font0">价值(&euro;)</td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box2N1" type="text" id="Box2N1" style="text-align:center" value="<?php echo $order['Box2N1']; ?>"></td>
                            <td align="center"><input name="Box2S1" type="text" id="Box2S1" style="text-align:center" value="<?php echo $order['Box2S1']; ?>"></td>
                            <td align="center"><input name="Box2K1" type="text" id="Box2K1" style="text-align:center" value="<?php echo $order['Box2K1']; ?>"></td>
                            <td align="center"><input name="Box2J1" type="text" id="Box2J1" style="text-align:center" value="<?php echo $order['Box2J1']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box2N2" type="text" id="Box2N2" style="text-align:center" value="<?php echo $order['Box2N2']; ?>"></td>
                            <td align="center"><input name="Box2S2" type="text" id="Box2S2" style="text-align:center" value="<?php echo $order['Box2S2']; ?>"></td>
                            <td align="center"><input name="Box2K2" type="text" id="Box2K2" style="text-align:center" value="<?php echo $order['Box2K2']; ?>"></td>
                            <td align="center"><input name="Box2J2" type="text" id="Box2J2" style="text-align:center" value="<?php echo $order['Box2J2']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box2N3" type="text" id="Box2N3" style="text-align:center" value="<?php echo $order['Box2N3']; ?>"></td>
                            <td align="center"><input name="Box2S3" type="text" id="Box2S3" style="text-align:center" value="<?php echo $order['Box2N3']; ?>"></td>
                            <td align="center"><input name="Box2K3" type="text" id="Box2K3" style="text-align:center" value="<?php echo $order['Box2N3']; ?>"></td>
                            <td align="center"><input name="Box2J3" type="text" id="Box2J3" style="text-align:center" value="<?php echo $order['Box2N3']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box2N4" type="text" id="Box2N4" style="text-align:center" value="<?php echo $order['Box2N4']; ?>"></td>
                            <td align="center"><input name="Box2S4" type="text" id="Box2S4" style="text-align:center" value="<?php echo $order['Box2N4']; ?>"></td>
                            <td align="center"><input name="Box2K4" type="text" id="Box2K4" style="text-align:center" value="<?php echo $order['Box2N4']; ?>"></td>
                            <td align="center"><input name="Box2J4" type="text" id="Box2J4" style="text-align:center" value="<?php echo $order['Box2N4']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box2N5" type="text" id="Box2N5" style="text-align:center" value="<?php echo $order['Box2N5']; ?>"></td>
                            <td align="center"><input name="Box2S5" type="text" id="Box2S5" style="text-align:center" value="<?php echo $order['Box2N5']; ?>"></td>
                            <td align="center"><input name="Box2K5" type="text" id="Box2K5" style="text-align:center" value="<?php echo $order['Box2N5']; ?>"></td>
                            <td align="center"><input name="Box2J5" type="text" id="Box2J5" style="text-align:center" value="<?php echo $order['Box2N5']; ?>"></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <?php
        if($order['box2_price'] == null && $order['box2_weight'] == null)
            echo "box2 begins here -->";
        ?>
        <!-- box2 ends -->
        <?php
            if($order['box3_price'] == null && $order['box3_weight'] == null)
                echo "<!-- box3 begins here";
        ?>
        <table align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
                <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">箱子3</span></td>
            </tr>
            <tr>
                <td  height="30" bgcolor="#FFFFFF"> 总价格：</td>
                <td  height="30" bgcolor="#FFFFFF">
                    <input type="hidden" name="box3_price" value="<?php echo $order['box3_price']?>">
                    <?php echo $order['box3_price']; ?>
                </td>
            </tr>
            <tr>
                <td  height="30" bgcolor="#FFFFFF"> 总质量：</td>
                <td  height="30" bgcolor="#FFFFFF">
                    <input type="hidden" name="box3_weight" value="<?php echo $order['box3_weight']?>">
                    <?php echo $order['box3_weight']; ?>
                </td>
            </tr>
            <tr>
                <td width="10%" height="30" bgcolor="#FFFFFF">包装类型：</td>
                <td width="90%" bgcolor="#FFFFFF">
                    <input type="hidden" name="box3_type" value="<?php echo $order['BoxType3']; ?>">
                    <?php echo $order['BoxType3']; ?>
                </td>
            </tr>
            <tr>
                <td height="30" bgcolor="#FFFFFF">包装尺寸：</td>
                <td bgcolor="#FFFFFF">
                    <input type="hidden" name="boxC3" value="<?php echo $order['BoxC3']; ?>">
                    <input type="hidden" name="boxK3" value="<?php echo $order['BoxK3']; ?>">
                    <input type="hidden" name="boxG3" value="<?php echo $order['BoxG3']; ?>">
                    长：<?php echo $order['BoxC3']; ?> CM
                    宽：<?php echo $order['BoxK3']; ?> CM
                    高：<?php echo $order['BoxG3']; ?> CM
                </td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">物品列表：</td>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                        <tr>
                            <td width="25%" height="22" align="center" class="Font0">品名</td>
                            <td width="25%" align="center" class="Font0">数量</td>
                            <td width="25%" align="center" class="Font0">重量(KG)</td>
                            <td width="25%" align="center" class="Font0">价值(&euro;)</td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box3N1" type="text" id="Box3N1" style="text-align:center" value="<?php echo $order['Box3N1']; ?>"></td>
                            <td align="center"><input name="Box3S1" type="text" id="Box3S1" style="text-align:center" value="<?php echo $order['Box3S1']; ?>"></td>
                            <td align="center"><input name="Box3K1" type="text" id="Box3K1" style="text-align:center" value="<?php echo $order['Box3K1']; ?>"></td>
                            <td align="center"><input name="Box3J1" type="text" id="Box3J1" style="text-align:center" value="<?php echo $order['Box1J1']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box3N2" type="text" id="Box3N2" style="text-align:center" value="<?php echo $order['Box3N2']; ?>"></td>
                            <td align="center"><input name="Box3S2" type="text" id="Box3S2" style="text-align:center" value="<?php echo $order['Box3S2']; ?>"></td>
                            <td align="center"><input name="Box3K2" type="text" id="Box3K2" style="text-align:center" value="<?php echo $order['Box3K2']; ?>"></td>
                            <td align="center"><input name="Box3J2" type="text" id="Box3J2" style="text-align:center" value="<?php echo $order['Box3J2']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box3N3" type="text" id="Box3N3" style="text-align:center" value="<?php echo $order['Box3N3']; ?>"></td>
                            <td align="center"><input name="Box3S3" type="text" id="Box3S3" style="text-align:center" value="<?php echo $order['Box3N3']; ?>"></td>
                            <td align="center"><input name="Box3K3" type="text" id="Box3K3" style="text-align:center" value="<?php echo $order['Box3N3']; ?>"></td>
                            <td align="center"><input name="Box3J3" type="text" id="Box3J3" style="text-align:center" value="<?php echo $order['Box3N3']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box3N4" type="text" id="Box3N4" style="text-align:center" value="<?php echo $order['Box3N4']; ?>"></td>
                            <td align="center"><input name="Box3S4" type="text" id="Box3S4" style="text-align:center" value="<?php echo $order['Box3N4']; ?>"></td>
                            <td align="center"><input name="Box3K4" type="text" id="Box3K4" style="text-align:center" value="<?php echo $order['Box3N4']; ?>"></td>
                            <td align="center"><input name="Box3J4" type="text" id="Box3J4" style="text-align:center" value="<?php echo $order['Box3N4']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><input name="Box3N5" type="text" id="Box3N5" style="text-align:center" value="<?php echo $order['Box3N5']; ?>"></td>
                            <td align="center"><input name="Box3S5" type="text" id="Box3S5" style="text-align:center" value="<?php echo $order['Box3N5']; ?>"></td>
                            <td align="center"><input name="Box3K5" type="text" id="Box3K5" style="text-align:center" value="<?php echo $order['Box3N5']; ?>"></td>
                            <td align="center"><input name="Box3J5" type="text" id="Box3J5" style="text-align:center" value="<?php echo $order['Box3N5']; ?>"></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <?php
        if($order['box3_price'] == null && $order['box3_weight'] == null)
            echo "box3 begins here -->";
        ?>
        <!-- box3 ends -->
        <div bgcolor="#f0f8ff" align="center">
            <td height="26" >保险购买：</td>
            <td colspan="2">
                <div>1.EMS邮政线路不受理任何理由包裹延误和损坏的赔偿，丢失保险上限为100欧元。无附加保险购买权。</div>
                <div>2.ANPOST邮政商务专线包含上限150欧元的破损和丢失保险。</div>
                <div>3.预购买附加保险规定：每箱最底购买额度为200EURO，最高购买额度为1000EURO，同一票货物只支持一种险别。
                    (<a href="insurance_warning.html" target="_blank"><font color="red"> 具体条款请查阅保险费用</font></a>)</div>
                <div id="nullLine">&nbsp;</div>
                <div>险别选择：
                    <input type="hidden" name="BxType" value="<?php echo $order['BxType']?>">
                    <?php echo $order['BxType']; ?>
                    购买额度/箱：
                    <input type="hidden" name="BxMoney" value="<?php echo $order['BxMoney']?>">
                    <?php echo $order['BxMoney']; ?>
                </div>
            </td>
        </div>
        <br>
        <input type="hidden" name="manager_id" value="<?php echo $_SESSION['manager_id'] ?>">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
        <input type="hidden" name="type" value="confirmed_order">
        <input type="submit" value = "确定提交">
        <br>
    </form>
    <br>
</div>
</body>
</html>
