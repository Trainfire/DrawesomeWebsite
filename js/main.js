$(document).ready(resizePage);
$(window).resize(resizePage);

function resizePage(animate)
{
	var targetWidth = 1280;
	var windowWidth = $(window).width();
	
	if (windowWidth > 1280)
	{
		targetWidth =  1280;
	}
	else
	{
		targetWidth = 960;
	}
	
	$('body').animate({width:targetWidth}, 500);
	$('canvas').animate({width:targetWidth}, 500);
}