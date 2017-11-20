<?php

/*
Created and edited by 
Krasowski Marcin
13169
*/

	if( !empty($_POST['Destination']) & !empty($_POST['TravelerNumber']) )
	{
		$TravelerNumber = $_POST['TravelerNumber'];
		$Destination = $_POST['Destination'];
		$Insurance = isset($_POST['Insurance']) ? TRUE : FALSE;    
	
		$CurrentReservation->SetBasics($TravelerNumber,$Destination,$Insurance);
	
		require "AddTravelerInfoView.php";
	}
	else
	{
		include "BasicInfoView.php";
	}
?>