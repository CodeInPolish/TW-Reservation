<?php
	
	if( !empty($_POST['params']) )
	{
		include "TestView.php";
	}
	else
	{
	include "FormView.php";
	}
	
?>