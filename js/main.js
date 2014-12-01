
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
					"width"   : "85%"
				});
				break;

			case "show": 
				weekdayHideShow = "hide"

				$(".weekdaybody").css("display","block"); 

				$(".weekdaybody").css({
					"display" : "block", 
					"width"   : "13%"
				});
				break;
		}
	});

	$(function(){
		 $("#createCalendar").click(function() {
			$(".add-event").css("opacity","0"); 
			$(".add-event-button").css("opacity","0"); 					
			
			setTimeout(
				  function() 
				  {
				    $(".add-event").css("display","none"); 
				    $(".add-event-button").css("display","none"); 

					$(".add-calendar").css("opacity","1"); 
					$(".add-calendar-button").css("opacity","1"); 	
					$(".add-calendar").css("display","block"); 
					$(".add-calendar-button").css("display","block"); 					    
				  }, 500);
		 });
	});

	$(function(){
		 $("#createEvent").click(function() {
			$(".add-calendar").css("opacity","0"); 
			$(".add-calendar-button").css("opacity","0"); 					
			
			setTimeout(
				  function() 
				  {
				    $(".add-calendar").css("display","none"); 
				    $(".add-calendar-button").css("display","none"); 

					$(".add-event").css("opacity","1"); 
					$(".add-event-button").css("opacity","1"); 	
					$(".add-event").css("display","block"); 
					$(".add-event-button").css("display","block"); 					    
				  }, 500);
		 });
	});	

	$(function(){
	    $("#add-event").submit(function(e) {       
	    	e.preventDefault();

	    	$eventTitle 	= $("#add-event #title").val();
	    	$eventLoc   	= $("#add-event #location").val();
	    	$eventDateStart = $("#add-event #dateStart").val() + " " + $("#add-event #startTime").val() + ".00";
	    	$eventDateEnd   = $("#add-event #dateEnd").val() + " " + $("#add-event #endTime").val() + ".00";
	    	$eventDes 	    = $("#add-event #description").val();
	    	$eventType	    = $("#add-event #type").val();
	    	$eventCal	    = $("#add-event #calendar").val();

	    	console.log($eventDateStart);
	    	console.log($eventDateEnd);

			$.ajax({
			   url: 'newEventAjax.php',
			   data: {
				  	title : $eventTitle,
				 	location : $eventLoc,
					startDate : $eventDateStart,
				  	endDate : $eventDateEnd,
					type : $eventType,
				 	calendar : $eventCal,
 					description : $eventDes 
			   },
			   error: function() {
			      alert('An error has occurred. Please try again.');
			   },
			   success: function(data) {
			   	  alert(data);
			   },
			   type: 'POST'
			});

	    });
	});

});

