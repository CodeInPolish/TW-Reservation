<?php

include "Model.php";
/*
Created and edited by 
Krasowski Marcin
13169
*/

session_start();

$CurrentReservation = new Reservation ();

if( !empty($_GET['page']) )
{
	//Security feature, removes all the HTML/script tags
	$inputPage = htmlspecialchars($_GET['page']);
	$fileName = 'controler_'.$inputPage.'.php';
	
	if(is_file($fileName))
	{
		include 'controler_'.$_GET['page'].'.php';
	}
	else
	{
		include "controler_index.php";
	}
	
}

else
{
	include "controler_index.php";
}

?>