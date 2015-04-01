function buildSignInPage()
{
	loadSignInPageStyles();
	
	addElement("signInPage_background_div", null, "body", "div");
	
	addElement("signInPage_signInInfo_form", null, "body", "form");
	document.getElementById("signInPage_signInInfo_form").action = "login.php"; //this action target at "checkLogin.php"
	document.getElementById("signInPage_signInInfo_form").method = "post";
	document.getElementById("signInPage_signInInfo_form").style.color = "color:rgb(230,230,230)";
	
	addElement("signInPage_nameLabel_div", null, "signInPage_signInInfo_form", "div");
	document.getElementById("signInPage_nameLabel_div").innerHTML = "Nick Name/Email:";
	
	addElement("signInPage_passwordLabel_div", null, "signInPage_signInInfo_form", "div");
	document.getElementById("signInPage_passwordLabel_div").innerHTML = "Password:";
	
	addElement("signInPage_nameInput_input", null, "signInPage_signInInfo_form", "input");
	document.getElementById("signInPage_nameInput_input").type = "text";
	document.getElementById("signInPage_nameInput_input").name = "signIn_name_input"; //nickname input. name = "signInPage_nameInput_input"
	
	addElement("signInPage_passwordInput_input", null, "signInPage_signInInfo_form", "input");
	document.getElementById("signInPage_passwordInput_input").type = "text";
	document.getElementById("signInPage_passwordInput_input").name = "signIn_password_input"; //password input. name = "signIn_password_input"
	
	addElement("signInPage_submit_button", null, "signInPage_signInInfo_form", "input");
	document.getElementById("signInPage_submit_button").type = "submit";
	document.getElementById("signInPage_submit_button").value = "SIGN IN";
	
	addElement("signInPage_signUpButton_div", null, "body", "div");
	document.getElementById("signInPage_signUpButton_div").innerHTML = "Don't have an account?";
	document.getElementById("signInPage_signUpButton_div").addEventListener("click", function()
	{
    	location.href = "signUp.html";
	}, false);
	
	addElement("signInPage_fgtPasswordButton_div", null, "body", "div");
	document.getElementById("signInPage_fgtPasswordButton_div").innerHTML = "Forget your password?";
	document.getElementById("signInPage_fgtPasswordButton_div").addEventListener("click", function()
	{
    	document.getElementById("signInPage_fgtPasswordButton_div").style.WebkitAnimationPlayState = "running";
    	document.getElementById("signInPage_fgtPasswordButton_div").style.animationPlayState = "running";
		document.getElementById("signInPage_fgtPasswordButton_div").style.cursor = "default";
		
		addElement("signInPage_emailInfo_form", null, "body", "form");
		document.getElementById("signInPage_emailInfo_form").action = "forgetPassword.php"; //this action target at "forgetPassword.php"
		document.getElementById("signInPage_emailInfo_form").method = "post";
		document.getElementById("signInPage_emailInfo_form").style.color = "color:rgb(230,230,230)";
		
		addElement("signInPage_emailInfoLabel_div", null, "signInPage_emailInfo_form", "div");
		document.getElementById("signInPage_emailInfoLabel_div").innerHTML = "Just give us your email:";
		
		addElement("signInPage_emailInfoInput_input", null, "signInPage_emailInfo_form", "input");
		document.getElementById("signInPage_emailInfoInput_input").type = "text";
		document.getElementById("signInPage_emailInfoInput_input").name = "signIn_email_input"; //email input. name = "signIn_email_input"
		
		addElement("signInPage_emailInfoSubmit_button", null, "signInPage_emailInfo_form", "input");
		document.getElementById("signInPage_emailInfoSubmit_button").type = "submit";
		document.getElementById("signInPage_emailInfoSubmit_button").value = "CONFIRM";
	}, false);
}

