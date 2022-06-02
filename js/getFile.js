'use strict';
var counter=0;
$("#chat").click(function() {
		
	$(".filename").click(function() {
			var fileid = $(".filename");
			//console.log(fileid.dataset.fileid);
			var size = $(".filename").length;
			console.log(fileid);
			for(var i=0; i<size;i++)
			{
				
				console.log($(".filename")[i]);
			}
	});
		
});
	

  
