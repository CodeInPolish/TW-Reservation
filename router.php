<?php

session_start();

if( !empty($_GET['page']) && is_file('controler_'.$_GET['page'].'.php') )
{
	include 'controler_'.$_GET['page'].'.php';
}

else
{
	include "controler_index.php";
}

?>