'use strict';



$('#button_send').click(function(){
		var mess_content = document.getElementById("send_message").value;
		
		if(document.getElementById("upload").value != "")
		{
			var extension = document.getElementById("upload").value;
			extension = extension.replace(/^.*[\\\/]/, '')
			extension = extension.substr(extension.length - 4);
			var file_data = $('#upload').prop('files')[0];   
			var form_data = new FormData();
			var filename = document.getElementById("upload").value;
			filename = filename.replace(/^.*[\\\/]/, '');
			form_data.append('file', file_data);
			form_data.append('from_user_id', get_from_user_id);
			form_data.append('to_user_id', get_to_user_id);
			form_data.append('extention', extension);
			form_data.append('filename', filename);
			
			$.ajax({
					url: 'php/sendFile.php', 
					dataType: 'text', 
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(data)
					{
						$.ajax({
							url: "php/sendMessage.php",
							type: "POST",
							data: {
								"from_user_id": get_from_user_id,
								"to_user_id": get_to_user_id,
								"mess_content": "FILE",
								"file_id": data,
								"file_index": true
							},
							success: function(data)
							{	
								$.get("php/getMessage.php", 
								{
									from_user_id: get_from_user_id,
									to_user_id: get_to_user_id,
									to_username: get_to_username,
									file_id: data,
									filename: filename,
									"file_index": true
								}, 
								function(data){
									location.reload();
								});	
							}
						});
					}
			});

					
		}
					
		if(document.getElementById("send_message").value != "")
		{
			$.ajax({
				url: "php/sendMessage.php",
				type: "POST",
				data: {
					"from_user_id": get_from_user_id,
					"to_user_id": get_to_user_id,
					"mess_content": mess_content,
					"file_index": false
				}
			});
			
			$.get("php/getMessage.php", 
			{
				from_user_id: get_from_user_id,
				to_user_id: get_to_user_id,
				to_username: get_to_username,
				"file_index": false
			}, 
			function(data){
				$("#chat").html(data);
			});
		}
		
		
		
		
		document.getElementById("send_message").value = "";		
		document.getElementById("upload").value = "";
		document.getElementById("uploaded_file").innerText = "Nie wybrano żadnego pliku";
		
});	

