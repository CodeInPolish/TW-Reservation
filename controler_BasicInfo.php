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
		$TravelerNumber = intval(htmlspecialchars($_POST['TravelerNumber']));
		$Destination = htmlspecialchars($_POST['Destination']);
		$Insurance = isset($_POST['Insurance']) ? TRUE : FALSE; 
		
		$error_obj = new ShowError();

		if($TravelerNumber<=0 or $TravelerNumber>10)
		{
			$error_obj->SetTravelerNumberError();
		}

		if(!$CurrentReservation->CheckDestination($Destination))
		{
			$error_obj->SetDestinationError();
		}

		if(!$error_obj->CheckIfErrors())
		{
			$CurrentReservation->SetBasics(intval($TravelerNumber),$Destination,$Insurance);
			
			$_SESSION['reservation'] = serialize($CurrentReservation);

			require "controler_AddTravelerInfo.php";
		}
		else
		{
			//il faut serialize le message d'erreur. Puis le deserialize pour le lire ;)
			require "BasicInfoView.php";
		}
	}
	else
	{
		include "BasicInfoView.php";
	}
?>