function loadSignInPageStyles()
{
	sheet.insertRule(
	"#signInPage_background_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		
		"left:0px;"																			+
		"top:0px;"																			+
		"width:"+portWidth																	+"px;"+
		"height:"+portHeight																+"px;"+
		"background:url(../images/signInPageImgs/signInBackgroundImg.jpg);"					+
		"background-size:100% 100%;"														+
		//"background-color:"+test_color														+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_nameLabel_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		
		"left:"+signInPage_nameLabel_div_x													+"px;"+
		"top:"+signInPage_nameLabel_div_y													+"px;"+
		"width:"+signInPage_nameLabel_div_width												+"px;"+
		"height:"+signInPage_nameLabel_div_height											+"px;"+
		//"background-color:"+test_color														+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_passwordLabel_div" 														+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		
		"left:"+signInPage_passwordLabel_div_x												+"px;"+
		"top:"+signInPage_passwordLabel_div_y												+"px;"+
		"width:"+signInPage_passwordLabel_div_width											+"px;"+
		"height:"+signInPage_passwordLabel_div_height										+"px;"+
		//"background-color:"+test_color														+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_nameInput_input" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signInPage_nameInput_input_x												+"px;"+
		"top:"+signInPage_nameInput_input_y													+"px;"+
		"width:"+signInPage_nameInput_input_width											+"px;"+
		"height:"+signInPage_nameInput_input_height											+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signInPage_inputArea_bgColor									+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_passwordInput_input" 														+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signInPage_passwordInput_input_x											+"px;"+
		"top:"+signInPage_passwordInput_input_y												+"px;"+
		"width:"+signInPage_passwordInput_input_width										+"px;"+
		"height:"+signInPage_passwordInput_input_height										+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signInPage_inputArea_bgColor									+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_submit_button" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+0.8*zUnit																+"px;"+
		"cursor:pointer;"																	+
		"color:rgb(180,180,180);"															+
		
		"left:"+signInPage_submit_button_x													+"px;"+
		"top:"+signInPage_submit_button_y													+"px;"+
		"width:"+signInPage_submit_button_width												+"px;"+
		"height:"+signInPage_submit_button_height											+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signInPage_submit_button_bgColor								+";"+
		"-webkit-box-shadow:"+signInPage_submit_button_borderBoxShadow						+";"+
				"box-shadow:"+signInPage_submit_button_borderBoxShadow						+";"+
		"-webkit-transition:background-color "+signInPage_buttonHoverTime+"s, " 			+
							"color "+signInPage_buttonHoverTime+"s, " 						+
							"-webkit-box-shadow "+signInPage_buttonHoverTime+"s" 			+";"+
				"transition:background-color "+signInPage_buttonHoverTime+"s, " 			+
							"color "+signInPage_buttonHoverTime+"s, " 						+
							"box-shadow "+signInPage_buttonHoverTime+"s" 					+";"+
	"}" 
	,1);
	sheet.insertRule(
	"#signInPage_submit_button:hover" 														+ 
	"{" 																					+
		"background-color:"+signInPage_submit_button_bgColorHover							+";"+
		"color:rgb(100,100,100);"															+
		"-webkit-box-shadow:"+signInPage_submit_button_borderBoxShadowHover					+";"+
				"box-shadow:"+signInPage_submit_button_borderBoxShadowHover					+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_signUpButton_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"cursor:pointer;"																	+
		"font-size:"+0.8*zUnit																+"px;"+
		"color:rgb(200,200,200);"															+
		"text-align:center;"																+
		"text-shadow: 0px 0px "+0.3*xUnit+"px rgba(255,255,255,0.6);"						+
		
		"left:"+signInPage_signUpButton_div_x												+"px;"+
		"top:"+signInPage_signUpButton_div_y												+"px;"+
		"width:"+signInPage_signUpButton_div_width											+"px;"+
		"height:"+signInPage_signUpButton_div_height										+"px;"+
		//"background-color:"+test_color														+";"+
		
		"-webkit-transition:color "+signInPage_buttonHoverTime+"s, " 						+
				"text-shadow "+signInPage_buttonHoverTime+"s;" 								+
				"transition:color "+signInPage_buttonHoverTime+"s, " 						+
				"text-shadow "+signInPage_buttonHoverTime+"s;" 								+
	"}" 
	,1);
	sheet.insertRule(
	"#signInPage_signUpButton_div:hover" 													+ 
	"{" 																					+
		"color:rgb(255,255,255);"															+
		"text-shadow: 0px 0px "+xUnit+"px rgba(255,255,255,1);"								+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_fgtPasswordButton_div" 													+ 
	"{" 																					+
		"position:absolute;"																+
		"cursor:pointer;"																	+
		"font-size:"+0.8*zUnit																+"px;"+
		"color:rgb(200,200,200);"															+
		"text-shadow: 0px 0px "+0.3*xUnit+"px rgba(255,255,255,0.6);"						+
		
		"left:"+signInPage_fgtPasswordButton_div_x											+"px;"+
		"top:"+signInPage_fgtPasswordButton_div_y											+"px;"+
		"width:"+signInPage_fgtPasswordButton_div_width										+"px;"+
		"height:"+signInPage_fgtPasswordButton_div_height									+"px;"+
		//"background-color:"+test_color														+";"+
		
		"-webkit-transition:color "+signInPage_buttonHoverTime+"s, " 						+
				"text-shadow "+signInPage_buttonHoverTime+"s;" 								+
				"transition:color "+signInPage_buttonHoverTime+"s, " 						+
				"text-shadow "+signInPage_buttonHoverTime+"s;" 								+
				
		"-webkit-animation: hideSignInPageFgtPswrdLabel 0.5s ease-out forwards paused;"		+
				"animation: hideSignInPageFgtPswrdLabel 0.5s ease-out forwards paused;"		+
	"}" 
	,1);
	sheet.insertRule(
	"#signInPage_fgtPasswordButton_div:hover" 												+ 
	"{" 																					+
		"color:rgb(255,255,255);"															+
		"text-shadow: 0px 0px "+xUnit+"px rgba(255,255,255,1);"								+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_emailInfoLabel_div" 														+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		
		"left:"+signInPage_emailInfoLabel_div_x												+"px;"+
		"top:"+signInPage_emailInfoLabel_div_y												+"px;"+
		"width:"+signInPage_emailInfoLabel_div_width										+"px;"+
		"height:"+signInPage_emailInfoLabel_div_height										+"px;"+
		//"background-color:"+test_color														+";"+
							
		"-webkit-animation: showSignInPageEmailInfoForm 0.5s ease-out;"						+
				"animation: showSignInPageEmailInfoForm 0.5s ease-out;"						+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_emailInfoInput_input" 														+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signInPage_emailInfoInput_input_x											+"px;"+
		"top:"+signInPage_emailInfoInput_input_y											+"px;"+
		"width:"+signInPage_emailInfoInput_input_width										+"px;"+
		"height:"+signInPage_emailInfoInput_input_height									+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signInPage_inputArea_bgColor									+";"+
							
		"-webkit-animation: showSignInPageEmailInfoForm 0.5s ease-out;"						+
				"animation: showSignInPageEmailInfoForm 0.5s ease-out;"						+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signInPage_emailInfoSubmit_button" 													+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+0.8*zUnit																+"px;"+
		"cursor:pointer;"																	+
		"color:rgb(180,180,180);"															+
		
		"left:"+signInPage_emailInfoSubmit_button_x											+"px;"+
		"top:"+signInPage_emailInfoSubmit_button_y											+"px;"+
		"width:"+signInPage_emailInfoSubmit_button_width									+"px;"+
		"height:"+signInPage_emailInfoSubmit_button_height									+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signInPage_emailInfoSubmit_button_bgColor						+";"+
		"-webkit-box-shadow:"+signInPage_emailInfoSubmit_button_borderBoxShadow				+";"+
				"box-shadow:"+signInPage_emailInfoSubmit_button_borderBoxShadow				+";"+
		"-webkit-transition:background-color "+signInPage_buttonHoverTime+"s, " 			+
							"color "+signInPage_buttonHoverTime+"s, " 						+
							"-webkit-box-shadow "+signInPage_buttonHoverTime+"s" 			+";"+
				"transition:background-color "+signInPage_buttonHoverTime+"s, " 			+
							"color "+signInPage_buttonHoverTime+"s, " 						+
							"box-shadow "+signInPage_buttonHoverTime+"s" 					+";"+
							
		"-webkit-animation: showSignInPageEmailInfoForm 0.5s ease-out;"						+
				"animation: showSignInPageEmailInfoForm 0.5s ease-out;"						+
	"}" 
	,1);
	sheet.insertRule(
	"#signInPage_emailInfoSubmit_button:hover" 												+ 
	"{" 																					+
		"background-color:"+signInPage_emailInfoSubmit_button_bgColorHover					+";"+
		"color:rgb(100,100,100);"															+
		"-webkit-box-shadow:"+signInPage_emailInfoSubmit_button_borderBoxShadowHover		+";"+
				"box-shadow:"+signInPage_emailInfoSubmit_button_borderBoxShadowHover		+";"+
	"}" 
	,1);
}