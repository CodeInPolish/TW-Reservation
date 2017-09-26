<?php
	
	require "FormView.php";
	
	if( !empty($_POST['params']) )
	{
		$text = $_POST['params'];
		require "TestView.php";
	}
	
?>