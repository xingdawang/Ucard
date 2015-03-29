<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Ucard</title>
    <link rel="icon" type="image/png" sizes="96x96" href="Images/favicon-96x96.png">
    <link href="/CSS/StyleSheet.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <form id="form1" runat="server">
    <div id="wrapper-bg">
        <div id="wrapper" class="container">
            <div id="logo">
                <h1><a href="index.php"><span>Ucard</span>Store</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li class="active"><a href="index.php" accesskey="1" title="">Home</a></li>
                    <li><a href="#" accesskey="2" title="">Ucard</a></li>
                    <li><a href="#" accesskey="3" title="">Story</a></li>
		    <li><a href="#" accesskey="4" title="">Language</a></li>
		    <li><a href="Login/login.php" accesskey="5" title="">login</a></li>
                    <li><a href="aboutUs.php" accesskey="6" title="">About us</a></li>
                </ul>
            </div>
	    <div> &nbsp</div>
        </div>
		<div id="banner" class="container"> <img src="../Images/cliff.png" width="1200" height="400" alt="" /> </div>
    </div>
    <div id="three-column" class="container">
        <header>
	    <h2>Amazing Postcard</h2>
	</header>
        <div class="tbox1">
		    <div class="box-style box-style01">
			<div class="content"> <a class="image image-full"><img src="../Images/CherrySu.png"  height="370" alt="Cherry Su"></a>
                            <br />
                            <br />
                    <h2>Cherry Su</h2>
		    <p>Picture from Facebook of Cherry Su</p>
                </div>
			</div>
        </div>
        
        <div class="tbox2">
	    <div class="box-style box-style02">
		<div class="content"> <a class="image image-full"><img src="../Images/headSide.png" width="370" height="370" alt="QPostCard Head Side"></a>
                    <br />
                    <br />
                    <h2>Postcard Head side</h2>
		    <p>This is the head side of the postcard, have fine</p>
                </div>
	    </div>
        </div>
        
        <div class="tbox3">
	    <div class="box-style box-style03">
		<div class="content"> <a class="image image-full"><img src="../Images/qrcode.png" width="370" height="370" alt="QR Code"></a>
                    <br />
                    <br />
                    <h2>Explore More</h2>
                    <p>Scann QR code, and you can download Wechat</p>
                </div>
	    </div>
        </div>
        <div id="page">
			<div id="content"></div>
			<div id="sidebar"></div>
		</div>
    </div>
    <div id="footer">
	    <p>Copyright (c) 2015 Ucard Tech Inc. All rights reserved. </p>
    </div>
    </form>
</body>
</html>
