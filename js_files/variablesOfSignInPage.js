//elements variables - start -------------------------------------------------------------------------------------------------------------

	var signInPage_buttonHoverTime = 0.2;
	
	var signInPage_nameLabel_div_width = portWidth / 6;
	var signInPage_nameLabel_div_height = portHeight / 24;
	var signInPage_nameLabel_div_x = (portWidth - signInPage_nameLabel_div_width)/2 - signInPage_nameLabel_div_width/2;
	var signInPage_nameLabel_div_y = portHeight / 3;
	
	var signInPage_nameInput_input_width = signInPage_nameLabel_div_width;
	var signInPage_nameInput_input_height = signInPage_nameLabel_div_height;
	var signInPage_nameInput_input_x = signInPage_nameLabel_div_x + signInPage_nameLabel_div_width;
	var signInPage_nameInput_input_y = portHeight / 3;
	
	var signInPage_passwordLabel_div_width = signInPage_nameLabel_div_width;
	var signInPage_passwordLabel_div_height = signInPage_nameLabel_div_height;
	var signInPage_passwordLabel_div_x = signInPage_nameLabel_div_x;
	var signInPage_passwordLabel_div_y = signInPage_nameLabel_div_y + 1.5*signInPage_nameLabel_div_height;
	
	var signInPage_passwordInput_input_width = signInPage_nameLabel_div_width;
	var signInPage_passwordInput_input_height = signInPage_nameLabel_div_height;
	var signInPage_passwordInput_input_x = signInPage_passwordLabel_div_x + signInPage_passwordLabel_div_width;
	var signInPage_passwordInput_input_y = signInPage_passwordLabel_div_y;
	
	var signInPage_inputArea_bgColor = "rgba(71,106,7,0.3)";
	
	var signInPage_submit_button_width = signInPage_nameLabel_div_width / 2;
	var signInPage_submit_button_height = signInPage_nameLabel_div_height;
	var signInPage_submit_button_x = signInPage_passwordInput_input_x + signInPage_nameLabel_div_width - signInPage_submit_button_width;
	var signInPage_submit_button_y = signInPage_passwordLabel_div_y + 1.5*signInPage_nameLabel_div_height;
	
	var signInPage_submit_button_bgColor = "rgba(71,106,7,0.3)";
	var signInPage_submit_button_bgColorHover = "rgba(115,168,43,1)";
	var signInPage_submit_button_outerShadowColor = "rgba(0,0,0,0)";
	var signInPage_submit_button_outerShadowColorHover = "rgba(200,200,200,0.8)";
	var signInPage_submit_button_borderBoxShadow = "0 0 0px 0px "+signInPage_submit_button_outerShadowColor;
	var signInPage_submit_button_borderBoxShadowHover = "0 0 "+0.5*xUnit+"px "+0.2*xUnit+"px "+signInPage_submit_button_outerShadowColorHover;
	
	var signInPage_signUpButton_div_width = signInPage_nameLabel_div_width + xUnit;
	var signInPage_signUpButton_div_height = signInPage_nameLabel_div_height;
	var signInPage_signUpButton_div_x = signInPage_submit_button_x + signInPage_submit_button_width + xUnit;
	var signInPage_signUpButton_div_y = signInPage_submit_button_y + 0.8*yUnit;
	
	var signInPage_fgtPasswordButton_div_width = signInPage_signUpButton_div_width;
	var signInPage_fgtPasswordButton_div_height = signInPage_signUpButton_div_height;
	var signInPage_fgtPasswordButton_div_x = signInPage_nameLabel_div_x;
	var signInPage_fgtPasswordButton_div_y = signInPage_signUpButton_div_y;
	
	var signInPage_emailInfoLabel_div_width = signInPage_nameLabel_div_width;
	var signInPage_emailInfoLabel_div_height = signInPage_nameLabel_div_height;
	var signInPage_emailInfoLabel_div_x = signInPage_nameLabel_div_x;
	var signInPage_emailInfoLabel_div_y = signInPage_fgtPasswordButton_div_y + 1.5*signInPage_fgtPasswordButton_div_height;
	
	var signInPage_emailInfoInput_input_width = signInPage_nameLabel_div_width;
	var signInPage_emailInfoInput_input_height = signInPage_nameLabel_div_height;
	var signInPage_emailInfoInput_input_x = signInPage_nameInput_input_x;
	var signInPage_emailInfoInput_input_y = signInPage_emailInfoLabel_div_y;
	
	var signInPage_emailInfoSubmit_button_width = signInPage_submit_button_width;
	var signInPage_emailInfoSubmit_button_height = signInPage_submit_button_height;
	var signInPage_emailInfoSubmit_button_x = signInPage_submit_button_x;
	var signInPage_emailInfoSubmit_button_y = signInPage_emailInfoLabel_div_y + 1.5*signInPage_emailInfoLabel_div_height;
	
	var signInPage_emailInfoSubmit_button_bgColor = signInPage_submit_button_bgColor;
	var signInPage_emailInfoSubmit_button_bgColorHover = signInPage_submit_button_bgColorHover;
	var signInPage_emailInfoSubmit_button_outerShadowColor = signInPage_submit_button_outerShadowColor;
	var signInPage_emailInfoSubmit_button_outerShadowColorHover = signInPage_submit_button_outerShadowColorHover;
	var signInPage_emailInfoSubmit_button_borderBoxShadow = signInPage_submit_button_borderBoxShadow;
	var signInPage_emailInfoSubmit_button_borderBoxShadowHover = signInPage_submit_button_borderBoxShadowHover;
	
//elements variables - end ---------------------------------------------------------------------------------------------------------------