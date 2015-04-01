//functions for removing and adding elements - start -------------------------------------------------------------------------------------
function removeElement(targetId)
{
	var target = document.getElementById(targetId);
	target.parentNode.removeChild(target);
}

function addElement(targetId, targetClass, parentId, type)
{
	var target = document.createElement(type);
		
	target.id = targetId;
	
	if(targetClass != null)
	{
		target.className = targetClass;
	}
	
	if(parentId == "body")
	{
		document.body.appendChild(target);
	}
	else
	{
		document.getElementById(parentId).appendChild(target);
	}
}
//functions for removing and adding elements - end ---------------------------------------------------------------------------------------


























//function for generating random number - start ------------------------------------------------------------------------------------------
function getRandomNumber(minumum, maximum)
{
	return Math.random()*(maximum - minumum) + minumum;
}
//function for generating random number - end --------------------------------------------------------------------------------------------

