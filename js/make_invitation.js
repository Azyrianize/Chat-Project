'use strict';

function make_invitation_box()
	{
		var modal_content = '<div id="addInvitationBox">';
		modal_content += '<div style=" border:1px solid #ccc; overflow-y: hidden; margin-bottom:5px; padding:10px;">';
			
		modal_content += '<div class="dialogLabel_Invitation">';
		$.get("php/getInvitation.php", 
		{
			from_user_id: from_user_id
		}, 
		function(data){
				
			$(".dialogLabel_Invitation").html(data);
						
		});
	
		modal_content += '</div>';

		
		modal_content += '</div></div>';
		
		
	
		$('#showInvitations').html(modal_content);
		
		
		
		
	}
	