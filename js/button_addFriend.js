'use strict';

$('#button_addFriend').click(function(){		
		make_add_friend_box();
		$("#addFriendBox").dialog({
		   title: "Dodaj znajomego",
		   autoOpen:false,
		   width:400,
		   draggable: false,
		   modal: true,
		   resizable: false
		});
		
		$('#addFriendBox').dialog('open');
		document.getElementById("dialogLabel_error").innerHTML = "";
		document.getElementById("dialogTxt_addFriend").value = "";
		
		$('#dialogButton_addFriend').click(function(){
			
			var addUsername = document.getElementById("dialogTxt_addFriend").value;

			$.ajax({
				url: "php/addFriend.php",
				type: "POST",
				data: {
						"from_user_id": from_user_id,
						"from_username": from_username,
						"add_username": addUsername
				},
				success:function(data){
					$("#dialogLabel_error").html(data);
					document.getElementById("dialogTxt_addFriend").value = "";
				}
			});
		}); 
	});