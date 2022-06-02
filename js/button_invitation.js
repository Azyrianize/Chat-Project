'use strict';

$('#button_invitation').click(function(){		
		make_invitation_box();
		$("#addInvitationBox").dialog({
		   title: "Lista zaproszeń do znajomych",
		   autoOpen:false,
		   width:400,
		   draggable: false,
		   modal: true,
		   resizable: false
		});
		
		$('#addInvitationBox').dialog('open');
		 
	});