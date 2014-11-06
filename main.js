
$( document ).ready(function() {


   //
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

	// Event 
	var eventJson = $.parseJSON('{"activityid":"BINTO1067U_LA_E14","eventid":"BINTO1067U_LA_E14_714ff8c1a1d8f5e918829fef3ff92a0f_23e125dbca8f1d6655b7a40a77481a82","type":"Exercise","title":"BINTO1067U.LA_E14","description":"Distribuerede systemer (LA)","start":["2014",8,"15","8","00"],"end":["2014",8,"15","9","40"],"location":"SP213"}');
	//console.log(eventJson.description);
	var dateDayStart		= parseInt(eventJson.start[2]);
	var dateTimeStartHour	= parseInt(eventJson.start[3]);
	var dateTimeStartMin	= parseInt(eventJson.start[4]);

	var dateDayEnd 			= parseInt(eventJson.end[2]);
	var dateTimeEndHour		= parseInt(eventJson.end[3]);
	var dateTimeEndMin		= parseInt(eventJson.end[4]);

	var startPos = ((dateTimeStartHour-8) * 60) + dateTimeStartMin+60;
	var endPos = ((dateTimeEndHour-8) * 60) + dateTimeEndMin+60;
	var duration = endPos-startPos;


	console.log(startPos);
	console.log(endPos);
	console.log(duration);

});
