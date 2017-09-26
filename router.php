<?php

session_start();

if( !empty($_GET['page']) )
{
	//Security feature, removes all the HTML/script tags
	$input = htmlspecialchars($_GET['page']);
	$fileName = 'controler_'.$input.'.php';
	
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