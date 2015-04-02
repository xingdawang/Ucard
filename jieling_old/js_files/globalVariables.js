//basic variables - start ----------------------------------------------------------------------------------------------------------------
	
	var sheet = document.styleSheets[0];

	var minWidth = 840;//px
	var minHeight = 630;//px

	var portWidth;
	var portHeight;

	if(document.documentElement.clientWidth <= minWidth)
		portWidth = minWidth;
	else
		portWidth = document.documentElement.clientWidth;
	
	if(document.documentElement.clientHeight <= minHeight)
		portHeight = minHeight;
	else
		portHeight = document.documentElement.clientHeight;
	
	var xUnit = portWidth*0.01;
	var yUnit = portHeight*0.01;
	var zUnit = portWidth/70;
	
	var test_color = "rgb(0,255,255)";
	
//basic variables - end ------------------------------------------------------------------------------------------------------------------
