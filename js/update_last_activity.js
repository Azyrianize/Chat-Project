'use strict';

function update_last_activity()
{
	$.ajax({
		url:"php/update_last_activity.php",
		success:function(){}
	})
}

setInterval(function(){
	update_last_activity();
}, 1000);	