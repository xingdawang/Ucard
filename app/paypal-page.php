<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
</head>

<body>
    
    <?php
        $id = $_GET['record_id'];
    ?>
    
    <!--
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="2KMZ9QXDPT9WW">
        <table>
        <tr><td><input type="hidden" name="on0" value="Postcard type">Postcard type</td></tr><tr><td><select name="os0">
                <option value="postcard 1">postcard 1 &euro;0.01 EUR</option>
                <option value="postcard 2">postcard 2 &euro;0.40 EUR</option>
                <option value="postcard 3">postcard 3 &euro;0.60 EUR</option>
        </select> </td></tr>
        </table>
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="custom" value='<?php echo $id?>'>
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    -->
    
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="2KMZ9QXDPT9WW">
        <table>
        <tr><td><input type="hidden" name="on0" value="Postcard type">Postcard type</td></tr><tr><td><select name="os0">
                <option value="postcard 1">postcard 1 &euro;0.01 EUR</option>
                <option value="postcard 2">postcard 2 &euro;EUR</option>
                <option value="postcard 3">postcard 3 &euro;EUR</option>
        </select> </td></tr>
        </table>
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="custom" value='<?php echo $id?>'>
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    
    
    <hr>
        <p>Price: &euro;2.99</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="ABVWGHMGER3NS">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


    
</body>
</html>