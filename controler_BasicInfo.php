<?php

/*
Created and edited by 
Krasowski Marcin
13169
*/

if(!isset($CurrentReservation))
{
	$CurrentReservation = new Reservation ();
}

	if( !empty($_POST['Destination']) & !empty($_POST['TravelerNumber']) )
	{
		$TravelerNumber = $_POST['TravelerNumber'];
		$Destination = $_POST['Destination'];
		$Insurance = isset($_POST['Insurance']) ? TRUE : FALSE; 
		
		$CurrentReservation = new Reservation ();
	
		$CurrentReservation->SetBasics(intval($TravelerNumber),$Destination,$Insurance);
		
		$_SESSION['reservation'] = serialize($CurrentReservation);

		require "controler_AddTravelerInfo.php";
	}
	else
	{
		include "BasicInfoView.php";
	}
?>