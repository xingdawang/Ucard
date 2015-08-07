<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    session_start();
    $order = $_SESSION['print_order'];
    $box = $_SESSION['print_order_box'];
    $weight = $_SESSION['weight'];
    $price = $_SESSION['price'];
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="425" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="44" colspan="2" style="font-size:24px;">
                                    <span style='font-size:18px;'><b>Transfer Type : </b></span>
                                    </b>&nbsp;&nbsp;<b><span style="font-size:18px;"><strong><?php echo $order['CNV']; ?></strong></span></b></td>
                            </tr>
                            <tr>
                                <td height="10" colspan="2"><hr style="color:#000000" /></td>
                            </tr>
                            <tr>
                                <td width="48%" height="24" class="Size1">Zip code: </td>
                                <td class="Size1"><strong><?php echo $order['user_postcode'];?></strong></td>
                            </tr>
                            <tr>
                                <td height="24" class="Size1">Transaction id: </td>
                                <td class="Size1"><strong><?php echo $order['transaction_id'];?></strong></td>
                            </tr>
                            <tr>
                                <td height="24" class="Size1">Transport id: </td>
                                <td class="Size1"><strong><?php echo $order['transport_id'];?></strong></td>
                            </tr>
                            <tr>
                                <td height="16" colspan="2"><hr style="color:#000000" /></td>
                            </tr>
                        </table>
                        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
                            <tr>
                                <td height="24" bgcolor="#c0c0c0" class="Size1"><strong>TO : Consignee</strong></td>
                            </tr>
                            <tr>
                                <td height="92" valign="top" class="Size1">
                                    <div><b><strong><?php echo $order['user_name'];?></strong></b></div>
                                    <div><strong><?php echo $order['user_address'];?></strong></div>
                                    <div><b><strong><?php echo $order['user_chinese_address'];?></strong></b></div>			  </td>
                            </tr>
                            <tr>
                                <td valign="top" class="Size1">
                                    <div style="width:100%;clear:both;">
                                        <div style="float:left;width:70px;"><b>Contact</b></div>
                                        <div style="float:left;"><b><?php echo $order['user_name'];?></b></div>
                                    </div>

                                    <div style="width:100%;clear:both;">
                                        <div style="float:left;width:70px;"><b>E-mail</b></div>
                                        <div style="float:left;"><b><?php echo $order['user_email'];?></b></div>
                                    </div>

                                    <div style="width:100%;clear:both;">
                                        <div style="float:left;width:70px;"><b>Phone</b></div>
                                        <div style="float:left;"><b><?php echo $order['user_tel'];?></b></div>
                                    </div>			  </td>
                            </tr>

                            <tr>
                                <td height="24" bgcolor="#c0c0c0" class="Size1"><strong>FROM : Sender Detail</strong></td>
                            </tr>
                            <tr>
                                <td height="80" valign="top" class="Size1">
                                    <div><b><?php echo $order['manager_name'];?></b></div>
                                    <div><?php echo $order['manager_address'];?></div>
                                    <div><?php echo $order['manager_tel'];?></div>			 </td>
                            </tr>
                            <tr>
                                <td height="24" valign="top" bgcolor="#c0c0c0" class="Size1"><strong>Inventory details</strong></td>
                            </tr>
                            <tr>
                                <td valign="top" class="Size1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="26"><strong>DESCRIPTION</strong></td>
                                            <td align="center"><strong>WEIGHT</strong></td>
                                            <td align="center"><strong>PRICE</strong></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><?php echo $order['box_name'];?></td>
                                            <td align="center"><?php echo $weight;?></td>
                                            <td align="center"><?php echo $price;?></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table></td>
                <tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>