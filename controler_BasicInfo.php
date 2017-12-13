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


	if( !empty($_POST['Destination']) )
	{
		$error_obj = new ShowError();
		$TravelerNumber = 50;

		if(isset($_POST['TravelerNumber']))
		{
			$TravelerNumber = intval(htmlspecialchars($_POST['TravelerNumber']));
		}

		$Destination = htmlspecialchars($_POST['Destination']);
		$Insurance = isset($_POST['Insurance']) ? TRUE : FALSE; 
		

		if($TravelerNumber>=1 and $TravelerNumber<=10)
		{
			$error_obj->ResetTravelerNumberError();
		}

		if($CurrentReservation->CheckDestination($Destination))
		{
			$error_obj->ResetDestinationError();
		}

		if(!$error_obj->CheckIfErrors())
		{
			$CurrentReservation->SetBasics(intval($TravelerNumber),$Destination,$Insurance);
			
			$_SESSION['reservation'] = serialize($CurrentReservation);
		}
		else
		{
			$_SESSION['usererror'] = serialize($error_obj);
		}
	}


	if(isset($_SESSION['usererror']))
	{
		$error_obj = unserialize($_SESSION['usererror']);
		unset($_SESSION['usererror']);

		include "BasicInfoView.php";
	}
	else if(isset($_SESSION['reservation']) and !isset($_SESSION['usererror']))
	{
		require "controler_AddTravelerInfo.php";
	}
	else
	{
		include "BasicInfoView.php";
	}
?>