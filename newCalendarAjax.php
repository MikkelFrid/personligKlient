<?php  

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

include "createCalendar.php";
include "tcpConnection.php";

session_start();

if($_POST){
	$calendar = new createCalendar();

	$calendar->calenderName	= $_POST['title'];
	$calendar->userName 	= $_SESSION['user']['userLoggedIn'];
	$calendar->sharedto 	= $_POST['sharedto'];
	$calendar->PublicOrPrivate = $_POST['privatPublic'];

	if(tcpConnect($calendar) == "sucess"){
		echo "Calendar succesfully created!";
	}else{
		echo "Calendar was not created, try again";
	}

}




?>