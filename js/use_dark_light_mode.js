'use strict';

if(window.localStorage.getItem('mode')=== null)
{
	window.localStorage.setItem('mode', 'light');
}

$('#typeMode #light').click(function(){
	window.localStorage.removeItem('mode');
	window.localStorage.setItem('mode', 'light');
	
	$.ajax({
		url: "php/viewMode.php",
		type: "POST",
		data: {
				"mode": window.localStorage.getItem('mode')
		},
		success: function(data)
		{
			window.location.reload();
		}
	});
});
		
$('#typeMode #dark').click(function(){
	window.localStorage.removeItem('mode');
	window.localStorage.setItem('mode', 'dark');
	
	$.ajax({
		url: "php/viewMode.php",
		type: "POST",
		data: {
				"mode": window.localStorage.getItem('mode')
		},
		success: function(data)
		{
			window.location.reload();
		}
	});
});
