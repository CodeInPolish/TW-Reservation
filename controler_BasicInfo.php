<?php

/*
Created and edited by 
Krasowski Marcin
13169
*/


//if CurrentReservation isn't set, create it
if(!isset($CurrentReservation))
{
	$CurrentReservation = new Reservation ();
}

//managing POST 
if( !empty($_POST['Destination']) )
{	
	//creating new error obj
	$error_obj = new ShowError();
	$TravelerNumber = 0;

	if(isset($_POST['TravelerNumber']))
	{
		$TravelerNumber = intval(htmlspecialchars($_POST['TravelerNumber']));
	}

	$Destination = htmlspecialchars($_POST['Destination']);
	$Insurance = isset($_POST['Insurance']) ? TRUE : FALSE; 
	
	//error checking
	if($TravelerNumber>=1 and $TravelerNumber<=10)
	{
		$error_obj->ResetTravelerNumberError();
	}

	if($CurrentReservation->CheckDestination($Destination))
	{
		$error_obj->ResetDestinationError();
	}

	//if there is no error, SetBasics in Current reservation then serialize that object
	//if there is an error, show the error(s) and serialize the error obj
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

//if there was an user error, build the error message and show it along with BasicInfoView
//if there was no user error, go to the next stage (addTravelerInfo)
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