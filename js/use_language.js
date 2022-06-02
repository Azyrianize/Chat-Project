'use strict';

$('#languages #pl').click(function(){
	$.ajax({
		url: "php/changeLanguage.php",
		type: "POST",
		data: {
				language: "pl"
		},
		success: function(data)
		{
			window.location.reload();
		}
	});
});

$('#languages #uk').click(function(){
	$.ajax({
		url: "php/changeLanguage.php",
		type: "POST",
		data: {
				language: "uk"
		},
		success: function(data)
		{
			window.location.reload();
		}
	});
});