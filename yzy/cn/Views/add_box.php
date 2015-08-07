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
        <div align="left">
            <table border="0" cellpadding="5" align="center">
                <tr>
                    <td>运输方式：</td>
                    <td>
                        <select onChange="ShowCard(this.value)">
                            <option value="" >请选择...</option>
                            <option value="AN POST专线" >AN POST专线</option>
                            <option value="EMS直达专线" >EMS直达专线</option>
                            <option value="E2G保税专线" >E2G保税专线</option>
                        </select>
                    </td>
                    <td  class="Font0">备注信息：
                        <input name="CNV" type="hidden" id="CNV" value="">
                    </td>
                </tr>
                <tr id="Card" style='display:none;'>
                    <td width="10%" height="13">身份证号：</td>
                    <td>
                        <input name="card_no" type="text" id="CardNo" value="" size="40" maxlength="50">
                        <font color="red">*</font>
                    </td>
                </tr>
                <tr>
                    <td width="10%">取货时间：</td>
                    <td width="55%">
                        <input name="get_time" type="radio" value="早上：9:00 - 2:00">
                        早上：9:00 - 2:00
                        <input name="get_time" type="radio"  value="晚上：16:00 - 20:00">
                        晚上：16:00 - 20:00
                    </td>
                    <td rowspan="3">
                        <textarea name="content" cols="50" rows="4" id="Content"></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="10%">物品总称：</td>
                    <td width="55%">
                        <input type="text" name="box_name" required><font color="red">*</font>
                    </td>
                </tr>

                <tr>
                    <!-- box begin here -->
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                        <tr>
                            <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">包装</span></td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">总价格(&euro;)：</td>
                            <td width="90%" bgcolor="#FFFFFF">
                                <input type="number" name="box1_price" step="0.01">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">总质量(Kg)：</td>
                            <td width="90%" bgcolor="#FFFFFF">
                                <input type="number" name="box1_weight" step="0.01">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">包装类型：</td>
                            <td width="90%" bgcolor="#FFFFFF"><input name="BoxType1" type="radio" value="纸箱" checked>
                                纸箱
                                <input type="radio" name="BoxType1" value="木箱" >
                                木箱
                                <input type="radio" name="BoxType1" value="行李箱" >
                                行李箱
                                <input type="radio" name="BoxType1" value="其他" >
                                其他				</td>
                        </tr>
                        <tr>
                            <td height="30" bgcolor="#FFFFFF">包装尺寸：</td>
                            <td bgcolor="#FFFFFF">
                                <div>
                                    <input type="radio" name="OnCC1" value="S" onClick="ShowOn(1,1)">
                                    (S) 36*25*46&nbsp;&nbsp;
                                    <input type="radio" name="OnCC1" value="M" onClick="ShowOn(1,2)">
                                    (M) 44*38*48&nbsp;&nbsp;
                                    <input type="radio" name="OnCC1" value="L" onClick="ShowOn(1,3)">
                                    (L) 41*51*61				</div>
                                <div id="nullLine">&nbsp;</div>
                                <div>
                                    长
                                    <input name="BoxC1" type="text" id="BoxC1" size="6" value="36" required> CM
                                    宽
                                    <input name="BoxK1" type="text" id="BoxK1" size="6" value="25" required> CM
                                    高
                                    <input name="BoxG1" type="text" id="BoxG1" size="6" value="46" required> CM
				<span style="display:none">
                总重量
                <input name="BoxZ1" type="text" id="BoxZ1" size="6" value="90" />
                KG 总价值
                <input name="BoxV1" type="text" id="BoxV1" size="6" value="78">(&#8364;)
				</span>
                                    <font color="red"> *</font>必须填写				</div>				</td>
                        </tr>
                        <tr>
                            <td bgcolor="#FFFFFF">物品列表：</td>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td width="25%" height="22" align="center" class="Font0">品名</td>
                                        <td width="25%" align="center" class="Font0">数量</td>
                                        <td width="25%" align="center" class="Font0">重量(KG)</td>
                                        <td width="25%" align="center" class="Font0">价值(&#8364;)</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box1N1" type="text" id="Box1N1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1S1" type="text" id="Box1S1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1K1" type="text" id="Box1K1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1J1" type="text" id="Box1J1" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box1N2" type="text" id="Box1N2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1S2" type="text" id="Box1S2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1K2" type="text" id="Box1K2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1J2" type="text" id="Box1J2" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box1N3" type="text" id="Box1N3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1S3" type="text" id="Box1S3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1K3" type="text" id="Box1K3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1J3" type="text" id="Box1J3" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box1N4" type="text" id="Box1N4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1S4" type="text" id="Box1S4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1K4" type="text" id="Box1K4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1J4" type="text" id="Box1J4" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box1N5" type="text" id="Box1N5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1S5" type="text" id="Box1S5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1K5" type="text" id="Box1K5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box1J5" type="text" id="Box1J5" style="text-align:center" value=""></td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                    </td>
                    <!-- box finishes here -->
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                        <tr>
                            <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">包装（可选）</span></td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">总价格(&euro;)：</td>
                            <td width="90%" bgcolor="#FFFFFF">
                                <input type="number" name="box2_price" step="0.01">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">总质量(Kg)：</td>
                            <td width="90%" bgcolor="#FFFFFF">
                                <input type="number" name="box2_weight" step="0.01">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">包装类型：</td>
                            <td width="90%" bgcolor="#FFFFFF"><input name="BoxType2" type="radio" value="纸箱" checked>
                                纸箱
                                <input type="radio" name="BoxType2" value="木箱" >
                                木箱
                                <input type="radio" name="BoxType2" value="行李箱" >
                                行李箱
                                <input type="radio" name="BoxType2" value="其他" >
                                其他				</td>
                        </tr>
                        <tr>
                            <td height="30" bgcolor="#FFFFFF">包装尺寸：</td>
                            <td bgcolor="#FFFFFF">
                                <div>
                                    <input type="radio" name="OnCC2" value="S" onClick="ShowOn(2,1)">
                                    (S) 36*25*46&nbsp;&nbsp;
                                    <input type="radio" name="OnCC2" value="M" onClick="ShowOn(2,2)">
                                    (M) 44*38*48&nbsp;&nbsp;
                                    <input type="radio" name="OnCC2" value="L" onClick="ShowOn(2,3)">
                                    (L) 41*51*61				</div>
                                <div id="nullLine">&nbsp;</div>
                                <div>
                                    长
                                    <input name="BoxC2" type="text" id="BoxC2" size="6" value="36" required> CM
                                    宽
                                    <input name="BoxK2" type="text" id="BoxK2" size="6" value="25" required> CM
                                    高
                                    <input name="BoxG2" type="text" id="BoxG2" size="6" value="46" required> CM
                                    <span style="display:none">
                                    总重量
                                    <input name="BoxZ2" type="text" id="BoxZ2" size="6" value="90" />
                                    KG 总价值
                                    <input name="BoxV2" type="text" id="BoxV2" size="6" value="78">(&#8364;)
                                    </span>
                                    <font color="red"> *</font>必须填写				</div>				</td>
                        </tr>
                        <tr>
                            <td bgcolor="#FFFFFF">物品列表：</td>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td width="25%" height="22" align="center" class="Font0">品名</td>
                                        <td width="25%" align="center" class="Font0">数量</td>
                                        <td width="25%" align="center" class="Font0">重量(KG)</td>
                                        <td width="25%" align="center" class="Font0">价值(&#8364;)</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box2N1" type="text" id="Box2N1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2S1" type="text" id="Box2S1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2K1" type="text" id="Box2K1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2J1" type="text" id="Box2J1" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box2N2" type="text" id="Box2N2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2S2" type="text" id="Box2S2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2K2" type="text" id="Box2K2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2J2" type="text" id="Box2J2" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box2N3" type="text" id="Box2N3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2S3" type="text" id="Box2S3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2K3" type="text" id="Box2K3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2J3" type="text" id="Box2J3" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box2N4" type="text" id="Box2N4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2S4" type="text" id="Box2S4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2K4" type="text" id="Box2K4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2J4" type="text" id="Box2J4" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box2N5" type="text" id="Box2N5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2S5" type="text" id="Box2S5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2K5" type="text" id="Box2K5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box2J5" type="text" id="Box2J5" style="text-align:center" value=""></td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- box finishes here-->
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                        <tr>
                            <td height="26" colspan="2" bgcolor="#f1f1f1" class="enfont Font0"><span id="BTit1">包装（可选）</span></td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">总价格(&euro;)：</td>
                            <td width="90%" bgcolor="#FFFFFF">
                                <input type="number" name="box3_price" step="0.01">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">总质量(Kg)：</td>
                            <td width="90%" bgcolor="#FFFFFF">
                                <input type="number" name="box3_weight" step="0.01">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%" height="30" bgcolor="#FFFFFF">包装类型：</td>
                            <td width="90%" bgcolor="#FFFFFF"><input name="BoxType3" type="radio" value="纸箱" checked>
                                纸箱
                                <input type="radio" name="BoxType3" value="木箱" >
                                木箱
                                <input type="radio" name="BoxType3" value="行李箱" >
                                行李箱
                                <input type="radio" name="BoxType3" value="其他" >
                                其他				</td>
                        </tr>
                        <tr>
                            <td height="30" bgcolor="#FFFFFF">包装尺寸：</td>
                            <td bgcolor="#FFFFFF">
                                <div>
                                    <input type="radio" name="OnCC3" value="S" onClick="ShowOn(3,1)">
                                    (S) 36*25*46&nbsp;&nbsp;
                                    <input type="radio" name="OnCC3" value="M" onClick="ShowOn(3,2)">
                                    (M) 44*38*48&nbsp;&nbsp;
                                    <input type="radio" name="OnCC3" value="L" onClick="ShowOn(3,3)">
                                    (L) 41*51*61				</div>
                                <div id="nullLine">&nbsp;</div>
                                <div>
                                    长
                                    <input name="BoxC3" type="text" id="BoxC3" size="6" value="36" required> CM
                                    宽
                                    <input name="BoxK3" type="text" id="BoxK3" size="6" value="25" required> CM
                                    高
                                    <input name="BoxG3" type="text" id="BoxG3" size="6" value="46" required> CM
                                    <span style="display:none">
                                    总重量
                                    <input name="BoxZ3" type="text" id="BoxZ3" size="6" value="90" />
                                    KG 总价值
                                    <input name="BoxV3" type="text" id="BoxV3" size="6" value="78">(&#8364;)
                                    </span>
                                    <font color="red"> *</font>必须填写				</div>				</td>
                        </tr>
                        <tr>
                            <td bgcolor="#FFFFFF">物品列表：</td>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td width="25%" height="22" align="center" class="Font0">品名</td>
                                        <td width="25%" align="center" class="Font0">数量</td>
                                        <td width="25%" align="center" class="Font0">重量(KG)</td>
                                        <td width="25%" align="center" class="Font0">价值(&#8364;)</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box3N1" type="text" id="Box3N1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3S1" type="text" id="Box3S1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3K1" type="text" id="Box3K1" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3J1" type="text" id="Box3J1" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box3N2" type="text" id="Box3N2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3S2" type="text" id="Box3S2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3K2" type="text" id="Box3K2" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3J2" type="text" id="Box3J2" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box3N3" type="text" id="Box3N3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3S3" type="text" id="Box3S3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3K3" type="text" id="Box3K3" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3J3" type="text" id="Box3J3" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box3N4" type="text" id="Box3N4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3S4" type="text" id="Box3S4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3K4" type="text" id="Box3K4" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3J4" type="text" id="Box3J4" style="text-align:center" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><input name="Box3N5" type="text" id="Box3N5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3S5" type="text" id="Box3S5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3K5" type="text" id="Box3K5" style="text-align:center" value=""></td>
                                        <td align="center"><input name="Box3J5" type="text" id="Box3J5" style="text-align:center" value=""></td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- box finishes here-->
                    <hr>
                </tr>

                </tr>
                <br><br>
                <tr bgcolor="#f0f8ff">
                    <td height="26" >保险购买：</td>
                    <td colspan="2">
                        <div>1.EMS邮政线路不受理任何理由包裹延误和损坏的赔偿，丢失保险上限为100欧元。无附加保险购买权。</div>
                        <div>2.ANPOST邮政商务专线包含上限150欧元的破损和丢失保险。</div>
                        <div>3.预购买附加保险规定：每箱最底购买额度为200EURO，最高购买额度为1000EURO，同一票货物只支持一种险别。
                            (<a href="insurance_warning.html" target="_blank"><font color="red"> 具体条款请查阅保险费用</font></a>)</div>
                        <div id="nullLine">&nbsp;</div>
                        <div>险别选择：
                            <select name="BxType" id="BxType">
                                <option value="无保险" >无保险</option>
                                <option value="一切险 5%" >一切险 5%</option>
                                <option value="全保险 3.5%" >全保险 3.5%</option>
                            </select>

                            购买额度/箱：
                            <input name="BxMoney" type="text" id="BxMoney" value="">
                        </div>
                    </td>
                </tr>
                    <br>
            </table>
        </div>

        <hr>
        <input type="hidden" name="type" value="order_preview">
        <input type="submit" value = "预览">
    </form>
</div>
</body>
</html>
<script>
    function ShowCard(at)
    {
        document.getElementById("CNV").value=at;
        if(at=="E2G保税专线")
        {
            document.getElementById("Card").style.display="";
        }else
        {
            document.getElementById("Card").style.display="none";
        }
    }

    function ShowOn(at,str)
    {
        var tempstr="";
        if(str=='1')
        {
            document.getElementById("BoxC"+at).value="36";
            document.getElementById("BoxK"+at).value="25";
            document.getElementById("BoxG"+at).value="46";

        }
        if(str=='2')
        {
            document.getElementById("BoxC"+at).value="44";
            document.getElementById("BoxK"+at).value="38";
            document.getElementById("BoxG"+at).value="48";

        }
        if(str=='3')
        {
            document.getElementById("BoxC"+at).value="41";
            document.getElementById("BoxK"+at).value="51";
            document.getElementById("BoxG"+at).value="61";

        }
    }


</script>

