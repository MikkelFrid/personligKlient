<?php

include 'tcpConnection.php';
include 'createNote.php';

session_start();

if(isset($_POST['note'])){
	$note = new createNote();

	$note->eventid = $_POST['eventid'];
	$note->noteText = $_POST['note'];
	$note->noteCreatedBy = $_SESSION['user']['userID'];

	$response = tcpConnect($note);
	if($response == "New note created"){
		header("refresh:2;url=month.php");
		echo "Note has been created. Redirecting back to calendar. Please wait...";
	}else{
		header("refresh:2;url=month.php");
		echo "Note not created. Redirecting back to calendar. Please wait...";
	}
}





?>