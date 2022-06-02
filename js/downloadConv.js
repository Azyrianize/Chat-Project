'use strict';
$('#button_downloadTxt').click(function()
{
	$.ajax({
		url: "php/downloadTxt.php",
		type: "POST",
		data: {
			"from_user_id": get_from_user_id,
			"to_user_id": get_to_user_id,
			"to_username": get_to_username
		},
		success: function(data){
			alert("Plik pomyślnie zapisany w katalogu 'Downloads'")
		}	
	});		
});

$('#button_downloadHtml').click(function()
{
	$.ajax({
		url: "php/downloadHtml.php",
		type: "POST",
		data: {
			"from_user_id": get_from_user_id,
			"to_user_id": get_to_user_id,
			"to_username": get_to_username
		},
		success: function(data){
			alert("Plik pomyślnie zapisany w katalogu 'Downloads'")
		}
	});		
});

$('#button_downloadJson').click(function()
{
	$.ajax({
		url: "php/downloadJson.php",
		type: "POST",
		data: {
			"from_user_id": get_from_user_id,
			"to_user_id": get_to_user_id,
			"to_username": get_to_username
		},
		success: function(data){
			alert("Plik pomyślnie zapisany w katalogu 'Downloads'")
		}
	});		
});