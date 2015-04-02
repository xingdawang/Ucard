function buildSignUpPage()
{
	loadSignUpPageStyles();
	
	addElement("signUpPage_background_div", null, "body", "div");
	addElement("signUpPage_title_div", null, "body", "div");
	document.getElementById("signUpPage_title_div").innerHTML = "Sign up";
	
	addElement("signUpPage_signUpInfo_form", null, "body", "form"); //form id = "signUpPage_signUpInfo_form"
	document.getElementById("signUpPage_signUpInfo_form").action = "signUp.php"; //this action target at "signUp.php"
	document.getElementById("signUpPage_signUpInfo_form").method = "post";
	document.getElementById("signUpPage_signUpInfo_form").style.color = "color:rgb(230,230,230)";
	
	addElement("signUpPage_emailInput_input", null, "signUpPage_signUpInfo_form", "input");
	document.getElementById("signUpPage_emailInput_input").type = "text";
	document.getElementById("signUpPage_emailInput_input").name = "signUp_email_input"; //email input. name = "signUp_email_input"
	document.getElementById("signUpPage_emailInput_input").placeholder = "email address";
	
	addElement("signUpPage_nameInput_input", null, "signUpPage_signUpInfo_form", "input");
	document.getElementById("signUpPage_nameInput_input").type = "text";
	document.getElementById("signUpPage_nameInput_input").name = "signUp_name_input"; //nickname input. name = "signUp_name_input"
	document.getElementById("signUpPage_nameInput_input").placeholder = "name";
	
	addElement("signUpPage_passwordInput_input", null, "signUpPage_signUpInfo_form", "input");
	document.getElementById("signUpPage_passwordInput_input").type = "text";
	document.getElementById("signUpPage_passwordInput_input").name = "signUp_password_input"; //password input. name = "signUp_password_input"
	document.getElementById("signUpPage_passwordInput_input").placeholder = "password";
	
	addElement("signUpPage_passwordConfirmInput_input", null, "signUpPage_signUpInfo_form", "input");
	document.getElementById("signUpPage_passwordConfirmInput_input").type = "text";
	document.getElementById("signUpPage_passwordConfirmInput_input").name = "signUp_passwordConfirm_input"; //password confirmation input. name = "signUp_passwordConfirmation_input"
	document.getElementById("signUpPage_passwordConfirmInput_input").placeholder = "confirm password";
	
	addElement("signUpPage_submit_button", null, "signUpPage_signUpInfo_form", "input");
	document.getElementById("signUpPage_submit_button").type = "submit";
	document.getElementById("signUpPage_submit_button").value = "Create account";
}

function loadSignUpPageStyles()
{
	sheet.insertRule(
	"#signUpPage_background_div" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		
		"left:0px;"																			+
		"top:0px;"																			+
		"width:"+portWidth																	+"px;"+
		"height:"+portHeight																+"px;"+
		"background:url(../images/signUpPageImgs/signUpBackgroundImg.jpg);"					+
		"background-size:100% 100%;"														+
		//"background-color:"+test_color														+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signUpPage_title_div" 																+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+2*zUnit																+"px;"+
		"color:rgb(240,240,240);"															+
		"text-shadow:"+signUpPage_title_div_textShadow										+";"+
		
		"left:"+signUpPage_title_div_x														+"px;"+
		"top:"+signUpPage_title_div_y														+"px;"+
		"width:"+signUpPage_title_div_width													+"px;"+
		"height:"+signUpPage_title_div_height												+"px;"+
		//"background-color:"+test_color													+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signUpPage_emailInput_input" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signUpPage_emailInput_input_x												+"px;"+
		"top:"+signUpPage_emailInput_input_y													+"px;"+
		"width:"+signUpPage_emailInput_input_width											+"px;"+
		"height:"+signUpPage_emailInput_input_height											+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signUpPage_inputArea_bgColor									+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signUpPage_nameInput_input" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signUpPage_nameInput_input_x												+"px;"+
		"top:"+signUpPage_nameInput_input_y													+"px;"+
		"width:"+signUpPage_nameInput_input_width											+"px;"+
		"height:"+signUpPage_nameInput_input_height											+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signUpPage_inputArea_bgColor									+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signUpPage_passwordInput_input" 														+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signUpPage_passwordInput_input_x											+"px;"+
		"top:"+signUpPage_passwordInput_input_y												+"px;"+
		"width:"+signUpPage_passwordInput_input_width										+"px;"+
		"height:"+signUpPage_passwordInput_input_height										+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signUpPage_inputArea_bgColor									+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signUpPage_passwordConfirmInput_input" 												+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+zUnit																	+"px;"+
		"color:rgb(230,230,230);"															+
		
		"left:"+signUpPage_passwordConfirmInput_input_x										+"px;"+
		"top:"+signUpPage_passwordConfirmInput_input_y										+"px;"+
		"width:"+signUpPage_passwordConfirmInput_input_width								+"px;"+
		"height:"+signUpPage_passwordConfirmInput_input_height								+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signUpPage_inputArea_bgColor									+";"+
	"}" 
	,1);
	
	sheet.insertRule(
	"#signUpPage_submit_button" 															+ 
	"{" 																					+
		"position:absolute;"																+
		"font-size:"+0.8*zUnit																+"px;"+
		"cursor:pointer;"																	+
		"color:rgb(180,180,180);"															+
		
		"left:"+signUpPage_submit_button_x													+"px;"+
		"top:"+signUpPage_submit_button_y													+"px;"+
		"width:"+signUpPage_submit_button_width												+"px;"+
		"height:"+signUpPage_submit_button_height											+"px;"+
		"border-radius:"+0.3*zUnit															+"px;"+
		"background-color:"+signUpPage_submit_button_bgColor								+";"+
		"-webkit-box-shadow:"+signUpPage_submit_button_borderBoxShadow						+";"+
				"box-shadow:"+signUpPage_submit_button_borderBoxShadow						+";"+
		"-webkit-transition:background-color "+signInPage_buttonHoverTime+"s, " 			+
							"color "+signInPage_buttonHoverTime+"s, " 						+
							"-webkit-box-shadow "+signInPage_buttonHoverTime+"s" 			+";"+
				"transition:background-color "+signInPage_buttonHoverTime+"s, " 			+
							"color "+signInPage_buttonHoverTime+"s, " 						+
							"box-shadow "+signInPage_buttonHoverTime+"s" 					+";"+
	"}" 
	,1);
	sheet.insertRule(
	"#signUpPage_submit_button:hover" 														+ 
	"{" 																					+
		"background-color:"+signUpPage_submit_button_bgColorHover							+";"+
		"color:rgb(100,100,100);"															+
		"-webkit-box-shadow:"+signUpPage_submit_button_borderBoxShadowHover					+";"+
				"box-shadow:"+signUpPage_submit_button_borderBoxShadowHover					+";"+
	"}" 
	,1);
}