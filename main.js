$( document ).ready(function() {
   
	weekdayHideShow = "hide";

	$(document).on("click", ".weekdaybody", function(e){
		switch(weekdayHideShow){
			case "hide": 
				weekdayHideShow = "show"
		
				$(".weekdaybody").css("display","none"); 

				$(this).css({
					"display" : "block", 
					"width"   : "93%"
				});
				break;

			case "show": 
				weekdayHideShow = "hide"

				$(".weekdaybody").css("display","block"); 

				$(".weekdaybody").css({
					"display" : "block", 
					"width"   : "12.6%"
				});
				break;
		}
	});
});