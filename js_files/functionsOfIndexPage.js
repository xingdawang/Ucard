function buildIndexPage()
{
	loadIndexPageStyles();
	
	addElement("indexPage_background_div", null, "body", "div");
	
	addElement("indexPage_title_div", null, "body", "div");
	document.getElementById("indexPage_title_div").innerHTML = "UCARDSTORE";
	
	addElement("indexPage_signUpButton_div", null, "body", "div");
	document.getElementById("indexPage_signUpButton_div").innerHTML = "SIGN UP";
	document.getElementById("indexPage_signUpButton_div").addEventListener("click", function()
	{
    	location.href = "signUp.html";
	}, false);
	
	addElement("indexPage_signInButton_div", null, "body", "div");
	document.getElementById("indexPage_signInButton_div").innerHTML = "SIGN IN";
	document.getElementById("indexPage_signInButton_div").addEventListener("click", function()
	{
    	location.href = "signIn.html";
	}, false);
}

function loadIndexPageStyles()
{
	sheet.insertRule(
	"#indexPage_background_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		
		"left:0px;"																			+
		"top:0px;"																			+
		"width:"+portWidth																	+"px;"+
		"height:"+portHeight																+"px;"+
		"background:url(../images/indexPageImgs/indexBackgroundImg.jpg);"						+
		"background-size:100% 100%;"														+
		//"background-color:"+test_color														+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#indexPage_title_div" 																	+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+3*zUnit																+"px;"+
		"color:rgb(240,240,240);"															+
		"text-align:center;"																+
		"text-shadow:"+indexPage_title_div_textShadow										+";"+
		
		"left:"+indexPage_title_div_x														+"px;"+
		"top:"+indexPage_title_div_y														+"px;"+
		"width:"+indexPage_title_div_width													+"px;"+
		"height:"+indexPage_title_div_height												+"px;"+
		//"background-color:"+test_color													+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#indexPage_signUpButton_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"cursor:pointer;"																	+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(100,100,100);"															+
		"text-align:center;"																+
		
		"left:"+indexPage_signUpButton_div_x												+"px;"+
		"top:"+indexPage_signUpButton_div_y													+"px;"+
		"width:"+indexPage_signUpButton_div_width											+"px;"+
		"height:"+indexPage_signUpButton_div_height											+"px;"+
		"background-color:"+indexPage_signUpButton_div_bgColor								+";"+
		"border:"+indexPage_signUpButton_div_border											+";"+
		"border-radius:"+0.2*zUnit															+"px;"+
		"-webkit-box-shadow:"+indexPage_signUpButton_div_borderBoxShadow					+";"+
				"box-shadow:"+indexPage_signUpButton_div_borderBoxShadow					+";"+
		"-webkit-transition:background-color "+indexPage_buttonHoverTime+"s, " 				+
							"border-color "+indexPage_buttonHoverTime+"s, " 				+
							"color "+indexPage_buttonHoverTime+"s, " 						+
							"-webkit-box-shadow "+indexPage_buttonHoverTime+"s" 			+";"+
				"transition:background-color "+indexPage_buttonHoverTime+"s, " 				+
							"border-color "+indexPage_buttonHoverTime+"s, " 				+
							"color "+indexPage_buttonHoverTime+"s, " 						+
							"box-shadow "+indexPage_buttonHoverTime+"s" 					+";"+
	"}" 
	,1);
	sheet.insertRule(
	"#indexPage_signUpButton_div:hover" 													+ 
	"{" 																					+
		"background-color:"+indexPage_signUpButton_div_bgColorHover							+";"+
		"border-color:"+indexPage_signUpButton_div_borderColorHover							+";"+
		"color:rgb(255,255,255);"																+
		"-webkit-box-shadow:"+indexPage_signUpButton_div_borderBoxShadowHover				+";"+
				"box-shadow:"+indexPage_signUpButton_div_borderBoxShadowHover				+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#indexPage_signInButton_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"cursor:pointer;"																	+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(180,180,180);"															+
		"text-align:center;"																+
		
		"left:"+indexPage_signInButton_div_x												+"px;"+
		"top:"+indexPage_signInButton_div_y													+"px;"+
		"width:"+indexPage_signInButton_div_width											+"px;"+
		"height:"+indexPage_signInButton_div_height											+"px;"+
		
		"-webkit-transition:background-color "+indexPage_buttonHoverTime+"s, " 				+
							"color "+indexPage_buttonHoverTime+"s;" 						+
				"transition:background-color "+indexPage_buttonHoverTime+"s, " 				+
							"color "+indexPage_buttonHoverTime+"s;" 						+
	"}" 
	,1);
	sheet.insertRule(
	"#indexPage_signInButton_div:hover" 													+ 
	"{" 																					+
		"color:rgb(255,255,255);"															+
	"}" 
	,1);
}