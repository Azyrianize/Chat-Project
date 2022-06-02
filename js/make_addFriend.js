'use strict';

function make_add_friend_box()
	{
		var modal_content = '<div id="addFriendBox">';
		modal_content += '<div style=" border:1px solid #ccc; overflow-y: hidden; margin-bottom:14px; padding:16px;">';
		modal_content += '<label id="dialogLabel_addFriend">Wpisz nazwę użytkownika:</label>';
		modal_content += '<input type="text" id="dialogTxt_addFriend">';
		modal_content += '<label id="dialogLabel_error"></label>';
		modal_content += '<input type="submit" id="dialogButton_addFriend" value="Potwierdź">';
		modal_content += '</div></div>';
		$('#addFriend').html(modal_content);
	}