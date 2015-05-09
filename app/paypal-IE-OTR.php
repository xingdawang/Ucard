<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
</head>

<body>
    
    <?php
        $id = $_GET['record_id'];
    ?>
    
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="PK392XMGWUUUU">
        <input type="hidden" name="custom" value='<?php echo $id?>'>
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

</body>
</html>