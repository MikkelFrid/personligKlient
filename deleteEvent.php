<?php

include 'tcpConnection.php';
include 'deleteEventClass.php';

if(isset($_POST['deleteEvent'])){
	$event = new deleteEvent();

	$event->eventid = $_POST['deleteEvent'];

	$response = tcpConnect($event);
	// if($response == "Calender has been deleted"){
	// 	header("refresh:2;url=month.php");
	// 	echo "Calender has been deleted. Redirecting back to calendar. Please wait...";
	// }else{
	// 	header("refresh:2;url=month.php");
	// 	echo $response . ". Redirecting back to calendar. Please wait...";
	// }
	if($response == "success"){
		header("refresh:2;url=month.php");
		echo "Event deleted succesfully. Redirecting back to calendar. Please wait...";
	}elseif($response == "fejl"){
		header("refresh:2;url=month.php");
		echo "Something went wrong. Please try agian. Redirecting back to calendar. Please wait...";
	}
}




?>