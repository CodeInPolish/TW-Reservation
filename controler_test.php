<?php
	
/*
Created and edited by 
Krasowski Marcin
13169
*/

	require "FormView.php";
	
	if( !empty($_POST['params']) )
	{
		$text = $_POST['params'];
		require "TestView.php";
	}
	
?>